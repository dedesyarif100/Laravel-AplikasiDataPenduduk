@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Jawa Timur</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Jawa Timur</a></li>
                        <li><a href="#">Trash</a></li>
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
                        <strong>Data Kabupaten Jawa Timur Terhapus</strong>
                    </div>
                    <div class="pull-right">
                        {{-- <a href="{{ url('prov_jawabarat/delete') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Delete All
                        </a> --}}
                        <form action="{{ url('jawatimur/prov_jawatimur/delete/') }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                Delete Permanent
                            </button>
                        </form>
                        <a href="{{ url('jawatimur/prov_jawatimur/restore') }}" class="btn btn-info btn-sm">
                            <i class="fa fa-undo"></i> Restore All
                        </a>
                        <a href="{{ url('jawatimur/prov_jawatimur') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kabupaten</th>
                            <th>Luas Wilayah</th>
                            <th>Total Penduduk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($jawatimur_locs->count() > 0)
                            @foreach ($jawatimur_locs as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_kabupaten_jawatimur }}</td>
                                    <td>{{ $item->luas_wilayah_jawatimur }}</td>
                                    <td>{{ $item->total_penduduk_jawatimur }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('jawatimur/prov_jawatimur/restore/'.$item->id_kabupaten_jawatimur) }}" class="btn btn-info btn-sm">
                                            Restore
                                        </a>
                                        {{-- <a href="{{ url('prov_jawabarat/delete/'.$item->id_kabupaten_jawabarat) }}" class="btn btn-danger btn-sm" onclick="return comfirm('Yakin Hapus Permanent?')">
                                            Delete Kab Permanent
                                        </a> --}}
                                        {{-- Jika menggunakan Form Action, maka method di Routing harus delete --}}
                                        <form action="{{ url('jawatimur/prov_jawatimur/delete/'.$item->id_kabupaten_jawatimur) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                Delete Kab Permanent
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
                {{-- {{ $edulevels->render() }} --}}
            </div>
        </div>
    </div>
@endsection
