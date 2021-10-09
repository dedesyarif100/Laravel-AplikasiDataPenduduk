<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Prov_Jawatimur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Api_Prov_JawatimurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jawatimur_locs = Prov_Jawatimur::orderBy('id_kabupaten_jawatimur', 'DESC')->get();
        if (Prov_Jawatimur::count() > 0) {
            return response()->json([
                'success' => true,
                'message' => 'Data True',
                'data'    => $jawatimur_locs
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data False',
                'data'    => $jawatimur_locs
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('Data-Provinsi.Jawa.Jawa-Timur.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kabupaten_jawatimur' => 'required:3',
            'luas_wilayah_jawatimur'   => 'required',
            'total_penduduk_jawatimur' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $jawatimur_locs = Prov_Jawatimur::create([
            'nama_kabupaten_jawatimur' => $request->nama_kabupaten_jawatimur,
            'luas_wilayah_jawatimur'   => $request->luas_wilayah_jawatimur,
            'total_penduduk_jawatimur' => $request->total_penduduk_jawatimur,
        ]);

        //success save to database
        if ($jawatimur_locs) {
            return response()->json([
                'success' => true,
                'message' => 'Kabupaten Created',
                'data'    => $jawatimur_locs
            ], 201);
        } else {
            //failed save to database
            return response()->json([
                'success' => false,
                'message' => 'Kabupaten failed to save',
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kabupaten_jawatimur)
    {
        // $jawatimur_locs = Prov_Jawatimur::where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur)->first();
        // return view('Data-Provinsi.Jawa.Jawa-Timur.show', compact('jawatimur_locs'));

        $jawatimur_locs = Prov_Jawatimur::where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur)->first();
        // make response JSON
        if (Prov_Jawatimur::where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur)->exists()) {
            return response()->json([
                'success' => true,
                'message' => 'Data True',
                'data'    => $jawatimur_locs
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kabupaten Not Found',
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prov_Jawatimur $jawatimur_locs, $id_kabupaten_jawatimur)
    {
        $validator = Validator::make($request->all(),[
            'nama_kabupaten_jawatimur' => 'required:3',
            'luas_wilayah_jawatimur'   => 'required',
            'total_penduduk_jawatimur' => 'required'
        ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 400);
        // }
        Prov_Jawatimur::where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur);

        if (Prov_Jawatimur::where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur)->exists()) {
            $jawatimur_locs = Prov_Jawatimur::where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur)
                ->update([
                    'nama_kabupaten_jawatimur' => $request->nama_kabupaten_jawatimur,
                    'luas_wilayah_jawatimur'   => $request->luas_wilayah_jawatimur,
                    'total_penduduk_jawatimur' => $request->total_penduduk_jawatimur
                ]);

            return response()->json([
                'success' => true,
                'message' => 'Kabupaten updated',
                'data'    => $jawatimur_locs
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kabupaten Not Found'
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prov_Jawatimur $jawatimur_locs, $id_kabupaten_jawatimur)
    {
        $jawatimur_locs = Prov_Jawatimur::where('id_kabupaten_jawatimur', $id_kabupaten_jawatimur);
        if ($jawatimur_locs) {
            $jawatimur_locs->delete();
            return response()->json([
                'success' => true,
                'message' => 'Kabupaten Deleted'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kabupaten Not Found'
            ], 400);
        }
    }

    public function trash() {
        $jawatimur_locs = Prov_Jawatimur::onlyTrashed()->orderBy('id_kabupaten_jawatimur', 'DESC')->get();
        // dd(Prov_Jawatimur::onlyTrashed()->count());
        if (Prov_Jawatimur::onlyTrashed()->count() > 0) {
            return response()->json([
                'success' => true,
                'message' => 'Data True',
                'data'    => $jawatimur_locs
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data False',
                'data'    => 'Data Empty'
            ], 400);
        }
    }
}
