<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use App\Models\DataProvinsi;
use Illuminate\Http\Request;

class DataPendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPenduduk = DataPenduduk::orderBy('id_penduduk', 'DESC')->paginate(5);
        // return $dataPenduduk;
        // dd($dataPenduduk);
        return view('Data-Penduduk.index', compact('dataPenduduk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataPenduduk = DataProvinsi::all();
        return view('Data-Penduduk.create', compact('dataPenduduk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPenduduk  $dataPenduduk
     * @return \Illuminate\Http\Response
     */
    public function show(DataPenduduk $dataPenduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPenduduk  $dataPenduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPenduduk $dataPenduduk)
    {
        $dataProvinsi = DataProvinsi::all();
        return view('Data-Penduduk.edit', compact('dataPenduduk', 'dataProvinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPenduduk  $dataPenduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPenduduk $dataPenduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPenduduk  $dataPenduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPenduduk $dataPenduduk)
    {
        //
    }
}
