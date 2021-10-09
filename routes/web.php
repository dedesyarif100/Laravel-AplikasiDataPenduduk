<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EdulevelController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Prov_JakartaController;
use App\Http\Controllers\Prov_JawabaratController;
use App\Http\Controllers\Prov_JawatengahController;
use App\Http\Controllers\Prov_JawatimurController;
use App\Http\Controllers\Prov_YogyakartaController;
use App\Http\Controllers\Prov_BantenController;
use App\Http\Controllers\Prov_AcehController;
use App\Http\Controllers\Prov_SumatrautaraController;
use App\Http\Controllers\Prov_SumatrabaratController;
use App\Http\Controllers\Prov_SumatraselatanController;
use App\Http\Controllers\Prov_BangkabelitungController;
use App\Http\Controllers\Prov_JambiController;

use App\Http\Controllers\DataProvinsiController;
use App\Http\Controllers\DataPendudukController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('home', function() {
//     return view('home');
// });

// Route::prefix('home')->group(function () {
// });
Route::get('home', [HomeController::class,'index']);

Route::prefix('edulevels')->group(function () {
    Route::get('edulevels', [EdulevelController::class,'data']);
    Route::get('edulevels/add', [EdulevelController::class,'add']);
    Route::post('edulevels', [EdulevelController::class,'addProcess']);
    Route::get('edulevels/edit/{id}', [EdulevelController::class,'edit']);
    Route::patch('edulevels/{id}', [EdulevelController::class,'editProcess']);
    Route::delete('edulevels/{id}', [EdulevelController::class,'delete']);
});

// Routing Program

Route::prefix('programs')->group(function () {
    Route::get('programs/trash', [ProgramController::class,'trash']);
    Route::get('programs/restore/{id?}', [ProgramController::class,'restore']);
    Route::delete('programs/delete/{id?}', [ProgramController::class,'delete']);
    Route::resource('programs', ProgramController::class);
});

Route::prefix('provinsi')->group(function () {
    Route::resource('provinsi', DataProvinsiController::class);
});


// Jawa ========================================================================

Route::prefix('jakarta')->group(function () {
    Route::resource('prov_jakarta', Prov_JakartaController::class);
});

Route::prefix('jawabarat')->group(function () {
    Route::get('prov_jawabarat/trash', [Prov_JawabaratController::class,'trash']);
    Route::get('prov_jawabarat/restore/{id_kabupaten_jawabarat?}', [Prov_JawabaratController::class,'restore']);
    Route::delete('prov_jawabarat/delete/{id_kabupaten_jawabarat?}', [Prov_JawabaratController::class,'delete']);
    Route::resource('prov_jawabarat', Prov_JawabaratController::class);
});

Route::prefix('jawatengah')->group(function () {
    Route::get('prov_jawatengah/trash', [Prov_JawatengahController::class,'trash']);
    Route::get('prov_jawatengah/restore/{id_kabupaten_jawatengah?}', [Prov_JawatengahController::class,'restore']);
    Route::delete('prov_jawatengah/delete/{id_kabupaten_jawatengah?}', [Prov_JawatengahController::class,'delete']);
    Route::resource('prov_jawatengah', Prov_JawatengahController::class);
});

Route::prefix('jawatimur')->group(function () {
    Route::get('prov_jawatimur/trash', [Prov_JawatimurController::class,'trash']);
    Route::get('prov_jawatimur/restore/{id_kabupaten_jawatimur?}', [Prov_JawatimurController::class,'restore']);
    Route::delete('prov_jawatimur/delete/{id_kabupaten_jawatimur?}', [Prov_JawatimurController::class,'delete']);
    Route::resource('prov_jawatimur', Prov_JawatimurController::class);
});

Route::prefix('yogyakarta')->group(function() {
    Route::get('prov_yogyakarta/trash', [Prov_YogyakartaController::class,'trash']);
    Route::get('prov_yogyakarta/restore/{id_kabupaten_yogyakarta?}', [Prov_YogyakartaController::class,'restore']);
    Route::delete('prov_yogyakarta/delete/{id_kabupaten_yogyakarta?}', [Prov_YogyakartaController::class,'delete']);
    Route::resource('prov_yogyakarta', Prov_YogyakartaController::class);
});

Route::prefix('banten')->group(function () {
    Route::get('prov_banten/trash', [Prov_BantenController::class,'trash']);
    Route::get('prov_banten/restore/{id_kabupaten_banten?}', [Prov_BantenController::class,'restore']);
    Route::delete('prov_banten/delete/{id_kabupaten_banten?}', [Prov_BantenController::class,'delete']);
    Route::resource('prov_banten', Prov_BantenController::class);
});


// Sumatra ========================================================================

Route::prefix('aceh')->group(function () {
    Route::get('prov_aceh/trash', [Prov_AcehController::class,'trash']);
    Route::get('prov_aceh/restore/{id_kabupaten_aceh?}', [Prov_AcehController::class,'restore']);
    Route::delete('prov_aceh/delete/{id_kabupaten_aceh?}', [Prov_AcehController::class,'delete']);
    Route::resource('prov_aceh', Prov_AcehController::class);
});

Route::prefix('sumatrautara')->group(function () {
    // Query data ini menggunakan Query Builder
    Route::resource('prov_sumatrautara', Prov_SumatrautaraController::class);
});

Route::prefix('sumatrabarat')->group(function () {
    Route::resource('prov_sumatrabarat', Prov_SumatrabaratController::class);
});

Route::prefix('sumatraselatan')->group(function () {
    Route::get('prov_sumatraselatan/trash', [Prov_SumatraselatanController::class,'trash']);
    Route::get('prov_sumatraselatan/restore/{id_kabupaten_sumatraselatan?}', [Prov_SumatraselatanController::class,'restore']);
    Route::delete('prov_sumatraselatan/delete/{id_kabupaten_sumatraselatan?}', [Prov_SumatraselatanController::class,'delete']);
    Route::resource('prov_sumatraselatan', Prov_SumatraselatanController::class);
});

Route::prefix('bangkabelitung')->group(function () {
    Route::get('prov_bangkabelitung/trash', [Prov_BangkabelitungController::class,'trash']);
    Route::get('prov_bangkabelitung/restore/{id_kabupaten_bangkabelitung?}', [Prov_BangkabelitungController::class,'restore']);
    Route::delete('prov_bangkabelitung/delete/{id_kabupaten_bangkabelitung?}', [Prov_BangkabelitungController::class,'delete']);
    Route::resource('prov_bangkabelitung', Prov_BangkabelitungController::class);
});

Route::prefix('jambi')->group(function () {
    Route::get('prov_jambi/trash', [Prov_JambiController::class,'trash']);
    Route::get('prov_jambi/restore/{id_kabupaten_jambi?}', [Prov_JambiController::class,'restore']);
    Route::delete('prov_jambi/delete/{id_kabupaten_jambi?}', [Prov_JambiController::class,'delete']);
    Route::resource('prov_jambi', Prov_JambiController::class);
});

// Data Penduduk ========================================================================

Route::prefix('data-penduduk')->group(function () {
    Route::resource('penduduk', DataPendudukController::class);
});

// Route::get('edulevels', 'EdulevelController@data');
