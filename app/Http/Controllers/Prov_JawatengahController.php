<?php

namespace App\Http\Controllers;

use App\Models\Prov_Jawatengah;
use Illuminate\Http\Request;

class Prov_JawatengahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jawatengah_locs = Prov_Jawatengah::orderBy('created_at', 'DESC')->paginate(5);
        return view('Data-Provinsi.Jawa.Jawa-Tengah.index', compact('jawatengah_locs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Provinsi.Jawa.Jawa-Tengah.create');
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
            'nama_kabupaten_jawatengah' => 'required:3',
            'luas_wilayah_jawatengah' => 'required',
            'total_penduduk_jawatengah' => 'required',
        ], [
            'nama_kabupaten_jawatengah.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_jawatengah.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_jawatengah.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        // Quick Mass Assignment : syarat, field tabel dan nama inputan harus sama, dan harus mendefinisikan nama kolomnya di model / Property fillable
        Prov_Jawatengah::create($request->all());

        return redirect('jawatengah/prov_jawatengah')->with('status', 'Kabupaten berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prov_Jawatengah  $prov_Jawatengah
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_jawatengah)
    {
        $jawatengah_locs = Prov_Jawatengah::where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah)->first();
        return view('Data-Provinsi.Jawa.Jawa-Tengah.show', compact('jawatengah_locs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prov_Jawatengah  $prov_Jawatengah
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kabupaten_jawatengah)
    {
        $jawatengah_locs = Prov_Jawatengah::where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah)->first();

        return view('Data-Provinsi.Jawa.Jawa-Tengah.edit', compact('jawatengah_locs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prov_Jawatengah  $prov_Jawatengah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kabupaten_jawatengah)
    {
        $request->validate([
            'nama_kabupaten_jawatengah' => 'required:3',
            'luas_wilayah_jawatengah' => 'required',
            'total_penduduk_jawatengah' => 'required',
        ], [
            'nama_kabupaten_jawatengah.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_jawatengah.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_jawatengah.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        Prov_Jawatengah::where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah)
            ->update([
                'nama_kabupaten_jawatengah' => $request->nama_kabupaten_jawatengah,
                'luas_wilayah_jawatengah' => $request->luas_wilayah_jawatengah,
                'total_penduduk_jawatengah' => $request->total_penduduk_jawatengah,
            ]);
        return redirect('jawatengah/prov_jawatengah')->with('status', 'Kabupaten berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prov_Jawatengah  $prov_Jawatengah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prov_Jawatengah $jawatengah_locs, $id_kabupaten_jawatengah)
    {
        Prov_Jawatengah::where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah)->delete();

        return redirect('jawatengah/prov_jawatengah')->with('status', 'Kabupaten berhasil dihapus!');
    }

    public function trash() {
        $jawatengah_locs = Prov_Jawatengah::onlyTrashed()->get();

        return view('Data-Provinsi.Jawa.Jawa-Tengah.trash', compact('jawatengah_locs'));
    }

    public function restore($id_kabupaten_jawatengah = null)
    {
        if ($id_kabupaten_jawatengah != null) {
            Prov_Jawatengah::onlyTrashed()
                ->where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah)
                ->restore();

            return redirect('jawatengah/prov_jawatengah')->with('status', 'Kabupaten berhasil di-restore!');
        } else {
            Prov_Jawatengah::onlyTrashed()->restore();

            return redirect('jawatengah/prov_jawatengah')->with('status', 'Semua Data berhasil di-restore!');
        }
    }

    public function delete($id_kabupaten_jawatengah = null)
    {
        if ($id_kabupaten_jawatengah != null) {
            Prov_Jawatengah::onlyTrashed()
                ->where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah)
                ->forceDelete();

            return redirect('jawatengah/prov_jawatengah/trash')->with('status', 'Kabupaten berhasil dihapus permanent!');
        } else {
            Prov_Jawatengah::onlyTrashed()->forceDelete();

            return redirect('jawatengah/prov_jawatengah/trash')->with('status', 'Semua Data berhasil dihapus permanent!');
        }
    }
}
