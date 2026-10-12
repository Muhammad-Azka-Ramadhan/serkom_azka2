<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilDiriController extends Controller
{
    //
    public function index() {
        $profilSekolah = ProfilSekolah::first();
        return view('public.profilDiri', compact('profilSekolah'));
    }
}
