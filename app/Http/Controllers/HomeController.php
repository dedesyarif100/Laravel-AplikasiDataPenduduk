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

class HomeController extends Controller
{
    public function index() {
        $Data_Banten = Prov_Banten::get()->count();
        $Data_Jakarta = DB::table('prov_jakarta_locs')->count();
        $Data_Jatim =  Prov_Jawatimur::get()->count();
        $Data_Jateng =  Prov_Jawatengah::get()->count();
        $Data_Jabar =  Prov_Jawabarat::get()->count();
        $Data_Yogyakarta =  Prov_Yogyakarta::get()->count();

        // dd($dataJatim);
        return view('home', compact('Data_Banten', 'Data_Jakarta', 'Data_Jatim', 'Data_Jateng', 'Data_Jabar', 'Data_Yogyakarta'));
    }
}
