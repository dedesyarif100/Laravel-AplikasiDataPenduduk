@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Jambi</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ url('home') }}">Dashboard</a></li>
                        <li class="active">Basic table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Provinsi Jambi</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('jambi/prov_jambi/trash') }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Trash
                    </a>
                    <a href="{{ url('jambi/prov_jambi/create') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Daftar Kabupaten</th>
                        <th>Luas Wilayah</th>
                        <th>Total Penduduk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($jambi_locs->count() > 0)
                        @foreach ($jambi_locs as $key => $item)
                            <tr>
                                <td>{{ $jambi_locs->firstItem() + $key }}</td>
                                <td>{{ $item->nama_kabupaten_jambi }}</td>
                                <td>{{ $item->luas_wilayah_jambi }}</td>
                                <td>{{ $item->total_penduduk_jambi }}</td>
                                <td class="text-left">
                                    <a href="{{ url('jambi/prov_jambi/'.$item->id_kabupaten_jambi) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ url('jambi/prov_jambi/'.$item->id_kabupaten_jambi.'/edit') }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('jambi/prov_jambi/'.$item->id_kabupaten_jambi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Data Kosong</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="pull-left">
                Showing
                {{ $jambi_locs->firstItem() }}
                to
                {{ $jambi_locs->lastItem() }}
                of
                {{ $jambi_locs->total() }}
                entries
            </div>
            <div class="pull-right">
                {{ $jambi_locs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
