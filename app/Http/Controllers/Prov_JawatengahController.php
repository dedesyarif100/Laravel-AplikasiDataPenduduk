<?php

namespace App\Http\Controllers;

use App\Models\Prov_Jawatengah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Prov_JawatengahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $jawatengah_locs = Prov_Jawatengah::orderBy('created_at', 'DESC')->paginate(5);
        // return view('Data-Provinsi.Jawa.Jawa-Tengah.index', compact('jawatengah_locs'));

        $jawatengah_locs = Prov_Jawatengah::orderBy('id_kabupaten_jawatengah', 'DESC')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data True',
            'data'    => $jawatengah_locs
        ], 200);
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
        // $request->validate([
        //     'nama_kabupaten_jawatengah' => 'required:3',
        //     'luas_wilayah_jawatengah' => 'required',
        //     'total_penduduk_jawatengah' => 'required',
        // ], [
        //     'nama_kabupaten_jawatengah.required' => 'Kabupaten tidak boleh kosong',
        //     'luas_wilayah_jawatengah.required' => 'Luas Wilayah tidak boleh kosong',
        //     'total_penduduk_jawatengah.required' => 'Total Penduduk tidak boleh kosong',
        // ]);

        // Quick Mass Assignment : syarat, field tabel dan nama inputan harus sama, dan harus mendefinisikan nama kolomnya di model / Property fillable
        // Prov_Jawatengah::create($request->all());

        // return redirect('jawatengah/prov_jawatengah')->with('status', 'Kabupaten berhasil ditambah!');

        $validator = Validator::make($request->all(),[
            'nama_kabupaten_jawatengah' => 'required:3',
            'luas_wilayah_jawatengah'   => 'required',
            'total_penduduk_jawatengah' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $jawatengah_locs = Prov_Jawatengah::create([
            'nama_kabupaten_jawatengah' => $request->nama_kabupaten_jawatengah,
            'luas_wilayah_jawatengah'   => $request->luas_wilayah_jawatengah,
            'total_penduduk_jawatengah' => $request->total_penduduk_jawatengah,
        ]);

        //success save to database
        if ($jawatengah_locs) {
            return response()->json([
                'success' => true,
                'message' => 'Kabupaten Created',
                'data'    => $jawatengah_locs
            ], 201);
        } else {
        //failed save to database
            return response()->json([
                'success' => false,
                'message' => 'Kabupaten Failed to Save',
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prov_Jawatengah  $prov_Jawatengah
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_jawatengah)
    {
        // $jawatengah_locs = Prov_Jawatengah::where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah)->first();
        // return view('Data-Provinsi.Jawa.Jawa-Tengah.show', compact('jawatengah_locs'));

        $jawatengah_locs = Prov_Jawatengah::where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah)->first();
        // make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data True',
            'data'    => $jawatengah_locs
        ], 200);
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
    public function update(Request $request, Prov_Jawatengah $jawatengah_locs, $id_kabupaten_jawatengah)
    {
        // $request->validate([
        //     'nama_kabupaten_jawatengah' => 'required:3',
        //     'luas_wilayah_jawatengah' => 'required',
        //     'total_penduduk_jawatengah' => 'required',
        // ], [
        //     'nama_kabupaten_jawatengah.required' => 'Kabupaten tidak boleh kosong',
        //     'luas_wilayah_jawatengah.required' => 'Luas Wilayah tidak boleh kosong',
        //     'total_penduduk_jawatengah.required' => 'Total Penduduk tidak boleh kosong',
        // ]);

        // Prov_Jawatengah::where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah)
        //     ->update([
        //         'nama_kabupaten_jawatengah' => $request->nama_kabupaten_jawatengah,
        //         'luas_wilayah_jawatengah' => $request->luas_wilayah_jawatengah,
        //         'total_penduduk_jawatengah' => $request->total_penduduk_jawatengah,
        //     ]);
        // return redirect('jawatengah/prov_jawatengah')->with('status', 'Kabupaten berhasil diupdate!');

        $validator = Validator::make($request->all(),[
            'nama_kabupaten_jawatengah' => 'required:3',
            'luas_wilayah_jawatengah'   => 'required',
            'total_penduduk_jawatengah' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // $jawatengah_locs = Prov_Jawatengah::where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah);

        if ($jawatengah_locs) {
            $jawatengah_locs = Prov_Jawatengah::where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah)
                ->update([
                    'nama_kabupaten_jawatengah' => $request->nama_kabupaten_jawatengah,
                    'luas_wilayah_jawatengah'   => $request->luas_wilayah_jawatengah,
                    'total_penduduk_jawatengah' => $request->total_penduduk_jawatengah,
                ]);

            return response()->json([
                'success' => true,
                'message' => 'Kabupaten Updated',
                'data'    => $jawatengah_locs
            ], 200);
        } else {
            //data post not found
            return response()->json([
                'success' => false,
                'message' => 'Kabupaten Not Found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prov_Jawatengah  $prov_Jawatengah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prov_Jawatengah $jawatengah_locs, $id_kabupaten_jawatengah)
    {
        // Prov_Jawatengah::where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah)->delete();

        // return redirect('jawatengah/prov_jawatengah')->with('status', 'Kabupaten berhasil dihapus!');

        $jawatengah_locs = Prov_Jawatengah::where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah);
        if ($jawatengah_locs) {
            $jawatengah_locs->delete();
            return response()->json([
                'success' => true,
                'message' => 'Kabupaten Deleted',
            ], 200);
        } else {
            //data kabupaten not found
            return response()->json([
                'success' => false,
                'message' => 'Kabupaten Not Found',
            ], 404);
        }
    }

    public function trash() {
        // $jawatengah_locs = Prov_Jawatengah::onlyTrashed()->get();

        $jawatengah_locs = Prov_Jawatengah::onlyTrashed()->orderBy('id_kabupaten_jawatengah','DESC')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data True',
            'data'    => $jawatengah_locs
        ], 200);

        // return view('Data-Provinsi.Jawa.Jawa-Tengah.trash', compact('jawatengah_locs'));
    }

    public function restore($id_kabupaten_jawatengah = null)
    {
        // if ($id_kabupaten_jawatengah != null) {
        //     Prov_Jawatengah::onlyTrashed()
        //         ->where('id_kabupaten_jawatengah', $id_kabupaten_jawatengah)
        //         ->restore();ZZZ

        //     return redirect('jawatengah/prov_jawatengah')->with('status', 'Kabupaten berhasil di-restore!');
        // } else {
        //     Prov_Jawatengah::onlyTrashed()->restore();

        //     return redirect('jawatengah/prov_jawatengah')->with('status', 'Semua Data berhasil di-restore!');
        // }

        $jawatengah_locs = Prov_Jawatengah::onlyTrashed()->orderBy('id_kabupaten_jawatengah','DESC')->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data True',
            'data'    => $jawatengah_locs
        ], 200);
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
