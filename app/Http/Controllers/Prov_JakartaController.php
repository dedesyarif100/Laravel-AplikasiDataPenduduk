<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Prov_Jakarta;

class Prov_JakartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jakarta_locs = DB::table('prov_jakarta_locs')->paginate(5);
        // return $jakarta_locs;
        return view('Data-Provinsi.Jawa.DKI-Jakarta.index', compact('jakarta_locs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Provinsi.Jawa.DKI-Jakarta.create');
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
            'nama_kabupaten_jakarta' => 'required|min:2',
            'luas_wilayah_jakarta' => 'required',
            'total_penduduk_jakarta' => 'required'
        ], [
            'nama_kabupaten_jakarta.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_jakarta.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_jakarta.required' => 'Total Penduduk tidak boleh kosong'
        ]);

        DB::table('prov_jakarta_locs')->insert([
            'nama_kabupaten_jakarta' => $request->nama_kabupaten_jakarta,
            'luas_wilayah_jakarta' => $request->luas_wilayah_jakarta,
            'total_penduduk_jakarta' => $request->total_penduduk_jakarta,
        ]);
        // return $request;
        return redirect('prov_jakarta')->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_provinsi_jakarta)
    {
        $jakarta_locs = DB::table('prov_jakarta_locs')->where('id_provinsi_jakarta', $id_provinsi_jakarta)->first();

        return view('Data-Provinsi.Jawa.DKI-Jakarta.show', compact('jakarta_locs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_provinsi_jakarta)
    {
        $jakarta_locs = DB::table('prov_jakarta_locs')->where('id_provinsi_jakarta', $id_provinsi_jakarta)->first();

        return view('Data-Provinsi.Jawa.DKI-Jakarta.edit', compact('jakarta_locs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_provinsi_jakarta)
    {
        $request->validate([
            'nama_kabupaten_jakarta' => 'required|min:2',
            'luas_wilayah_jakarta' => 'required',
            'total_penduduk_jakarta' => 'required'
        ], [
            'nama_kabupaten_jakarta.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_jakarta.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_jakarta.required' => 'Total Penduduk tidak boleh kosong'
        ]);

        DB::table('prov_jakarta_locs')->where('id_provinsi_jakarta', $id_provinsi_jakarta)
            ->update([
            'nama_kabupaten_jakarta' => $request->nama_kabupaten_jakarta,
            'luas_wilayah_jakarta' => $request->luas_wilayah_jakarta,
            'total_penduduk_jakarta' => $request->total_penduduk_jakarta,
        ]);
        // return $request;
        return redirect('prov_jakarta')->with('status', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_provinsi_jakarta)
    {
        DB::table('prov_jakarta_locs')->where('id_provinsi_jakarta', $id_provinsi_jakarta)->delete();
        return redirect('prov_jakarta')->with('status', 'Data Berhasil Dihapus!');
    }
}
