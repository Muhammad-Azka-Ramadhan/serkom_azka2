<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    //
    public function index() {
        $data = [
            'title' => 'Profil Sekolah'
        ];

        return view('admin.profil.index', $data);
    }
}
