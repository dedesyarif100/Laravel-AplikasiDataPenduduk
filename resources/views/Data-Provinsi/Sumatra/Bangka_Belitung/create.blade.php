@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Data Bangka Belitung</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Tambah Data Bangka Belitung</a></li>
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
                    <strong>Tambah Data Bangka Belitung</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('bangkabelitung/prov_bangkabelitung') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('bangkabelitung/prov_bangkabelitung') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Kabupaten</label>
                            <input type="text"
                                name="nama_kabupaten_bangkabelitung"
                                value="{{ old('nama_kabupaten_bangkabelitung') }}"
                                class="form-control @error('nama_kabupaten_bangkabelitung') is-invalid @enderror"
                                autofocus>
                            @error('nama_kabupaten_bangkabelitung')
                                 {{-- Validation Errors Laravel --}}
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Luas Wilayah</label>
                            <input type="number" name="luas_wilayah_bangkabelitung" value="{{ old('luas_wilayah_bangkabelitung') }}" class="form-control @error('luas_wilayah_bangkabelitung') is-invalid @enderror" autofocus>
                            @error('luas_wilayah_bangkabelitung')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Total Penduduk</label>
                            <input type="number" name="total_penduduk_bangkabelitung" value="{{ old('total_penduduk_bangkabelitung') }}" class="form-control @error('total_penduduk_bangkabelitung') is-invalid @enderror" autofocus>
                            @error('total_penduduk_bangkabelitung')
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
