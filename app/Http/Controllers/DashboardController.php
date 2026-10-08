<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\User;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\ProfilSekolah;

// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $profilSekolah = ProfilSekolah::first();
        // Statistik
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalEskul = Ekstrakurikuler::count();
        $totalPengelola = User::count();

        // Berita terbaru
        $beritaTerbaru = Berita::latest('tanggal')
            ->take(5)
            ->get();

        // Galeri terbaru
        $galeriTerbaru = Galeri::latest('tanggal')
            ->take(6)
            ->get();

        // Data terbaru
        $siswaTerbaru = Siswa::latest()
            ->take(5)
            ->get();

        $guruTerbaru = Guru::latest()
            ->take(5)
            ->get();

        $eskulTerbaru = Ekstrakurikuler::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'profilSekolah',
            'totalSiswa',
            'totalGuru',
            'totalEskul',
            'totalPengelola',
            'beritaTerbaru',
            'galeriTerbaru',
            'siswaTerbaru',
            'guruTerbaru',
            'eskulTerbaru'
        ));
    }

    public function publicBeranda() {
        $siswa = Siswa::latest()->get();
        $guru = Guru::latest()->get();
        $berita = Berita::latest()->get();
        $galeri = Galeri::latest()->get();
        $ekstrakurikuler = Ekstrakurikuler::with('guru')->latest()->get();
        $profilSekolah = ProfilSekolah::first();

        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::count();
        $jumlahEskul = Ekstrakurikuler::count();

        return view('public.beranda', compact(
            'siswa',
            'guru',
            'berita',
            'galeri',
            'ekstrakurikuler',
            'profilSekolah',
            'jumlahGuru',
            'jumlahSiswa',
            'jumlahEskul'
        ));
    }
}
