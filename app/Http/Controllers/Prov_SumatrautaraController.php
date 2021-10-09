<?php

namespace App\Http\Controllers;

use App\Models\Prov_Sumatrautara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Prov_SumatrautaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sumatrautara_locs = DB::table('prov_sumatrautara_locs')->orderBy('id_kabupaten_sumatrautara', 'DESC')->paginate(5);
        return view('Data-Provinsi.Sumatra.Sumatra-Utara.index', compact('sumatrautara_locs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Data-Provinsi.Sumatra.Sumatra-Utara.create');
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
            'nama_kabupaten_sumatrautara' => ['required', 'max:30'],
            'luas_wilayah_sumatrautara' => 'required',
            'total_penduduk_sumatrautara' => 'required',
        ], [
            'nama_kabupaten_sumatrautara.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_sumatrautara.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_sumatrautara.required' => 'Total Penduduk tidak boleh kosong',
        ]);

        DB::table('prov_sumatrautara_locs')->insert([
            'nama_kabupaten_sumatrautara' => $request->nama_kabupaten_sumatrautara,
            'luas_wilayah_sumatrautara' => $request->luas_wilayah_sumatrautara,
            'total_penduduk_sumatrautara' => $request->total_penduduk_sumatrautara,
        ]);
        return redirect('sumatra-utara/prov_sumatra-utara')->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prov_Sumatrautara  $prov_Sumatrautara
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_sumatrautara)
    {
        $sumatrautara_locs = DB::table('prov_sumatrautara_locs')->where('id_kabupaten_sumatrautara', $id_kabupaten_sumatrautara)->first();
        return view('Data-Provinsi.Sumatra.Sumatra-Utara.show', compact('sumatrautara_locs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prov_Sumatrautara  $prov_Sumatrautara
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kabupaten_sumatrautara)
    {
        $sumatrautara_locs = DB::table('prov_sumatrautara_locs')->where('id_kabupaten_sumatrautara', $id_kabupaten_sumatrautara)->first();
        return view('Data-Provinsi.Sumatra.Sumatra-Utara.edit', compact('sumatrautara_locs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prov_Sumatrautara  $prov_Sumatrautara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kabupaten_sumatrautara)
    {
        $request->validate([
            'nama_kabupaten_sumatrautara' => 'required:3',
            'luas_wilayah_sumatrautara' => 'required',
            'total_penduduk_sumatrautara' => 'required',
        ], [
            'nama_kabupaten_sumatrautara.required' => 'Kabupaten tidak boleh kosong',
            'luas_wilayah_sumatrautara.required' => 'Luas Wilayah tidak boleh kosong',
            'total_penduduk_sumatrautara' => 'Total Penduduk tidak boleh kosong',
        ]);

        DB::table('prov_sumatrautara_locs')
            ->where('id_kabupaten_sumatrautara', $id_kabupaten_sumatrautara)
            ->update([
                'nama_kabupaten_sumatrautara' => $request->nama_kabupaten_sumatrautara,
                'luas_wilayah_sumatrautara' => $request->luas_wilayah_sumatrautara,
                'total_penduduk_sumatrautara' => $request->total_penduduk_sumatrautara,
            ]);
        return redirect('sumatra-utara/prov_sumatra-utara')->with('status', 'Data Berhasil di-update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prov_Sumatrautara  $prov_Sumatrautara
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kabupaten_sumatrautara)
    {
        DB::table('prov_sumatrautara_locs')
            ->where('id_kabupaten_sumatrautara', $id_kabupaten_sumatrautara)
            ->delete();
        return redirect('sumatra-utara/prov_sumatra-utara')->with('status', 'Data Berhasil Dihapus!');
    }

    // public function trash() {
    //     $sumatrautara_locs = DB::table('prov_sumatrautara_locs')->onlyTrashed();
    //     return view('Data-Provinsi.Sumatra.Sumatra-Utara.trash', compact('sumatrautara_locs'));
    // }

    // public function restore($id_kabupaten_sumatrautara = null) {
    //     if ($id_kabupaten_sumatrautara != null) {
    //         DB::table('prov_sumatrautara_locs')->where('id_kabupaten_sumatrautara')->restore();
    //         return redirect('sumatra-utara/prov_sumatra-utara')->with('status', 'Data Berhasil di-restore!');
    //     } else {
    //         DB::table('prov_sumatrautara_locs')->restore();
    //         return redirect('sumatra-utara/prov_sumatra-utara')->with('status', 'Semua Data Berhasil di-restore!');
    //     }
    // }

    // public function delete($id_kabupaten_sumatrautara = null) {
    //     if ($id_kabupaten_sumatrautara != null) {
    //         DB::table('prov_sumatrautara_locs')
    //             ->where('id_kabupaten_sumatrautara', $id_kabupaten_sumatrautara)
    //             ->forceDelete();
    //         return redirect('sumatra-utara/prov_sumatra-utara/trash')->with('status', 'Data Berhasil dihapus permanent!');
    //     } else {
    //         DB::table('prov_sumatrautara_locs')->forceDelete();
    //         return redirect('sumatra-utara/prov_sumatra-utara/trash')->with('status', 'Semua Data Berhasil dihapus permanent!');
    //     }
    // }
}
