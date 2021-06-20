<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EdulevelController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Prov_JakartaController;
use App\Http\Controllers\Prov_JawabaratController;

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
Route::get('home', function() {
    return view('home');
});

Route::get('edulevels', [EdulevelController::class,'data']);
Route::get('edulevels/add', [EdulevelController::class,'add']);
Route::post('edulevels', [EdulevelController::class,'addProcess']);
Route::get('edulevels/edit/{id}', [EdulevelController::class,'edit']);
Route::patch('edulevels/{id}', [EdulevelController::class,'editProcess']);
Route::delete('edulevels/{id}', [EdulevelController::class,'delete']);

// Routing Program
Route::get('programs/trash', [ProgramController::class,'trash']);
Route::get('programs/restore/{id?}', [ProgramController::class,'restore']);
Route::delete('programs/delete/{id?}', [ProgramController::class,'delete']);
Route::resource('programs', ProgramController::class);

Route::resource('prov_jakarta', Prov_JakartaController::class);

Route::get('prov_jawabarat/trash', [Prov_JawabaratController::class,'trash']);
Route::get('prov_jawabarat/restore/{id_kabupaten_jawabarat?}', [Prov_JawabaratController::class,'restore']);
Route::delete('prov_jawabarat/delete/{id_kabupaten_jawabarat?}', [Prov_JawabaratController::class,'delete']);
Route::resource('prov_jawabarat', Prov_JawabaratController::class);

// Route::get('edulevels', 'EdulevelController@data');
