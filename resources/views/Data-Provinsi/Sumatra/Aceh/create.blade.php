@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Tambah Aceh</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Tambah Data Aceh</a></li>
                        {{--  <li><a href="#">Table</a></li>  --}}
                        <li class="active">Add</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Tambah Data Aceh</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('aceh/prov_aceh') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('aceh/prov_aceh') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Kabupaten</label>
                            <input type="text"
                                name="nama_kabupaten_aceh"
                                value="{{ old('nama_kabupaten_aceh') }}"
                                class="form-control @error('nama_kabupaten_aceh') is-invalid @enderror"
                                autofocus>
                            @error('nama_kabupaten_aceh')
                                {{--  Validation Errors Laravel  --}}
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Luas Wilayah</label>
                            <input type="number" name="luas_wilayah_aceh" value="{{ old('luas_wilayah_aceh') }}" class="form-control @error('luas_wilayah_aceh') is-invalid @enderror" autofocus>
                            @error('luas_wilayah_aceh')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Total Penduduk</label>
                            <input type="number" name="total_penduduk_aceh" value="{{ old('total_penduduk_aceh') }}" class="form-control @error('total_penduduk_aceh') is-invalid @enderror" autofocus>
                            @error('total_penduduk_aceh')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
