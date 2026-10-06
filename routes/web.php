<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-proses', [AuthController::class, 'prosesLogin'])->name('login_proses');

Route::get('/', [DashboardController::class, 'publicBeranda'])->name('public.dashboard');
Route::get('/profil', [ProfilSekolahController::class, 'publicProfil_sekolah'])->name('public.profil');
Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'publicEkstrakurikuler'])->name('public.ekstrakurikuler');
Route::get('/guru', [GuruController::class, 'publicGuru'])->name('public.guru');
Route::get('/siswa', [SiswaController::class, 'publicSiswa'])->name('public.siswa');
Route::get('berita', [BeritaController::class, 'publicBerita'])->name('public.berita');
Route::get('/galeri', [GaleriController::class, 'publicGaleri'])->name('public.galeri');

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('admin.siswa.index');
        Route::get('/create', [SiswaController::class, 'create'])->name('admin.siswa.create');
        Route::post('/store', [SiswaController::class, 'store'])->name('admin.siswa.store');
        Route::get('/edit/{id}', [SiswaController::class, 'edit'])->name('admin.siswa.edit');
        Route::put('/{id}', [SiswaController::class, 'update'])->name('admin.siswa.update');
        Route::delete('/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');
    });

    Route::prefix('guru')->group(function () {
        Route::get('/', [GuruController::class, 'index'])->name('admin.guru.index');
        Route::get('/create', [GuruController::class, 'create'])->name('admin.guru.create');
        Route::post('/store', [GuruController::class, 'store'])->name('admin.guru.store');
        Route::get('/edit/{id}', [GuruController::class, 'edit'])->name('admin.guru.edit');
        Route::put('/update/{id}', [GuruController::class, 'update'])->name('admin.guru.update');
        Route::delete('/{id}', [GuruController::class, 'destroy'])->name('admin.guru.destroy');
    });

    Route::get('/galeri', [GaleriController::class, 'index'])
        ->name('admin.galeri.index');

    Route::prefix('berita')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('admin.berita.index');
        Route::get('/create', [BeritaController::class, 'create'])->name('admin.berita.create');
        Route::post('/store', [BeritaController::class, 'store'])->name('admin.berita.store');
        Route::get('/edit/{id}', [BeritaController::class, 'edit'])->name('admin.berita.edit');
        Route::put('/update/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
        Route::delete('/destroy/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
    });

    Route::prefix('ekstrakurikuler')->group(function () {
        Route::get('/', [EkstrakurikulerController::class, 'index'])->name('admin.eskul.index');
        Route::get('/create', [EkstrakurikulerController::class, 'create'])->name('admin.eskul.create');
        Route::post('/store', [EkstrakurikulerController::class, 'store'])->name('admin.eskul.store');
        Route::get('/edit/{id}', [EkstrakurikulerController::class, 'edit'])->name('admin.eskul.edit');
        Route::put('/update/{id}', [EkstrakurikulerController::class, 'update'])->name('admin.eskul.update');
        Route::delete('/delete/{id}', [EkstrakurikulerController::class, 'destroy'])->name('admin.eskul.destroy');
    });

    Route::prefix('profil')->group(function () {
        Route::get('/', [ProfilSekolahController::class, 'index'])->name('admin.profil.index');
        Route::get('/edit/{id}', [ProfilSekolahController::class, 'edit'])->name('admin.profil.edit');
        Route::put('/{id}', [ProfilSekolahController::class, 'update'])->name('admin.profil.update');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });

});