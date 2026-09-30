<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class ProfilSekolahController extends Controller
{
    //
    public function index() {
        $profilSekolah = ProfilSekolah::latest()->first();

        return view('admin.profil.index', compact('profilSekolah'));
    }

    public function edit($id) {
        $profilSekolah = ProfilSekolah::findOrFail(Crypt::decrypt($id));
        return view('admin.profil.edit', compact('profilSekolah'));
    }

    public function update(Request $request, $id) {
        $profilSekolah = ProfilSekolah::findOrFail($id);

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

        return redirect()->route('admin.profil.index')->with('success', 'Profil sekolah behasil diperbarui');
    }
}
