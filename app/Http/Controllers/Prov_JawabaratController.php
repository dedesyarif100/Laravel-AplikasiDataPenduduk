<?php

namespace App\Http\Controllers;

use App\Models\Prov_Jawabarat;
use Illuminate\Http\Request;

class Prov_JawabaratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jawabarat_locs = Prov_Jawabarat::paginate(5);
        return view('Data-Provinsi.Jawa.Jawa-Barat.index', compact('jawabarat_locs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Provinsi.Jawa.Jawa-Barat.create');
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
            'nama_kabupaten_jawabarat' => 'required:3',
            'luas_wilayah_jawabarat' => 'required',
            'total_penduduk_jawabarat' => 'required',
        ], [
            'nama_kabupaten_jawabarat.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_jawabarat.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_jawabarat.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        // Quick Mass Assignment : syarat, field tabel dan nama inputan harus sama, dan harus mendefinisikan nama kolomnya di model / Property fillable
        Prov_Jawabarat::create($request->all());

        return redirect('prov_jawabarat')->with('status', 'Kabupaten berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prov_Jawabarat  $prov_Jawabarat
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_jawabarat)
    {
        $jawabarat_locs = Prov_Jawabarat::where('id_kabupaten_jawabarat', $id_kabupaten_jawabarat)->first();
        return view('Data-Provinsi.Jawa.Jawa-Barat.show', compact('jawabarat_locs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prov_Jawabarat  $prov_Jawabarat
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kabupaten_jawabarat)
    {
        $jawabarat_locs =  Prov_Jawabarat::where('id_kabupaten_jawabarat', $id_kabupaten_jawabarat)->first();
        // return $jawabarat_locs;
        return view('Data-Provinsi.Jawa.Jawa-Barat.edit', compact('jawabarat_locs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prov_Jawabarat  $prov_Jawabarat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kabupaten_jawabarat)
    {
        $request->validate([
            'nama_kabupaten_jawabarat' => 'required:3',
            'luas_wilayah_jawabarat' => 'required',
            'total_penduduk_jawabarat' => 'required',
        ], [
            'nama_kabupaten_jawabarat.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_jawabarat.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_jawabarat.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        Prov_Jawabarat::where('id_kabupaten_jawabarat', $id_kabupaten_jawabarat)
            ->update([
                'nama_kabupaten_jawabarat' => $request->nama_kabupaten_jawabarat,
                'luas_wilayah_jawabarat' => $request->luas_wilayah_jawabarat,
                'total_penduduk_jawabarat' => $request->total_penduduk_jawabarat,
            ]);
        return redirect('prov_jawabarat')->with('status', 'Kabupaten berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prov_Jawabarat  $prov_Jawabarat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prov_Jawabarat $jawabarat_locs, $id_kabupaten_jawabarat)
    {
        $deleterows = Prov_Jawabarat::where('id_kabupaten_jawabarat', $id_kabupaten_jawabarat)->delete();
        // return $deleterows;
        return redirect('prov_jawabarat')->with('status', 'Kabupaten berhasil dihapus!');
    }

    public function trash() {
        $jawabarat_locs = Prov_Jawabarat::onlyTrashed()->get();

        return view('Data-Provinsi.Jawa.Jawa-Barat.trash', compact('jawabarat_locs'));
    }

    public function restore($id_kabupaten_jawabarat = null)
    {
        if ($id_kabupaten_jawabarat != null) {
            $tes = Prov_Jawabarat::onlyTrashed()
                ->where('id_kabupaten_jawabarat', $id_kabupaten_jawabarat)
                ->restore();
            return redirect('prov_jawabarat')->with('status', 'Kabupaten berhasil di-restore!');
            // echo "True";
            // return $tes;
        } else {
            $tes = Prov_Jawabarat::onlyTrashed()->restore();
            return redirect('prov_jawabarat')->with('status', 'Semua Data berhasil di-restore!');
            // echo "False";
            // return $tes;
        }

        // echo "Restore";
    }

    public function delete($id_kabupaten_jawabarat = null)
    {
        if ($id_kabupaten_jawabarat != null) {
            Prov_Jawabarat::onlyTrashed()
                ->where('id_kabupaten_jawabarat', $id_kabupaten_jawabarat)
                ->forceDelete();
            // return true;
        } else {
            Prov_Jawabarat::onlyTrashed()->forceDelete();
            // return false;
        }

        return redirect('prov_jawabarat/trash')->with('status', 'Kabupaten berhasil dihapus permanent!');
    }
}
