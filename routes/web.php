<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DashboardController::class, 'publicIndex'])->name('public.dashboard');
Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/login-proses', [AuthController::class, 'prosesLogin'])->name('admin.login_proses');

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::prefix('siswa')->group(function () {
            Route::get('/', [SiswaController::class, 'index'])->name('admin.siswa.index');
            Route::get('/create', [SiswaController::class, 'create'])->name('admin.siswa.create');
            Route::post('/store', [SiswaController::class, 'store'])->name('admin.siswa.store');
            Route::get('/edit/{id}',  [SiswaController::class, 'edit'])->name('admin.siswa.edit');
            Route::put('/{id}', [SiswaController::class, 'update'])->name('admin.siswa.update');
            Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');
        });

        Route::prefix('guru')->group(function () {
            Route::get('/', [GuruController::class, 'index'])->name('admin.guru.index');
            Route::get('/create', [GuruController::class, 'create'])->name('admin.guru.create');
            Route::post('/store', [GuruController::class, 'store'])->name('admin.guru.store');
        });

        Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri.index');

        Route::prefix('berita')->group(function () {
            Route::get('/', [BeritaController::class, 'index'])->name('admin.berita.index');
        });

        Route::prefix('ekstrakurikuler')->group(function () {
            Route::get('/', [EkstrakurikulerController::class, 'index'])->name('admin.eskul.index');
        });

        Route::prefix('profil')->group(function () {
            Route::get('/', [ProfilSekolahController::class, 'index'])->name('admin.profil.index');
            Route::get('/edit/{id}', [ProfilSekolahController::class, 'edit'])->name('admin.profil.edit');
            Route::put('/{id}', [ProfilSekolahController::class, 'update'])->name('admin.profil.update');
        });
    });

