<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\ProfilSekolah;
use App\Models\Siswa;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    //
    public function index() {
        $profilSekolah = ProfilSekolah::first();
        $guru = Guru::latest()->get();

        return view('admin.guru.index', compact(
            'guru',
            'profilSekolah'
        ));
    }

    public function create() {
        $profilSekolah = ProfilSekolah::first();
        return view('admin.guru.create', compact('profilSekolah'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_guru' => 'required|string',
            'nip' => 'required|string|unique:guru,nip|max:15',
            'mapel' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'nip.max' => 'NIP maksimal 15 digit',
            'mapel.required' => 'Mata pelajaran wajib diisi.',
            'foto.image' => 'Foto harus berupa file gambar.',
            'foto.mimes' => 'Foto harus berupa file dengan format jpg, jpeg, atau png.',
            'foto.max' => 'Ukuran foto maksimal 2MB.'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $created = Guru::create($validated);
        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function edit($id) {
        try {
            $profilSekolah = ProfilSekolah::first();
            $guru = Guru::findOrFail(Crypt::decrypt($id));
            return view('admin.guru.edit', compact(
                'guru',
                'profilSekolah'
            ));
        }
        catch (Exception $e) {
            return redirect()->route('admin.guru.index')->with('error', 'Data guru tidak ditemukan.');
        }
    }

    public function update(Request $request, $id) {
        $guru = Guru::findOrFail(Crypt::decrypt($id));
        $validated = $request->validate([
            'nama_guru' => 'required|string',
            'nip' => 'required|string|unique:guru,nip,' . $guru->id . '|max:15',
            'mapel' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'nip.max' => 'NIP maksimal 15 digit',
            'mapel.required' => 'Mata pelajaran wajib diisi.',
            'foto.image' => 'Foto harus berupa file gambar.',
            'foto.mimes' => 'Foto harus berupa file dengan format jpg, jpeg, atau png.',
            'foto.max' => 'Ukuran foto maksimal 2MB.'
        ]);

        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $validated['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($validated);
        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy($id) {
        $guru = Guru::findOrFail(Crypt::decrypt($id));
        $guru->delete();

        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil dihapus');
    }

    public function publicGuru() {
        $profilSekolah = ProfilSekolah::first();
        $guru = Guru::all();
        return view('public.guru.index', compact('profilSekolah', 'guru'));
    }

    public function publicDetailGuru($id) {
        try  {
            $profilSekolah = ProfilSekolah::first();
            $guru = Guru::find(Crypt::decrypt($id));
            return view ('public.guru.detail', compact('profilSekolah', 'guru'));
        }
        catch (Exception $e) {
            return redirect()->route('public.guru')->with('error', 'Guru tidak ditemukan');
        }
    }
}