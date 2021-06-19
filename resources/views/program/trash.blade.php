@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Program</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Program</a></li>
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
                        <strong>Data Program Terhapus</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('programs/delete') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Delete All
                        </a>
                        <a href="{{ url('programs/restore') }}" class="btn btn-info btn-sm">
                            <i class="fa fa-undo"></i> Restore All
                        </a>
                        <a href="{{ url('programs') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-chevron-left"></i> Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Program</th>
                            <th>Edulevel</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($programs->count() > 0)
                            @foreach ($programs as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->edulevel->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('programs/restore/'.$item->id) }}" class="btn btn-info btn-sm">
                                            Restore
                                        </a>
                                        <a href="{{ url('programs/delete/'.$item->id) }}" class="btn btn-danger btn-sm" onclick="return comfirm('Yakin Hapus Permanent?')">
                                            Delete Permanent
                                        </a>
                                        {{-- Jika menggunakan Form Action, maka method di Routing harus delete --}}
                                        {{-- <form action="{{ url('programs/delete/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                Delete Permanent
                                            </button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">Data Kosong</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{-- {{ $edulevels->render() }} --}}
            </div>
        </div>
    </div>
@endsection
