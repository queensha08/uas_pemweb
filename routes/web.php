<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JeniskegiatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\DetailDokumentasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;


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
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/postlogin', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::group(['middleware'=>['auth']], function(){

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/profil', [ProfilController::class, 'show'])->name('profil');
        Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
        Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');

        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/tambah', [UserController::class, 'create']);
        Route::post('/user/simpan', [UserController::class, 'store']);
        Route::get('/user/{id}/edit', [UserController::class, 'show']);
        Route::get('/user/{id}/hapus', [UserController::class, 'destroy']);
        Route::post('/user/{id}/update', [UserController::class,'update']);

        Route::get('/jeniskegiatan', [JeniskegiatanController::class, 'index']);
        Route::get('/jeniskegiatan/tambah', [JeniskegiatanController::class, 'create']);
        Route::post('/jeniskegiatan/simpan', [JeniskegiatanController::class, 'store']);
        Route::get('/jeniskegiatan/{id}/edit', [JeniskegiatanController::class, 'show']);
        Route::get('/jeniskegiatan/{id}/hapus', [JeniskegiatanController::class, 'destroy']);
        Route::post('/jeniskegiatan/{id}/update', [JeniskegiatanController::class,'update']);

        Route::get('/kegiatan', [KegiatanController::class, 'index']);
        Route::get('/kegiatan/tambah', [KegiatanController::class, 'create']);
        Route::post('/kegiatan/simpan', [KegiatanController::class, 'store']);
        Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'show']);
        Route::get('/kegiatan/{id}/hapus', [KegiatanController::class, 'destroy']);
        Route::post('/kegiatan/{id}/update', [KegiatanController::class,'update']);

        Route::get('/dokumentasi', [DokumentasiController::class, 'index']);
        Route::get('/dokumentasi/tambah', [DokumentasiController::class, 'create']);
        Route::post('/dokumentasi/simpan', [DokumentasiController::class, 'store']);
        Route::get('/dokumentasi/{id}/edit', [DokumentasiController::class, 'show']);
        Route::get('/dokumentasi/{id}/hapus', [DokumentasiController::class, 'destroy']);
        Route::post('/dokumentasi/{id}/update', [DokumentasiController::class,'update']);

        Route::get('/detaildokumentasi', [DetailDokumentasiController::class, 'index']);
        Route::get('/detaildokumentasi/tambah', [DetailDokumentasiController::class, 'create']);
        Route::post('/detaildokumentasi/simpan', [DetailDokumentasiController::class, 'store']);
        Route::get('/detaildokumentasi/{id}/edit', [DetailDokumentasiController::class, 'show']);
        Route::get('/detaildokumentasi/{id}/hapus', [DetailDokumentasiController::class, 'destroy']);
        Route::post('/detaildokumentasi/{id}/update', [DetailDokumentasiController::class,'update']);
        Route::get('/detaildokumentasi/cetak', [DetailDokumentasiController::class, 'cetak']);
        Route::get('/detaildokumentasi/{id}/print', [DetailDokumentasiController::class, 'print'])->name('detaildokumentasi.print');
    });
    Route::get('/indexlaporan', [LaporanController::class, 'index']);
    Route::get('/laporan/{id}/print', [LaporanController::class, 'print'])->name('laporan.print');
    Route::get('/laporan/{id}/terima', [LaporanController::class, 'terima'])->name('laporan.terima');
    Route::get('/laporan/{id}/tolak', [LaporanController::class, 'tolak'])->name('laporan.tolak');
    
});




