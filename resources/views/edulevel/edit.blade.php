@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edulevel</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
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
                    <strong>Edit Jenjang</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('edulevels') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Back
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <form action="{{ url('edulevels/'. $edulevels->id) }}" method="POST">
                        @method('patch')
                        @csrf
                        <div class="form-group">
                            <label>Nama Jenjang</label>
                            <input type="text"
                                name="name"
                                value="{{ old('name', $edulevels->name) }}"
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
                            <label>Keterangan</label>
                            <textarea type="text" name="desc" class="form-control @error('desc') is-invalid @enderror">{{ old('desc',$edulevels->desc) }}</textarea>
                            @error('desc')
                            {{--  Validation Errors Laravel  --}}
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
