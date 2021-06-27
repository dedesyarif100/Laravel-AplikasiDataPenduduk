<?php

namespace App\Http\Controllers;

use App\Models\Prov_Jawatimur;
use Illuminate\Http\Request;

class Prov_JawatimurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jawatimur_locs = Prov_Jawatimur::orderBy('created_at', 'DESC')->paginate(5);

        return view('Data-Provinsi.Jawa.Jawa-Timur.index', compact('jawatimur_locs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Provinsi.Jawa.Jawa-Timur.create');
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
            'nama_kabupaten_jawatimur' => 'required:3',
            'luas_wilayah_jawatimur' => 'required',
            'total_penduduk_jawatimur' => 'required',
        ], [
            'nama_kabupaten_jawatimur.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_jawatimur.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_jawatimur.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        // Cara 2 : Mass Assignment
        Prov_Jawatimur::create([
            'nama_kabupaten_jawatimur' => $request->nama_kabupaten_jawatimur,
            'luas_wilayah_jawatimur' => $request->luas_wilayah_jawatimur,
            'total_penduduk_jawatimur' => $request->total_penduduk_jawatimur,
        ]);

        return redirect('jawatimur/prov_jawatimur')->with('status', 'Kabupaten berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prov_Jawatimur  $prov_Jawatimur
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_jawatimur)
    {
        $jawatimur_locs = Prov_Jawatimur::where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur)->first();
        return view('Data-Provinsi.Jawa.Jawa-Timur.show', compact('jawatimur_locs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prov_Jawatimur  $prov_Jawatimur
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kabupaten_jawatimur)
    {
        $jawatimur_locs = Prov_Jawatimur::where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur)->first();

        return view('Data-Provinsi.Jawa.Jawa-Timur.edit', compact('jawatimur_locs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prov_Jawatimur  $prov_Jawatimur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kabupaten_jawatimur)
    {
        $request->validate([
            'nama_kabupaten_jawatimur' => 'required:3',
            'luas_wilayah_jawatimur' => 'required',
            'total_penduduk_jawatimur' => 'required',
        ], [
            'nama_kabupaten_jawatimur.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_jawatimur.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_jawatimur.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        Prov_Jawatimur::where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur)
            ->update([
                'nama_kabupaten_jawatimur' => $request->nama_kabupaten_jawatimur,
                'luas_wilayah_jawatimur' => $request->luas_wilayah_jawatimur,
                'total_penduduk_jawatimur' => $request->total_penduduk_jawatimur,
            ]);

        return redirect('jawatimur/prov_jawatimur')->with('status', 'Kabupaten berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prov_Jawatimur  $prov_Jawatimur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kabupaten_jawatimur)
    {
        Prov_Jawatimur::where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur)->delete();

        return redirect('jawatimur/prov_jawatimur')->with('status', 'Kabupaten berhasil dihapus!');
    }

    public function trash() {
        $jawatimur_locs = Prov_Jawatimur::onlyTrashed()->get();

        return view('Data-Provinsi.Jawa.Jawa-Timur.trash', compact('jawatimur_locs'));
    }

    public function restore($id_kabupaten_jawatimur = null) {
        if ($id_kabupaten_jawatimur != null) {
            Prov_Jawatimur::onlyTrashed()
                ->where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur)
                ->restore();
            return redirect('jawatimur/prov_jawatimur')->with('status', 'Kabupaten berhasil di-restore!');
        } else {
            Prov_Jawatimur::onlyTrashed()->restore();
            return redirect('jawatimur/prov_jawatimur')->with('status', 'Semua Data berhasil di-restore!');
        }
    }

    public function delete($id_kabupaten_jawatimur = null) {
        if ($id_kabupaten_jawatimur != null) {
            Prov_Jawatimur::onlyTrashed()
                ->where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur)
                ->forceDelete();
            return redirect('jawatimur/prov_jawatimur/trash')->with('status', 'Kabupaten berhasil dihapus Permanent!');
        } else {
            Prov_Jawatimur::onlyTrashed()->forceDelete();
            return redirect('jawatimur/prov_jawatimur/trash')->with('status', 'Semua Data berhasil dihapus Permanent!');
        }
    }
}
