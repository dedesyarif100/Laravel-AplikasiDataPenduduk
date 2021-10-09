<?php

namespace App\Http\Controllers;

use App\Models\Prov_Sumatrabarat;
use Illuminate\Http\Request;

class Prov_SumatrabaratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sumatrabarat_locs = Prov_Sumatrabarat::orderBy('id_kabupaten_sumatrabarat', 'DESC')->paginate(5);
        return view('Data-Provinsi.Sumatra.Sumatra-Barat.index', compact('sumatrabarat_locs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Provinsi.Sumatra.Sumatra-Barat.create');
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
            'nama_kabupaten_sumatrabarat' => 'required:3',
            'luas_wilayah_sumatrabarat' => 'required',
            'total_penduduk_sumatrabarat' => 'required',
        ], [
            'nama_kabupaten_sumatrabarat.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_sumatrabarat.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_sumatrabarat.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        Prov_Sumatrabarat::create([
            'nama_kabupaten_sumatrabarat' => $request->nama_kabupaten_sumatrabarat,
            'luas_wilayah_sumatrabarat' => $request->luas_wilayah_sumatrabarat,
            'total_penduduk_sumatrabarat' => $request->total_penduduk_sumatrabarat,
        ]);
        return redirect('sumatra-barat/prov_sumatra-barat')->with('status', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prov_Sumatrabarat  $prov_Sumatrabarat
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_sumatrabarat)
    {
        $sumatrabarat_locs = Prov_Sumatrabarat::where('id_kabupaten_sumatrabarat', $id_kabupaten_sumatrabarat)->first();
        return view('Data-Provinsi.Sumatra.Sumatra-Barat.show', compact('sumatrabarat_locs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prov_Sumatrabarat  $prov_Sumatrabarat
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kabupaten_sumatrabarat)
    {
        $sumatrabarat_locs = Prov_Sumatrabarat::where('id_kabupaten_sumatrabarat', $id_kabupaten_sumatrabarat)->first();
        return view('Data-Provinsi.Sumatra.Sumatra-Barat.edit', compact('sumatrabarat_locs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prov_Sumatrabarat  $prov_Sumatrabarat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kabupaten_sumatrabarat)
    {
        $request->validate([
            'nama_kabupaten_sumatrabarat' => 'required:3',
            'luas_wilayah_sumatrabarat' => 'required',
            'total_penduduk_sumatrabarat' => 'required',
        ], [
            'nama_kabupaten_sumatrabarat.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_sumatrabarat.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_sumatrabarat.required' => 'Total Penduduk tidak boleh kosong',
        ]);
        Prov_Sumatrabarat::where('id_kabupaten_sumatrabarat', $id_kabupaten_sumatrabarat)
            ->update([
                'nama_kabupaten_sumatrabarat' => $request->nama_kabupaten_sumatrabarat,
                'luas_wilayah_sumatrabarat' => $request->luas_wilayah_sumatrabarat,
                'total_penduduk_sumatrabarat' => $request->total_penduduk_sumatrabarat,
            ]);
        return redirect('sumatra-barat/prov_sumatra-barat')->with('status', 'Data berhasil di-update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prov_Sumatrabarat  $prov_Sumatrabarat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prov_Sumatrabarat $prov_Sumatrabarat)
    {
        //
    }
}
