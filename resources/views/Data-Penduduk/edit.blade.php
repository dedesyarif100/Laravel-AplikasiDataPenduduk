@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Data Penduduk</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Tambah Data Penduduk</a></li>
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
                    <strong>Edit Data Penduduk</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('data-penduduk/penduduk') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('data-penduduk/penduduk/'.$dataPenduduk->id_penduduk) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="number"
                                name="nik"
                                value="{{ old('nik', $dataPenduduk->nik ) }}"
                                class="form-control @error('nik') is-invalid @enderror"
                                autofocus>
                            @error('nik')
                                 {{-- Validation Errors Laravel --}}
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text"
                                name="nama"
                                value="{{ old('nama', $dataPenduduk->nama ) }}"
                                class="form-control @error('nama') is-invalid @enderror"
                                autofocus>
                            @error('nama')
                                 {{-- Validation Errors Laravel --}}
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input min="2000-01-01"
                                max="2019-12-31" name="tgl_lahir"
                                id="dob" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                placeholder="Date of birth" value="{{ old('tgl_lahir', optional($dataPenduduk->tgl_lahir)->format('Y-m-d') ) }}"
                            />
                        </div>

                        <div class="form-group">
                            <label>Provinsi</label>
                            <select name="provinsi_id" class="form-control @error('provinsi_id') is-invalid @enderror">
                                <option value="">- PILIH -</option>
                                @foreach ($dataProvinsi as $item)
                                    <option value="{{ $item->id }}" {{ old('provinsi_id', $dataPenduduk->provinsi_id) == $item->id ? 'selected' : null }}>{{ $item->nama_provinsi }}</option>
                                @endforeach
                            </select>
                            @error('provinsi_id')
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
