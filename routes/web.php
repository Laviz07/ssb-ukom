<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PemainController;
use App\Http\Controllers\TimController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/beranda');
});


Route::get('/beranda', [DashboardController::class, 'indexHome']);

Route::get('/berita', [BeritaController::class, 'index']);

Route::get('/pelatih', [PelatihController::class, 'index']);

Route::get('/pemain', [PemainController::class, 'index']);
Route::get('/pemain/tambah', [PemainController::class, 'indexCreate']);
Route::post('/pemain/tambah', [PemainController::class, 'create']);
Route::get('/pemain/detail/{id}', [PemainController::class, 'indexDetail']);
Route::post('/pemain/edit/{id}', [PemainController::class, 'edit']);
Route::delete('/pemain/hapus/{id}', [PemainController::class, 'delete']);

Route::get('/tim', [TimController::class, 'index']);

Route::get('/jadwal', [JadwalController::class, 'index']);

Route::get("/galeri", [GaleriController::class, 'index']);
Route::get("/galeri/tambah", [GaleriController::class, 'indexCreate']);
