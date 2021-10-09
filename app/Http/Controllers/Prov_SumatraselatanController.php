<?php

namespace App\Http\Controllers;

use App\Models\Prov_Sumatraselatan;
use Illuminate\Http\Request;

class Prov_SumatraselatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sumatraselatan_locs = Prov_Sumatraselatan::orderBy('id_kabupaten_sumatraselatan', 'DESC')->paginate(5);
        return view('Data-Provinsi.Sumatra.Sumatra_Selatan.index', compact('sumatraselatan_locs'));
        // return response()->json($sumatraselatan_locs, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Provinsi.Sumatra.Sumatra_Selatan.create');
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
            'nama_kabupaten_sumatraselatan' => 'required:3',
            'luas_wilayah_sumatraselatan' => 'required',
            'total_penduduk_sumatraselatan' => 'required',
        ], [
            'nama_kabupaten_sumatraselatan.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_sumatraselatan.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_sumatraselatan.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        // Cara 2 : Mass Assignment
        Prov_Sumatraselatan::create([
            'nama_kabupaten_sumatraselatan' => $request->nama_kabupaten_sumatraselatan,
            'luas_wilayah_sumatraselatan' => $request->luas_wilayah_sumatraselatan,
            'total_penduduk_sumatraselatan' => $request->total_penduduk_sumatraselatan,
        ]);

        return redirect('sumatraselatan/prov_sumatraselatan')->with('status', 'Kabupaten berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_sumatraselatan)
    {
        $sumatraselatan_locs = Prov_Sumatraselatan::where('id_kabupaten_sumatraselatan', $id_kabupaten_sumatraselatan)->first();
        return view('Data-Provinsi.Sumatra.Sumatra_Selatan.show', compact('sumatraselatan_locs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kabupaten_sumatraselatan)
    {
        $sumatraselatan_locs = Prov_Sumatraselatan::where('id_kabupaten_sumatraselatan', $id_kabupaten_sumatraselatan)->first();
        return view('Data-Provinsi.Sumatra.Sumatra_Selatan.edit', compact('sumatraselatan_locs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kabupaten_sumatraselatan)
    {
        $request->validate([
            'nama_kabupaten_sumatraselatan' => 'required:3',
            'luas_wilayah_sumatraselatan' => 'required',
            'total_penduduk_sumatraselatan' => 'required',
        ], [
            'nama_kabupaten_sumatraselatan.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_sumatraselatan.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_sumatraselatan.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        Prov_Sumatraselatan::where('id_kabupaten_sumatraselatan', $id_kabupaten_sumatraselatan)
            ->update([
                'nama_kabupaten_sumatraselatan' => $request->nama_kabupaten_sumatraselatan,
                'luas_wilayah_sumatraselatan' => $request->luas_wilayah_sumatraselatan,
                'total_penduduk_sumatraselatan' => $request->total_penduduk_sumatraselatan,
            ]);

        return redirect('sumatraselatan/prov_sumatraselatan')->with('status', 'Kabupate berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kabupaten_sumatraselatan)
    {
        prov_sumatraselatan::where('id_kabupaten_sumatraselatan', $id_kabupaten_sumatraselatan)->delete();

        return redirect('sumatraselatan/prov_sumatraselatan')->with('status', 'Kabupaten berhasil dihapus!');
    }

    public function trash() {
        $sumatraselatan_locs = Prov_Sumatraselatan::onlyTrashed()->get();

        return view('Data-Provinsi.Sumatra.Sumatra_Selatan.trash', compact('sumatraselatan_locs'));
    }

    public function restore($id_kabupaten_sumatraselatan = null) {
        if ($id_kabupaten_sumatraselatan != null) {
            Prov_Sumatraselatan::onlyTrashed()
                ->where('id_kabupaten_sumatraselatan', $id_kabupaten_sumatraselatan)
                ->restore();
            return redirect('sumatraselatan/prov_sumatraselatan')->with('status', 'Kabupaten berhasil di-restore!');
        } else {
            Prov_Sumatraselatan::onlyTrashed()->restore();
            return redirect('sumatraselatan/prov_sumatraselatan')->with('status', 'Semua Data Berhasil di-restore!');
        }
    }

    public function delete($id_kabupaten_sumatraselatan = null) {
        if ($id_kabupaten_sumatraselatan != null) {
            Prov_Sumatraselatan::onlyTsurashed()
                ->where('id_kabupaten_matraselatan', $id_kabupaten_sumatraselatan)
                ->forceDelete();
            return redirect('sumatraselatan/prov_sumatraselatan/trash')->with('status', 'Kabupaten berhsail dihapus Permanent!');
        } else {
            Prov_Sumatraselatan::onlyTrashed()->forceDelete();
            return redirect('sumatraselatan/prov_sumatraselatan/trash')->with('status', 'Semua Data berhasil dihapus Permanent!');
        }
    }
}
