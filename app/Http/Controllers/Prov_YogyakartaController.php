<?php

namespace App\Http\Controllers;

use App\Models\Prov_Yogyakarta;
use Illuminate\Http\Request;

class Prov_YogyakartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yogyakarta_locs = Prov_Yogyakarta::orderBy('id_kabupaten_yogyakarta', 'DESC')->paginate(5);
        return view('Data-Provinsi.Jawa.DI-Yogyakarta.index', compact('yogyakarta_locs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Provinsi.Jawa.DI-Yogyakarta.create');
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
            'nama_kabupaten_yogyakarta' => 'required:3',
            'luas_wilayah_yogyakarta' => 'required',
            'total_penduduk_yogyakarta' => 'required'
        ], [
            'nama_kabupaten_yogyakarta.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_yogyakarta.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_yogyakarta.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        Prov_Yogyakarta::create([
            'nama_kabupaten_yogyakarta' => $request->nama_kabupaten_yogyakarta,
            'luas_wilayah_yogyakarta' => $request->luas_wilayah_yogyakarta,
            'total_penduduk_yogyakarta' => $request->total_penduduk_yogyakarta,
        ]);

        return redirect('yogyakarta/prov_yogyakarta')->with('status', 'Kabupaten berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prov_Yogyakarta  $prov_Yogyakarta
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_yogyakarta)
    {
        $yogyakarta_locs = Prov_Yogyakarta::where('id_kabupaten_yogyakarta', $id_kabupaten_yogyakarta)->first();;
        return view('Data-Provinsi.Jawa.DI-Yogyakarta.show', compact('yogyakarta_locs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prov_Yogyakarta  $prov_Yogyakarta
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kabupaten_yogyakarta)
    {
        $yogyakarta_locs = Prov_Yogyakarta::where('id_kabupaten_yogyakarta', $id_kabupaten_yogyakarta)->first();
        return view('Data-Provinsi.Jawa.DI-Yogyakarta.edit', compact('yogyakarta_locs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prov_Yogyakarta  $prov_Yogyakarta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kabupaten_yogyakarta)
    {
        $request->validate([
            'nama_kabupaten_yogyakarta' => 'required:3',
            'luas_wilayah_yogyakarta' => 'required',
            'total_penduduk_yogyakarta' => 'required',
        ], [
            'nama_kabupaten_yogyakarta.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_yogyakarta.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_yogyakarta.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        Prov_Yogyakarta::where('id_kabupaten_yogyakarta', $id_kabupaten_yogyakarta)
            ->update([
                'nama_kabupaten_yogyakarta' => $request->nama_kabupaten_yogyakarta,
                'luas_wilayah_yogyakarta' => $request->luas_wilayah_yogyakarta,
                'total_penduduk_yogyakarta' => $request->total_penduduk_yogyakarta,
            ]);

        return redirect('yogyakarta/prov_yogyakarta')->with('status', 'Kabupaten berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prov_Yogyakarta  $prov_Yogyakarta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kabupaten_yogyakarta)
    {
        Prov_Yogyakarta::where('id_kabupaten_yogyakarta', $id_kabupaten_yogyakarta)->delete();
        return redirect('yogyakarta/prov_yogyakarta')->with('status', 'Kabupaten berhasil dihapus!');
    }

    public function trash() {
        $yogyakarta_locs = Prov_Yogyakarta::onlyTrashed()->get();
        return view('Data-Provinsi.Jawa.DI-Yogyakarta.trash', compact('yogyakarta_locs'));
    }

    public function restore($id_kabupaten_yogyakarta = null) {
        if ($id_kabupaten_yogyakarta != null) {
            Prov_Yogyakarta::onlyTrashed()
                ->where('id_kabupaten_yogyakarta', $id_kabupaten_yogyakarta)
                ->restore();

            return redirect('yogyakarta/prov_yogyakarta')->with('status', 'Kabupaten berhasil di-restore!');
        } else {
            Prov_Yogyakarta::onlyTrashed()->restore();

            return redirect('yogyakarta/prov_yogyakarta')->with('status', 'Semua Data berhasil di-restore!');
        }
    }

    public function delete($id_kabupaten_yogyakarta = null) {
        if ($id_kabupaten_yogyakarta != null) {
            Prov_Yogyakarta::onlyTrashed()
                ->where('id_kabupaten_yogyakarta', $id_kabupaten_yogyakarta)
                ->forceDelete();

            return redirect('yogyakarta/prov_yogyakarta/trash')->with('status', 'Kabupaten berhasil dihapus permanent!');
        } else {
            Prov_Yogyakarta::onlyTrashed()->forceDelete();

            return redirect('yogyakarta/prov_yogyakarta/trash')->with('status', 'Semua Data berhasil dihapus permanent!');
        }
    }
}
