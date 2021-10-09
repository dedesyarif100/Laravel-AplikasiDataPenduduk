<?php

namespace App\Http\Controllers;

use App\Models\DataProvinsi;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class DataProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataProvinsi = DataProvinsi::orderBy('id', 'DESC')->paginate(5);
        return view('Provinsi.index', compact('dataProvinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Provinsi.create');
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
            'nama_provinsi' => 'required:3',
        ], [
            'nama_provinsi.required' => 'Provinsi tidak boleh kosong!'
        ]);

        DataProvinsi::create($request->all());
        return redirect('provinsi/provinsi')->with('status', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataProvinsi  $dataProvinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataProvinsi = DataProvinsi::where('id', $id)->first();
        return view('provinsi.show', compact('dataProvinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataProvinsi  $dataProvinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataProvinsi = DataProvinsi::where('id', $id)->first();
        return view('Provinsi.edit', compact('dataProvinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataProvinsi  $dataProvinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_provinsi' => 'required:3',
        ], [
            'nama_provinsi.required' => 'Provinsi tidak boleh kosong!'
        ]);

        DataProvinsi::where('id', $id)->update([
            'nama_provinsi' => $request->nama_provinsi,
        ]);
        return redirect('provinsi/provinsi')->with('status', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataProvinsi  $dataProvinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataProvinsi::where('id', $id)->delete();
        return redirect('provinsi/provinsi')->with('status', 'Data berhasil dihapus!');
    }

    public function trash()
    {

    }

    public function restore()
    {

    }

    public function delete()
    {

    }
}
