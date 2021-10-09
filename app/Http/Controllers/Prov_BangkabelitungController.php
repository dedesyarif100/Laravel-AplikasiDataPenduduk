<?php

namespace App\Http\Controllers;

use App\Models\Prov_Bangkabelitung;
use Illuminate\Http\Request;

class Prov_BangkabelitungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bangkabelitung_locs = Prov_Bangkabelitung::orderBy('created_at', 'DESC')->paginate(5);
        return view('Data-Provinsi.Sumatra.Bangka_Belitung.index', compact('bangkabelitung_locs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Provinsi.Sumatra.Bangka_Belitung.create');
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
            'nama_kabupaten_bangkabelitung' => 'required:3',
            'luas_wilayah_bangkabelitung' => 'required',
            'total_penduduk_bangkabelitung' => 'required',
        ], [
            'nama_kabupaten_bangkabelitung.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_bangkabelitung.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_bangkabelitung.required' => 'Total penduduk tidak boleh kosong',
        ]);

        // Cara 2 : Mass Assignment
        Prov_Bangkabelitung::create([
            'nama_kabupaten_bangkabelitung' => $request->nama_kabupaten_bangkabelitung,
            'luas_wilayah_bangkabelitung' => $request->luas_wilayah_bangkabelitung,
            'total_penduduk_bangkabelitung' => $request->total_penduduk_bangkabelitung
        ]);

        return redirect('bangkabelitung/prov_bangkabelitung')->with('status', 'Kabupaten berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_bangkabelitung)
    {
        $bangkabelitung_locs = Prov_Bangkabelitung::where('id_kabupaten_bangkabelitung', $id_kabupaten_bangkabelitung)->first();
        return view('Data-Provinsi.Sumatra.Bangka_Belitung.show', compact('bangkabelitung_locs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kabupaten_bangkabelitung)
    {
        $bangkabelitung_locs = Prov_Bangkabelitung::where('id_kabupaten_bangkabelitung', $id_kabupaten_bangkabelitung)->first();
        return view('Data-Provinsi.Sumatra.Bangka_Belitung.edit', compact('bangkabelitung_locs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kabupaten_bangkabelitung)
    {
        $request->validate([
            'nama_kabupaten_bangkabelitung' => 'required:3',
            'luas_wilayah_bangkabelitung' => 'required',
            'total_penduduk_bangkabelitung' => 'required',
        ], [
            'nama_kabupaten_bangkabelitung.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_bangkabelitung.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_bangkabelitung.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        // Cara 2 : Mass Assignment
        Prov_Bangkabelitung::where('id_kabupaten_bangkabelitung', $id_kabupaten_bangkabelitung)
            ->update([
                'nama_kabupaten_bangkabelitung' => $request->nama_kabupaten_bangkabelitung,
                'luas_wilayah_bangkabelitung' => $request->luas_wilayah_bangkabelitung,
                'total_penduduk_bangkabelitung' => $request->total_penduduk_bangkabelitung
            ]);

        return redirect('bangkabelitung/prov_bangkabelitung')->with('status', 'Kabupaten berhasil diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kabupaten_bangkabelitung)
    {
        Prov_Bangkabelitung::where('id_kabupaten_bangkabelitung', $id_kabupaten_bangkabelitung)->delete();

        return redirect('bangkabelitung/prov_bangkabelitung')->with('status', 'Kabupaten berhasil dihapus!');
    }

    public function trash() {
        $bangkabelitung_locs = Prov_Bangkabelitung::onlyTrashed()->get();
        return view('Data-Provinsi.Sumatra.Bangka_Belitung.trash', compact('bangkabelitung_locs'));
    }

    public function restore($id_kabupaten_bangkabelitung = null) {
        if ($id_kabupaten_bangkabelitung != null) {
            Prov_Bangkabelitung::onlyTrashed()
                ->where('id_kabupaten_bangkabelitung', $id_kabupaten_bangkabelitung)
                ->restore();
            return redirect('bangkabelitung/prov_bangkabelitung')->with('status', 'Kabupaten berhasil di-restore!');
        } else {
            Prov_Bangkabelitung::onlyTrashed()->restore();
            return redirect('bangkabelitung/prov_bangkabelitung')->with('status', 'Semua Data berhasil di-restore!');
        }
    }

    public function delete($id_kabupaten_bangkabelitung = null) {
        if ($id_kabupaten_bangkabelitung != null) {
            Prov_Bangkabelitung::onlyTrashed()
                ->where('id_kabupaten_bangkabelitung', $id_kabupaten_bangkabelitung)
                ->forceDelete();
            return redirect('bangkabelitung/prov_bangkabelitung/trash')->with('status', 'Kabupaten berhasil dihapus Permanent!');
        } else {
            Prov_Bangkabelitung::onlyTrashed()->forceDelete();
            return redirect('bangkabelitung/prov_bangkabelitung/trash')->with('status', 'Semua Data berhasil dihapus Permanent!');
        }
    }
}
