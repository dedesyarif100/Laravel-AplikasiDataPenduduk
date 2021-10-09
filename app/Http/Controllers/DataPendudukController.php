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
        $dataPenduduk = DataPenduduk::with('provinsi')->orderBy('created_at', 'DESC')->paginate(5);
        // return $dataPenduduk;
        // $dataPenduduk = DataPenduduk::with(array('provinsi'=>function($query){
        //     $query->select('id_provinsi','nama_provinsi');
        // }))->paginate(5);
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
        $request->validate([
            'nik' => 'required:3',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            // 'provinsi_id' => 'required',
        ]);

        // $dataPenduduk = new DataPenduduk([
        //     'nik' => $request->nik,
        //     'nama' => $request->nama,
        //     'tgl_lahir' => $request->tgl_lahir,
        //     'provinsi_id' => $request->provinsi_id,
        // ]);
        DataPenduduk::create($request->all());
        // $dataPenduduk->save();

        return redirect('data-penduduk/penduduk')->with('status', 'Data berhasil disimpan!');
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
    public function edit($id_penduduk)
    {
        $dataPenduduk = DataPenduduk::where('id_penduduk', $id_penduduk)->first();
        $dataProvinsi = DataProvinsi::all();
        // dd($dataPenduduk);
        // return $dataPenduduk;
        return view('Data-Penduduk.edit', compact('dataPenduduk', 'dataProvinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPenduduk  $dataPenduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_penduduk)
    {
        // $dataPenduduk = new DataPenduduk;
        // dd($dataPenduduk);
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
        ]);

        $save = DataPenduduk::where('id_penduduk', $id_penduduk)
            ->update([
                'nik' => $request->nik,
                'nama' => $request->nama,
                'tgl_lahir' => $request->tgl_lahir,
                'provinsi_id' => $request->provinsi_id,
            ]);
        // return $save;

        return redirect('data-penduduk/penduduk')->with('status', 'Data berhasil di-update!');
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
