<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\ProfilSekolahController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/login-proses', [AuthController::class, 'prosesLogin'])->name('admin.login_proses');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('admin.siswa');
        Route::get('/create', [SiswaController::class, 'create'])->name('admin.siswa.create');
    });

    Route::prefix('guru')->group(function () {
        Route::get('/', [GuruController::class, 'index'])->name('admin.guru');
    });
    
    Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri');

    Route::prefix('berita')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('admin.berita');
    });

    Route::prefix('ekstrakurikuler')->group(function () {
        Route::get('/', [EkstrakurikulerController::class, 'index'])->name('admin.eskul');
    });

    Route::prefix('profil')->group(function () {
        Route::get('/', [ProfilSekolahController::class, 'index'])->name('admin.profil');
        Route::get('/{id_profil}/edit', [ProfilSekolahController::class, 'edit'])->name('admin.profil.edit');
    });

});

