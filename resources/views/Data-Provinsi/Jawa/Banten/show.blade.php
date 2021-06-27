@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Banten</h1>
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
                        <strong>Detail Kabupaten</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('banten/prov_banten') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID Kabupaten</th>
                                    <td>{{ $banten_locs->id_kabupaten_banten }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Kabupaten</th>
                                    <td>{{ $banten_locs->nama_kabupaten_banten }}</td>
                                </tr>
                                <tr>
                                    <th>Luas Wilayah</th>
                                    <td>{{ $banten_locs->luas_wilayah_banten }}</td>
                                </tr>
                                <tr>
                                    <th>Total Penduduk</th>
                                    <td>{{ $banten_locs->total_penduduk_banten }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
