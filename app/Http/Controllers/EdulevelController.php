<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdulevelController extends Controller
{
    public function data() {
        $edulevels = DB::table('edulevels')->orderBy('id', 'DESC')->paginate(5); // Query Builder
        // return $edulevels;
        // dd($edulevels);
        return view('edulevel.data', ['edulevels'=>$edulevels]);
        // return view('edulevel.data', compact('edulevels'));
        // return view('edulevel.data')->with('edulevels', $edulevels);
    }

    public function add() {
        return view('edulevel.add');
    }

    public function addProcess(Request $request) {
        $request->validate([ // Form Validate Laravel
            'name' => 'required|min:2',
            'desc' => 'required',
        ], [
            'name.required' => 'Nama jenjang tidak boleh kosong',
            'desc.required' => 'Nama deskripsi tidak boleh kosong',
        ]);

        DB::table('edulevels')->insert([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);
        return redirect('edulevels/edulevels')->with('status', 'Data Berhasil Ditambah!');
        // return redirect()->away('https://www.udemy.com/course/pemrograman-java-pemula-sampai-mahir/');
        // return $request;
    }

    public function edit($id) {
        $edulevels = DB::table('edulevels')->where('id', $id)->first();
        // dd($edulevels);
        return view('edulevel/edit', compact('edulevels'));
    }

    public function editProcess(Request $request, $id) {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required',
        ], [
            'name.required' => 'Nama jenjang tidak boleh kosong',
            'desc.required' => 'Nama deskripsi tidak boleh kosong',
        ]);
        DB::table('edulevels')->where('id', $id)
            ->update([
                'name' => $request->name,
                'desc' => $request->desc,
            ]);
        return redirect('edulevels/edulevels')->with('status', 'Data Berhasil Diupdate!');
    }

    public function delete($id) {
        DB::table('edulevels')->where('id', $id)->delete();
        return redirect('edulevels/edulevels')->with('status', 'Data Berhasil Dihapus!');
    }
}
