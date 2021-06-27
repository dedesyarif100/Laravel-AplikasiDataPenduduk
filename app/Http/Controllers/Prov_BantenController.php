<?php

namespace App\Http\Controllers;

use App\Models\Prov_Banten;
use Illuminate\Http\Request;

class Prov_BantenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banten_locs = Prov_Banten::orderBy('id_kabupaten_banten', 'DESC')->paginate(5);
        return view('Data-Provinsi.Jawa.Banten.index', compact('banten_locs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Provinsi.Jawa.Banten.create');
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
            'nama_kabupaten_banten' => 'required:3',
            'luas_wilayah_banten' => 'required',
            'total_penduduk_banten' => 'required',
        ], [
            'nama_kabupaten_banten.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_banten.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_banten.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        // Quick Mass Assignment : syarat, field tabel dan nama inputan harus sama, dan harus mendefinisikan nama kolomnya di model / Property fillable
        Prov_Banten::create($request->all());

        return redirect('banten/prov_banten')->with('status', 'Kabupaten berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prov_Banten  $prov_Banten
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_banten)
    {
        $banten_locs = Prov_Banten::where('id_kabupaten_banten', $id_kabupaten_banten)->first();
        return view('Data-Provinsi.Jawa.Banten.show', compact('banten_locs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prov_Banten  $prov_Banten
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kabupaten_banten)
    {
        $banten_locs = Prov_Banten::where('id_kabupaten_banten', $id_kabupaten_banten)->first();
        return view('Data-Provinsi.Jawa.Banten.edit', compact('banten_locs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prov_Banten  $prov_Banten
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kabupaten_banten)
    {
        $request->validate([
            'nama_kabupaten_banten' => 'required:3',
            'luas_wilayah_banten' => 'required',
            'total_penduduk_banten' => 'required',
        ], [
            'nama_kabupaten_banten.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_banten.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_banten.required' => 'Total Penduduk tidak boleh kosong',
        ]);
        // Cara 3 : Quick Mass Assignment : syarat, field tabel dan nama inputan harus sama, dan harus mendefinisikan nama kolomnya di model / Property fillable
        Prov_Banten::create($request->all());
        return redirect('banten/prov_banten')->with('status', 'Jenjang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prov_Banten  $prov_Banten
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kabupaten_banten)
    {
        Prov_Banten::where('id_kabupaten_banten', $id_kabupaten_banten)->delete();
        return redirect('banten/prov_banten')->with('status', 'Jenjang berhasil dihapus!');
    }

    public function trash() {
        $banten_locs = Prov_Banten::onlyTrashed()->get();

        return view('Data-Provinsi.Jawa.Banten.trash', compact('banten_locs'));
    }

    public function restore($id_kabupaten_banten = null) {
        if ($id_kabupaten_banten != null) {
            Prov_Banten::onlyTrashed()
                ->where('id_kabupaten_banten', $id_kabupaten_banten)
                ->restore();
            return redirect('banten/prov_banten')->with('status', 'Kabupaten berhasil di-restore!');
        } else {
            prov_banten::onlyTrashed()->restore();
            return redirect('banten/prov_banten')->with('status', 'Semua Data berhasil di-restore!');
        }
    }

    public function delete($id_kabupaten_banten = null) {
        if ($id_kabupaten_banten != null) {
            Prov_Banten::onlyTrashed()
                ->where('id_kabupaten_banten', $id_kabupaten_banten)
                ->forceDelete();
            return redirect('banten/prov_banten/trash')->with('status', 'Kabupaten berhasil dihapus Permanent!');
        } else {
            Prov_Banten::onlyTrashed()->forceDelete();
            return redirect('banten/prov_banten/trash')->with('status', 'Semua Data berhasil dihapus Permanent!');
        }
    }
}
