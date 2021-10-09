@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Bangka Belitung</h1>
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
                    <strong>Provinsi Bangka Belitung</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('bangkabelitung/prov_bangkabelitung/trash') }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Trash
                    </a>
                    <a href="{{ url('bangkabelitung/prov_bangkabelitung/create') }}" class="btn btn-success btn-sm">
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
                    @if ($bangkabelitung_locs->count() > 0)
                        @foreach ($bangkabelitung_locs as $key => $item)
                            <tr>
                                <td>{{ $bangkabelitung_locs->firstItem() + $key }}</td>
                                <td>{{ $item->nama_kabupaten_bangkabelitung }}</td>
                                <td>{{ $item->luas_wilayah_bangkabelitung }}</td>
                                <td>{{ $item->total_penduduk_bangkabelitung }}</td>
                                <td class="text-left">
                                    <a href="{{ url('bangkabelitung/prov_bangkabelitung/'.$item->id_kabupaten_bangkabelitung) }}"
                                        class="btn btn-warning btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ url('bangkabelitung/prov_bangkabelitung/'.$item->id_kabupaten_bangkabelitung.'/edit') }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('bangkabelitung/prov_bangkabelitung/'.$item->id_kabupaten_bangkabelitung) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
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
                {{ $bangkabelitung_locs->firstItem() }}
                to
                {{ $bangkabelitung_locs->lastItem() }}
                of
                {{ $bangkabelitung_locs->total() }}
                entries
            </div>
            <div class="pull-right">
                {{ $bangkabelitung_locs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
