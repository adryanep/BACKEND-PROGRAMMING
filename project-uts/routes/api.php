<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Models\Patient;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# method get - get all resource pasien
Route::get('/patient', [PatientController::class, 'index']);
# method post - menambah data pasien
Route::post('/patient', [PatientController::class, 'store']);
# method get - menampilkan data pasien
Route::get('/patient/{id}', [PatientController::class, 'show']);
# method put - edit resource pasien
Route::get('/patient/{id}', [PatientController::class, 'update']);
# method delete - menghapus data pasien
Route::get('/patient/{id}', [PatientController::class, 'destroy']);
# method get - mencari data pasien berdasarkan nama
Route::get('/patient/search/{name}', [PatientController::class, 'search']);
# method get - data pasien positif
Route::get('/patient/status/positive', [PatientController::class, 'positive']);
# method get - data pasien pulih
Route::get('/patient/status/recovered', [PatientController::class, 'recovered']);
# method get - data pasien meninggal
Route::get('/patient/status/dead', [PatientController::class, 'dead']);