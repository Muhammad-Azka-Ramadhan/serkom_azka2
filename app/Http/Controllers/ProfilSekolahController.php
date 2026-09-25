<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    //
    public function index() {
        $data = [
            'title' => 'Profil Sekolah'
        ];

        $profilSekolah = ProfilSekolah::first();
        return view('admin.profil.index', [
            'data' => $data,
            'profilSekolah' => $profilSekolah
        ]);
    }

    public function edit($id_profil) {
        $data = [
            'title' => 'Profil Sekolah'
        ];

        $profilSekolah = ProfilSekolah::findOrFail($id_profil);
        return view('admin.profil.edit', [
            'data' => $data,
            'profilSekolah' => $profilSekolah
        ]);
    }

    public function update(Request $request, $id_profil) {
        $profilSekolah = ProfilSekolah::findOrFail($id_profil);

        $validated = $request->validate([
            'nama_sekolah' => 'required|max:40',
            'kepala_sekolah' => 'required|max:40',
            'npsn' => 'required|string|max:10',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
            'visi_misi' => 'required|string',
            'tahun_berdiri' => 'required|integer',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profilSekolah->update($validated);

        return redirect()->route('admin.profil')->with('success', 'Profil sekolah behasil diperbarui');
    }
}
