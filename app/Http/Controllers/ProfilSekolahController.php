<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'npsn' => 'required|string|max:10',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
            'visi_misi' => 'required|string',
            'tahun_berdiri' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);
        if ($request->hasFile('logo')) {
            if (!empty($profilSekolah->logo)) {
                $logolama = public_path($profilSekolah->logo);

                if (File::exists($logolama)) {
                    File::delete($logolama);
                }
            }
            $logo = $request->file('logo');

            $nama_logo = $logo->getClientOriginalName();

            $logo->move(
                public_path('storage/'),
                $nama_logo
            );
            $validated['logo'] = 'storage/' . $nama_logo;
        }

        if ($request->hasFile('foto')) {
            if (!empty($profilSekolah->foto)) {
                $fotolama = public_path($profilSekolah->foto);

                if (File::exists($fotolama)) {
                    File::delete($fotolama);
                }
            }
            $foto = $request->file('foto');

            $nama_foto = $foto->getClientOriginalName();

            $foto->move(
                public_path('storage/'),
                $nama_foto
            );
            $validated['foto'] = 'storage/' . $nama_foto;
        }
        
        $profilSekolah->update($validated);

        return redirect()->route('admin.profil')->with('success', 'Profil sekolah behasil diperbarui');
    }
}
