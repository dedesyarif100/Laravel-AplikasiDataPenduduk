@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Table</a></li>
                        <li class="active">Basic table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <h2>Jawa</h2>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <a href="{{ url('banten/prov_banten') }}">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5>Data Banten</h5>
                        <h2>{{ $Data_Banten }}</h2>
                    </div>
                </div>
            </a>
            <a href="{{ url('jakarta/prov_jakarta') }}">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5>DKI Jakarta</h5>
                        <h2>{{ $Data_Jakarta }}</h2>
                    </div>
                </div>
            </a>
            <a href="{{ url('jawabarat/prov_jawabarat') }}">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5>Jawa Barat</h5>
                        <h2>{{ $Data_Jabar }}</h2>
                    </div>
                </div>
            </a>
            <a href="{{ url('jawatengah/prov_jawatengah') }}">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5>Jawa Tengah</h5>
                        <h2>{{ $Data_Jateng }}</h2>
                    </div>
                </div>
            </a>
            <a href="{{ url('jawatimur/prov_jawatimur') }}">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5>Jawa Timur</h5>
                        <h2>{{ $Data_Jatim }}</h2>
                    </div>
                </div>
            </a>
            <a href="{{ url('yogyakarta/prov_yogyakarta') }}">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5>DI Yogyakarta</h5>
                        <h2>{{ $Data_Jatim }}</h2>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="container">
        <h2>Jawa</h2>
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3">
            <a href="{{ url('banten/prov_banten') }}">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5>Data Banten</h5>
                        <h2>{{ $Data_Banten }}</h2>
                    </div>
                </div>
            </a>
            <a href="{{ url('jakarta/prov_jakarta') }}">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5>DKI Jakarta</h5>
                        <h2>{{ $Data_Jakarta }}</h2>
                    </div>
                </div>
            </a>
            <a href="{{ url('jawabarat/prov_jawabarat') }}">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5>Jawa Barat</h5>
                        <h2>{{ $Data_Jabar }}</h2>
                    </div>
                </div>
            </a>
            <a href="{{ url('jawatengah/prov_jawatengah') }}">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5>Jawa Tengah</h5>
                        <h2>{{ $Data_Jateng }}</h2>
                    </div>
                </div>
            </a>
            <a href="{{ url('jawatimur/prov_jawatimur') }}">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5>Jawa Timur</h5>
                        <h2>{{ $Data_Jatim }}</h2>
                    </div>
                </div>
            </a>
            <a href="{{ url('yogyakarta/prov_yogyakarta') }}">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5>DI Yogyakarta</h5>
                        <h2>{{ $Data_Jatim }}</h2>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
