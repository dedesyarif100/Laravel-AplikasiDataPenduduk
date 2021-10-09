<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Edulevel;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $programs = Program::all();
        $programs = Program::with('edulevel')->orderBy('created_at', 'DESC')->paginate(5);
        // return $programs;

        // $programs = Program::withTrashed()->get(); // Untuk menampilkan data yang dihapus sementara + data utama
        // $programs = Program::onlyTrashed()->get(); // Untuk menampilkan data yang dihapus sementara tanpa data utama

        return view('program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edulevels = Edulevel::all();
        return view('program.create', compact('edulevels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ // Form Validate Laravel
            'name' => 'required|min:3',
            'edulevel_id' => 'required',
        ], [
            'edulevel_id.required' => 'jenjang tidak boleh kosong',
        ]);

        // Cara 1
        // $program = new Program;
        // $program->name = $request->name;
        // $program->edulevel_id = $request->edulevel_id;
        // $program->student_price = $request->student_price;
        // $program->student_max = $request->student_max;
        // $program->info = $request->info;
        // $program->save();

        // Cara 2 : Mass Assignment
        // Program::create([
        //     'name' => $request->name,
        //     'edulevel_id' => $request->edulevel_id,
        //     'student_price' => $request->student_price,
        //     'student_max' => $request->student_max,
        //     'info' => $request->info,
        // ]);

        // Cara 3 : Quick Mass Assignment : syarat, field tabel dan nama inputan harus sama, dan harus mendefinisikan nama kolomnya di model / Property fillable
        // Program::create($request->all());

        // Cara 4 : Gabungan
        $program = new Program([
            'name' => $request->name,
            'edulevel_id' => $request->edulevel_id,
            'student_price' => $request->student_price,
            'student_max' => $request->student_max,
            'info' => $request->info,
        ]);
        $program->student_price = $request->student_price; // Kolom yang telah Guarded di Model Program, jika kita tetap ingin me-record value kolom tersebut, bisa didefinisikan seperti code ini
        $program->save();

        return redirect('programs/programs')->with('status', 'Jenjang berhasil ditambah!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program) // Route Model Binding
    {
        // $program = Program::find($id);
        // $program = Program::where('id', $id)->get();
        $program->makeHidden(['edulevel_id']); // Temporarily Modifying Attribute Visibility
        return view('programs/programs.show', compact('program'));

        // return $program;
        // return $program;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $edulevels = Edulevel::all();
        // return $program;
        return view('program.edit', compact('program', 'edulevels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $dataPenduduk = new Program;
        dd($dataPenduduk);
        $request->validate([ // Form Validate Laravel
            'name' => 'required|min:3',
            'edulevel_id' => 'required',
        ], [
            'edulevel_id.required' => 'jenjang tidak boleh kosong',
        ]);

        // Cara 1
        // $program->name = $request->name;
        // $program->edulevel_id = $request->edulevel_id;
        // $program->student_price = $request->student_price;
        // $program->student_max = $request->student_max;
        // $program->info = $request->info;
        // $program->save();

        // Cara 2 :
        $program = Program::where('id', $program->id)
            ->update([
                'name' => $request->name,
                'edulevel_id' => $request->edulevel_id,
                'student_price' => $request->student_price,
                'student_max' => $request->student_max,
                'info' => $request->info,
            ]);
        return $program;

        return redirect('programs/programs')->with('status', 'Program berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        // Cara 1
        // $program->delete();
        // $program->forceDelete(); // Untuk menghapus data secara permanen dari database


        // Cara 2
        // Program::destroy($program->id);

        // Cara 3
        $deletedRows = Program::where('id', $program->id)->delete();

        return redirect('programs')->with('status', 'Program berhasil dihapus!');
    }

    public function trash()
    {
        // echo "Trash";
        $programs = Program::onlyTrashed()->get();
        return view('program.trash', compact('programs'));
    }
    // public function restore() {
    //     echo "Test";
    // }

    public function restore($id = null)
    {
        if ($id != null) {
            $programs = Program::onlyTrashed()
                ->where('id', $id)
                ->restore();
            // echo "True";
            // return $id;
        } else {
            $programs = Program::onlyTrashed()->restore();
            // echo "False";
            // return $programs;
        }

        return redirect('programs')->with('status', 'Program berhasil di-restore!');
    }

    public function delete($id = null)
    {
        if ($id != null) {
            $programs = Program::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
            // echo "True";
            // return $id;
        } else {
            $programs = Program::onlyTrashed()->forceDelete();
            // echo "False";
            // return $$programs;
        }

        return redirect('programs/trash')->with('status', 'Program berhasil dihapus Permanent!');
    }
}
