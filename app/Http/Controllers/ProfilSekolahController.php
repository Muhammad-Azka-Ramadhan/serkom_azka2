<?php

namespace App\Http\Controllers;

use App\Models\ProfilSekolah;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class ProfilSekolahController extends Controller
{
    //
    public function index() {
        $profilSekolah = ProfilSekolah::latest()->first();

        return view('admin.profil.index', compact('profilSekolah'));
    }

    public function edit($id) {
        try {
            $profilSekolah = ProfilSekolah::findOrFail(Crypt::decrypt($id));
            return view('admin.profil.edit', compact('profilSekolah'));
        }
        catch (Exception $e) {
            return redirect()->route('admin.profil.index')->with('error', 'Profil sekolah tidak ditemukan.');
        }
    }

    public function update(Request $request, $id) {
        $profilSekolah = ProfilSekolah::findOrFail(Crypt::decrypt($id));

        $validated = $request->validate([
            'nama_sekolah' => 'required|max:40',
            'kepala_sekolah' => 'required|max:40',
            'foto_kepala_sekolah' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sambutan_kepala_sekolah' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'npsn' => 'required|string|max:10',
            'alamat' => 'required|string',
            'kontak' => 'required|string|max:15',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'tahun_berdiri' => 'required|integer',
            'deskripsi' => 'required|string',
        ], [
            'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
            'kepala_sekolah.required' => 'Nama kepala sekolah wajib diisi.',
            'logo.required' => 'Logo sekolah wajib diunggah.',
            'logo.image' => 'Logo harus berupa file gambar.',
            'logo.mimes' => 'Logo harus berupa file dengan format jpg, jpeg, atau png.',
            'logo.max' => 'Ukuran logo maksimal 2MB.',
            'foto.required' => 'Foto sekolah wajib diunggah.',
            'foto.image' => 'Foto harus berupa file gambar.',
            'foto.mimes' => 'Foto harus berupa file dengan format jpg, jpeg, atau png.',
            'foto.max' => 'Ukuran foto maksimal 2MB.',
            'npsn.required' => 'NPSN wajib diisi.',
            'alamat.required' => 'Alamat sekolah wajib diisi.',
            'kontak.required' => 'Kontak sekolah wajib diisi.',
            'visi.required' => 'Visi sekolah wajib diisi.',
            'misi.required' => 'Misi sekolah wajib diisi.',
            'tahun_berdiri.required' => 'Tahun berdiri sekolah wajib diisi.',
            'deskripsi.required' => 'Deskripsi sekolah wajib diisi.'
        ]);

        if ($request->hasFile('logo')) {
            if ($profilSekolah->logo && Storage::disk('public')->exists($profilSekolah->logo)) {
                Storage::disk('public')->delete($profilSekolah->logo);
            }
            $validated['logo'] = $request->file('logo')->store('profil_sekolah', 'public');
        }

        if ($request->hasFile('foto')) {
            if ($profilSekolah->foto && Storage::disk('public')->exists($profilSekolah->foto)) {
                Storage::disk('public')->delete($profilSekolah->foto);
            }
            $validated['foto'] = $request->file('foto')->store('profil_sekolah', 'public');
        }
    
        if ($request->hasFile('foto_kepala_sekolah')) {
            if ($profilSekolah->foto_kepala_sekolah && Storage::disk('public')->exists($profilSekolah->foto_kepala_sekolah)) {
                Storage::disk('public')->delete($profilSekolah->foto_kepala_sekolah);
            }
            $validated['foto_kepala_Sekolah'] = $request->file('foto_kepala_sekolah')->store('profil_sekolah', 'public');
        }

        $profilSekolah->update($validated);

        return redirect()->route('admin.profil.index')->with('success', 'Profil sekolah behasil diperbarui');
    }

    public function publicProfil_sekolah() {
        $profilSekolah = ProfilSekolah::first();
        return view('public.profil', compact('profilSekolah'));
    }
}
