@extends('main')

@section('title', 'Program')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Programs</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Programs</a></li>
                    {{--  <li><a href="#">Table</a></li>  --}}
                    <li class="active">Edit</li>
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
                    <strong>Edit Programs</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('programs/programs') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('programs/programs/'.$program->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Nama Program</label>
                            <input type="text"
                                name="name"
                                value="{{ old('name', $program->name) }}"
                                class="form-control @error('name') is-invalid @enderror"
                                autofocus>
                            @error('name')
                                {{--  Validation Errors Laravel  --}}
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jenjang</label>
                            <select name="edulevel_id" class="form-control @error('edulevel_id') is-invalid @enderror">
                                <option value="">- PILIH -</option>
                                @foreach ($edulevels as $item)
                                    <option value="{{ $item->id }}" {{ old('edulevel_id', $program->edulevel_id) == $item->id ? 'selected' : null }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('edulevel_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Harga Member</label>
                            <input type="number" name="student_price" value="{{ old('student_price', $program->student_price ) }}" class="form-control @error('student_price') is-invalid @enderror">
                            {{-- @error('student_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror --}}
                        </div>
                        <div class="form-group">
                            <label>Member Maksimal</label>
                            <input type="number" name="student_max" value="{{ old('student_max', $program->student_max ) }}" class="form-control @error('student_max') is-invalid @enderror">
                            @error('student_max')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Info</label>
                            <textarea type="text" name="info" value="{{ old('info', $program->info) }}" class="form-control @error('info') is-invalid @enderror">{{ old('info', $program->info) }}</textarea>
                            @error('info')
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
