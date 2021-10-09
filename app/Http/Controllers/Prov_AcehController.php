<?php

namespace App\Http\Controllers;

use App\Models\Prov_Aceh;
use Illuminate\Http\Request;

class Prov_AcehController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aceh_locs = Prov_Aceh::orderBy('id_kabupaten_aceh', 'DESC')->paginate(5);
        return view('Data-Provinsi.Sumatra.Aceh.index', compact('aceh_locs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Provinsi.Sumatra.Aceh.create');
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
            'nama_kabupaten_aceh' => 'required:3',
            'luas_wilayah_aceh' => 'required',
            'total_penduduk_aceh' => 'required',
        ], [
            'nama_kabupaten_aceh.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_aceh.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_aceh.required' => 'Total Penduduk tidak boleh kosong',
        ]);
        Prov_Aceh::create($request->all());
        return redirect('aceh/prov_aceh')->with('status', 'Kabupaten berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prov_Aceh  $prov_Aceh
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_aceh)
    {
        $aceh_locs = Prov_Aceh::where('id_kabupaten_aceh', $id_kabupaten_aceh)->first();
        return view('Data-Provinsi.Sumatra.Aceh.show', compact('aceh_locs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prov_Aceh  $prov_Aceh
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kabupaten_aceh)
    {
        $aceh_locs = Prov_Aceh::where('id_kabupaten_aceh', $id_kabupaten_aceh)->first();
        return view('Data-Provinsi.Sumatra.Aceh.edit', compact('aceh_locs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prov_Aceh  $prov_Aceh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prov_Aceh $aceh_locs, $id_kabupaten_aceh)
    {
        $request->validate([
            'nama_kabupaten_aceh' => 'required:3',
            'luas_wilayah_aceh' => 'required',
            'total_penduduk_aceh' => 'required',
        ], [
            'nama_kabupaten_aceh.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_aceh.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_aceh.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        Prov_Aceh::where('id_kabupaten_aceh', $id_kabupaten_aceh)
            ->update([
                'nama_kabupaten_aceh' => $request->nama_kabupaten_aceh,
                'luas_wilayah_aceh' => $request->luas_wilayah_aceh,
                'total_penduduk_aceh' => $request->total_penduduk_aceh,
            ]);

        return redirect('aceh/prov_aceh')->with('status', 'Jenjang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prov_Aceh  $prov_Aceh
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kabupaten_aceh)
    {
        Prov_Aceh::where('id_kabupaten_aceh', $id_kabupaten_aceh)->delete();
        return redirect('aceh/prov_aceh')->with('status', 'Kabupaten berhasil dihapus!');
    }

    public function trash() {
        $aceh_locs = Prov_Aceh::onlyTrashed()->get();
        return view('Data-Provinsi.Sumatra.Aceh.trash', compact('aceh_locs'));
    }

    public function restore($id_kabupaten_aceh = null) {
        if ($id_kabupaten_aceh) {
            Prov_Aceh::onlyTrashed()
                ->where('id_kabupaten_aceh', $id_kabupaten_aceh)
                ->restore();
            return redirect('aceh/prov_aceh')->with('status', 'Kabupaten berhasil di-restore!');
        } else {
            Prov_Aceh::onlyTrashed()->restore();
            return redirect('aceh/prov_aceh')->with('status', 'Semua Data berhasil di-restore!');
        }
    }

    public function delete($id_kabupaten_aceh = null) {
        if ($id_kabupaten_aceh != null) {
            Prov_Aceh::onlyTrashed()
                ->where('id_kabupaten_aceh', $id_kabupaten_aceh)
                ->forceDelete();
            return redirect('aceh/prov_aceh/trash')->with('status', 'Kabupaten berhasil dihapus Permanent!');
        } else {
            Prov_Aceh::onlyTrashed()->forceDelete();
            return redirect('aceh/prov_aceh/trash')->with('status', 'Semua Data berhasil dihapus Permanent!');
        }
    }
}
