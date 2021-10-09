<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prov_Jambi;

class Prov_JambiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jambi_locs = Prov_Jambi::orderBy('id_kabupaten_jambi', 'DESC')->paginate(5);
        return view('Data-Provinsi.Sumatra.Jambi.index', compact('jambi_locs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Provinsi.Sumatra.Jambi.create');
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
            'nama_kabupaten_jambi' => 'required:3',
            'luas_wilayah_jambi' => 'required',
            'total_penduduk_jambi' => 'required',
        ], [
            'nama_kabupaten_jambi.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_jambi.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_jambi.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        // Quick Mass Assignment : syarat, field tabel dan nama inputan harus sama, dan harus mendefinisikan nama kolomnya di model / Property fillable
        Prov_Jambi::create($request->all());

        return redirect('jambi/prov_jambi')->with('status', 'Kabupaten berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_jambi)
    {
        $jambi_locs = Prov_Jambi::where('id_kabupaten_jambi', $id_kabupaten_jambi)->first();
        return view('Data-Provinsi.Sumatra.Jambi.show', compact('jambi_locs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kabupaten_jambi)
    {
        $jambi_locs = Prov_Jambi::where('id_kabupaten_jambi', $id_kabupaten_jambi)->first();
        return view('Data-Provinsi.Sumatra.Jambi.edit', compact('jambi_locs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kabupaten_jambi)
    {
        $request->validate([
            'nama_kabupaten_jambi' => 'required:3',
            'luas_wilayah_jambi' => 'required',
            'total_penduduk_jambi' => 'required',
        ], [
            'nama_kabupaten_jambi.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_jambi.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_jambi.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        Prov_Jambi::where('id_kabupaten_jambi', $id_kabupaten_jambi)
            ->update([
                'nama_kabupaten_jambi' => $request->nama_kabupaten_jambi,
                'luas_wilayah_jambi' => $request->luas_wilayah_jambi,
                'total_penduduk_jambi' => $request->total_penduduk_jambi,
            ]);
        return redirect('jambi/prov_jambi')->with('status', 'Kabupaten berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prov_Jambi $jambi_locs, $id_kabupaten_jambi)
    {
        Prov_Jambi::where('id_kabupaten_jambi', $id_kabupaten_jambi)->delete();
        return redirect('jambi/prov_jambi')->with('status', 'Kabupaten berhasil dihapus!');
    }

    public function trash() {
        $jambi_locs = Prov_Jambi::onlyTrashed()->get();

        return view('Data-Provinsi.Sumatra.Jambi.trash', compact('jambi_locs'));
    }

    public function restore($id_kabupaten_jambi = null) {
        if ($id_kabupaten_jambi != null) {
            Prov_Jambi::onlyTrashed()
                ->where('id_kabupaten_jambi', $id_kabupaten_jambi)
                ->restore();
            return redirect('jambi/prov_jambi')->with('status', 'Kabupaten berhasil di-restore!');
        } else {
            Prov_Jambi::onlyTrashed()->restore();
            return redirect('jambi/prov_jambi')->with('status', 'Semua Data berhasil di-restore!');
        }
    }

    public function delete($id_kabupaten_jambi = null) {
        if ($id_kabupaten_jambi != null) {
            Prov_Jambi::onlyTrashed()
                ->where('id_kabupaten_jambi', $id_kabupaten_jambi)
                ->forceDelete();
            return redirect('jambi/prov_jambi/trash')->with('status', 'Kabupaten berhasil dihapus permanent!');
        } else {
            Prov_Jambi::onlyTrashed()->forceDelete();
            return redirect('jambi/prov_jambi/trash')->with('status', 'Semua Data berhasil dihapus permanent!');
        }
    }
}
