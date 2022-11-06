<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\MahasiswaController;

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

// method get
Route::get('/animals', [AnimalController::class, 'index']);

// method post
Route::post('/animals', [AnimalController::class, 'store']);

// method put
Route::put('/animals/{id}', [AnimalController::class, 'update']);

// method delete
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);

# get all resource mahasiswas
# method get
Route::get('/mahasiswas', [MahasiswaController::class, 'index']);

# menambahkan resource mahasiswa
# method post
Route::post('/mahasiswas', [MahasiswaController::class, 'store']);

# mengubah resource mahasiswa
# method put
Route::put('/mahasiswas/{id}', [MahasiswaController::class, 'update']);

# menghapus resource mahasiswa
# method delete
Route::delete('/mahasiswas/{id}', [MahasiswaController::class, 'delete']);