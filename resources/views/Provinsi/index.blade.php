@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Daftar Provinsi</h1>
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
                        <strong>Daftar Provinsi</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('provinsi/provinsi/trash') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Trash
                        </a>
                        <a href="{{ url('provinsi/provinsi/create') }}" class="btn btn-success btn-sm">
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
                            <th>Daftar Provinsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($dataProvinsi->count() > 0)
                            @foreach ($dataProvinsi as $key => $item)
                                <tr>
                                    <td>{{ $dataProvinsi->firstItem() + $key }}</td>
                                    <td>{{ $item->nama_provinsi }}</td>
                                    <td class="text-left">
                                        <a href="{{ url('provinsi/provinsi/'.$item->id_provinsi) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('provinsi/provinsi/'.$item->id_provinsi.'/edit') }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ url('provinsi/provinsi/'.$item->id_provinsi) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
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
                    {{ $dataProvinsi->firstItem() }}
                    to
                    {{ $dataProvinsi->lastItem() }}
                    of
                    {{ $dataProvinsi->total() }}
                    entries
                </div>
                <div class="pull-right">
                    {{ $dataProvinsi->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal" id="delete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ $item->id_provinsi_jakarta }}
                <form action="{{ url('prov_jakarta/' . $item->id_provinsi_jakarta) }}" method="POST">
                    @method('delete')
                    @csrf
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">Yes, Delete</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
