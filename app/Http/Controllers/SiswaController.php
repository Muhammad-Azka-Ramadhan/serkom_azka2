<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function index() {
        $data = [
            'title' => 'Siswa'
        ];

        $siswa = Siswa::orderBy('nama_siswa', 'asc')->paginate(10);

        return view('admin.siswa.index', [
            'data' => $data,
            'siswa' => $siswa
        ]);
    }

    public function create() {
        return view('admin.siswa.create');
    }
}
