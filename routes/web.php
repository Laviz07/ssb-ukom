<?php

use App\Http\Controllers\BeritaController;
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
    return redirect('/berita');
});

Route::get('/berita', [BeritaController::class, 'index']);

Route::get('/pelatih', [PelatihController::class, 'index']);

Route::get('/pemain', [PemainController::class, 'index']);

Route::get('/tim', [TimController::class, 'index']);

Route::get('/jadwal', [JadwalController::class, 'index']);
