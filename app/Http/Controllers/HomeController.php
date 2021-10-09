<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prov_Jakarta;
use Illuminate\Support\Facades\DB;
use App\Models\Prov_Banten;
use App\Models\Prov_Jawabarat;
use App\Models\Prov_Jawatengah;
use App\Models\Prov_Jawatimur;
use App\Models\Prov_Yogyakarta;
use App\Models\Prov_Aceh;

use App\Models\DataPenduduk;


class HomeController extends Controller
{
    public function index() {
        $Data_Banten = Prov_Banten::get()->count();
        $Data_Jakarta = DB::table('prov_jakarta_locs')->count();
        $Data_Jatim =  Prov_Jawatimur::get()->count();
        $Data_Jateng =  Prov_Jawatengah::get()->count();
        $Data_Jabar =  Prov_Jawabarat::get()->count();
        $Data_Yogyakarta =  Prov_Yogyakarta::get()->count();

        // $Data_Aceh = Prov_Aceh::get()->count();
        // Cara pertama untuk menghitung jumlah id table relation
        // $resolve = DataPenduduk::where('provinsi_id', 11)->get()->count();
        // $unresolve = DataPenduduk::where('provinsi_id', 12)->get()->count();
        // $done = DataPenduduk::where('provinsi_id', 14)->get()->count();

        // Kode ini berguna untuk menampilkan jumlah data yang terdapat dalam table relations
        $dataPenduduk = DataPenduduk::select(DB::raw('provinsi_id, count(provinsi_id) as total'))
            ->groupby('provinsi_id')
            ->orderby('provinsi_id', 'DESC')
            ->get();
        // $getId = DataPenduduk::where('provinsi_id', 11)->get()->count();
        // dd($getId);
        // dd($dataPenduduk);

        // dd($dataJatim);
        return view('home', compact(
            ['Data_Banten', 'Data_Jakarta', 'Data_Jatim', 'Data_Jateng', 'Data_Jabar', 'Data_Yogyakarta'],
            // ['resolve', 'unresolve', 'done'],
            ['dataPenduduk']
        ));
    }
}
