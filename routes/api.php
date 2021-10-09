<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Prov_JawatimurController;
use App\Http\Controllers\Prov_JawatengahController;
use App\Http\Controllers\API\API_Prov_JawatimurController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('jawatimur')->group(function () {
    Route::get('prov_jawatimur/trash', [API_Prov_JawatimurController::class,'trash']);
    Route::get('prov_jawatimur/{id_kabupaten_jawatimur}', [API_Prov_JawatimurController::class,'show']);
    // Route::resource('prov_jawatimur', API_Prov_JawatimurController::class);
});
// Route::post('jawatimur/prov_jawatimur/create', [Prov_JawatimurController::class,'store']);
// Route::get('prov_jawatimur', [Prov_JawatimurController::class,'indexAPI']);


Route::prefix('jawatengah')->group(function () {
    Route::get('prov_jawatengah/trash', [Prov_JawatengahController::class,'trash']);
    Route::get('prov_jawatengah/{id_kabupaten_jawatengah}', [Prov_JawatengahController::class,'show']);
    // Route::resource('prov_jawatengah', Prov_JawatengahController::class);
});

// Route::prefix('jawatengah')->group(function () {
//     Route::resource('prov_jawatengah', API/Prov_JawatengahController::class);
// });
// Route::post('jawatengah/prov_jawatengah/create', [Prov_JawatengahController::class,'store']);
