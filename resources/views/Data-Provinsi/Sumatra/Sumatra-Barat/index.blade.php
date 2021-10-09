@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Sumatra Barat</h1>
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

            {{-- Flash Message Laravel --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Provinsi Sumatra Barat</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('sumatra-barat/prov_sumatra-barat/trash') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Trash
                        </a>
                        <a href="{{ url('sumatra-barat/prov_sumatra-barat/create') }}" class="btn btn-success btn-sm">
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
                            <th>Daftar Kabupaten</th>
                            <th>Luas Wilayah</th>
                            <th>Total Penduduk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($sumatrabarat_locs->count() > 0)
                            @foreach ($sumatrabarat_locs as $key => $item)
                                <tr>
                                    <td>{{ $sumatrabarat_locs->firstItem() + $key }}</td>
                                    <td>{{ $item->nama_kabupaten_sumatrabarat }}</td>
                                    <td>{{ $item->luas_wilayah_sumatrabarat }}</td>
                                    <td>{{ $item->total_penduduk_sumatrabarat }}</td>
                                    <td class="text-left">
                                        <a href="{{ url('sumatra-barat/prov_sumatra-barat/'.$item->id_kabupaten_sumatrabarat) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('sumatra-barat/prov_sumatra-barat/'.$item->id_kabupaten_sumatrabarat.'/edit') }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{ url('sumatra-barat/prov_sumatra-barat/'.$item->id_kabupaten_sumatrabarat) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        {{-- @if ($jawatimur_locs->count() > 0)
                            @foreach ($jawatimur_locs as $key => $item)
                                <tr>
                                    <td>{{ $jawatimur_locs->firstItem() + $key }}</td>
                                    <td>{{ $item->nama_kabupaten_jawatimur }}</td>
                                    <td>{{ $item->luas_wilayah_jawatimur }}</td>
                                    <td>{{ $item->total_penduduk_jawatimur }}</td>
                                    <td class="text-left">
                                        <a href="{{ url('jawatimur/prov_jawatimur/'.$item->id_kabupaten_jawatimur) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('jawatimur/prov_jawatimur/'.$item->id_kabupaten_jawatimur.'/edit') }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ url('jawatimur/prov_jawatimur/'.$item->id_kabupaten_jawatimur) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
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
                        @endif --}}
                    </tbody>
                </table>
                <div class="pull-left">
                    Showing
                    {{ $sumatrabarat_locs->firstItem() }}
                    to
                    {{ $sumatrabarat_locs->lastItem() }}
                    of
                    {{ $sumatrabarat_locs->total() }}
                    entries
                </div>
                <div class="pull-right">
                    {{ $sumatrabarat_locs->links() }}
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
