<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MapelController extends Controller
{
    //
    public function index() {
        $profilSekolah = ProfilSekolah::first();
        $mapel = Mapel::all();
        return view('admin.mapel.index', compact('profilSekolah', 'mapel'));
    }

    public function create() {
        $profilSekolah = ProfilSekolah::first();
        return view('admin.mapel.create', compact('profilSekolah'));
    }

    public function edit($id) {
        $profilSekolah = ProfilSekolah::first();
        $mapel = Mapel::findOrFail(Crypt::decrypt($id));
        return view('admin.mapel.edit', compact('profilSekolah', 'mapel'));
    }
}
