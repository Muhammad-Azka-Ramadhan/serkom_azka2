<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\User;
use App\Models\Berita;
use App\Models\Galeri;

// use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
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
        return view('public.beranda');
    }
}
