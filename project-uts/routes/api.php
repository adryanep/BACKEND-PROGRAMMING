<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;

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
Route::get('/patients', [patientsController::class, 'index']);
# method post - menambah data pasien
Route::post('/patients', [patientsController::class, 'store']);
# method get - menampilkan data pasien
Route::get('/patients/{id}', [patientsController::class, 'show']);
# method put - edit resource pasien
Route::get('/patients/{id}', [patientsController::class, 'update']);
# method delete - menghapus data pasien
Route::delete('/patients/{id}', [patientsController::class, 'destroy']);
# method get - mencari data pasien berdasarkan nama
Route::get('/patients/search/{name}', [patientsController::class, 'search']);
# method get - data pasien positif
Route::get('/patients/status/positive', [patientsController::class, 'positive']);
# method get - data pasien pulih
Route::get('/patients/status/recovered', [patientsController::class, 'recovered']);
# method get - data pasien meninggal
Route::get('/patients/status/dead', [PatientController::class, 'dead']);