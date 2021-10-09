@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Data Jambi</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Edit Data Jambi</a></li>
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
                    <strong>Edit Data Jambi</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('jambi/prov_jambi') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('jambi/prov_jambi/'.$jambi_locs->id_kabupaten_jambi) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label>Nama Kabupaten</label>
                            <input type="text"
                                name="nama_kabupaten_jambi"
                                value="{{ old('nama_kabupaten_jambi', $jambi_locs->nama_kabupaten_jambi) }}"
                                class="form-control @error('nama_kabupaten_jambi') is-invalid @enderror">

                            @error('nama_kabupaten_jambi')
                                 {{-- Validation Errors Laravel --}}
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Luas Wilayah</label>
                            <input type="number"
                                name="luas_wilayah_jambi"
                                value="{{ old('luas_wilayah_jambi', $jambi_locs->luas_wilayah_jambi) }}"
                                class="form-control @error('luas_wilayah_jambi') is-invalid @enderror"
                                autofocus>
                            @error('luas_wilayah_jambi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Total Penduduk</label>
                            <input type="number" name="total_penduduk_jambi"
                                value="{{ old('total_penduduk_jambi', $jambi_locs->total_penduduk_jambi ) }}"
                                class="form-control @error('total_penduduk_jambi') is-invalid @enderror"
                                autofocus>
                            @error('total_penduduk_jambi')
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
