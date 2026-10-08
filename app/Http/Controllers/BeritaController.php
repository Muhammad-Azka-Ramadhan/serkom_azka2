<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\ProfilSekolah;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BeritaController extends Controller
{
    //
    public function index() {
        $profilSekolah = ProfilSekolah::first();
        $berita = Berita::latest()->get();
        $user = User::all();

        return view('admin.berita.index', compact(
            'berita',
            'user',
            'profilSekolah'
        ));
    }

    public function create() {
        $profilSekolah = ProfilSekolah::first();
        $user = User::all();
        return view('admin.berita.create', compact('user', 'profilSekolah'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'judul' => 'required|string|max:100',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ], [
            'judul.required' => 'judul wajib diisi',
            'judul.max' => 'Judul maksimal 100 karakter',
            'isi.required' => 'Isi berita wajib diisi',
            'tanggal.required' => 'Tanggal publikasi wajib diisi',
            'gambar.image' => 'Gambar harus berupa file gambar.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $validated['id_user'] = Auth::id();

        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id) {
        try {
            $profilSekolah = ProfilSekolah::first();
            $berita = Berita::findOrFail(Crypt::decrypt($id));
            $user = User::all();
    
            return view('admin.berita.edit', compact('user', 'berita', 'profilSekolah'));
        }
        catch (Exception $e){
            return redirect()->route('admin.berita.index')->with('error', 'Berita tidak ditemukan.');
        }
    }

    public function update(Request $request, $id) {
        $berita = Berita::findOrFail(Crypt::decrypt($id));
        $user = User::all();

        $validated = $request->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ], [
            'judul.required' => 'judul wajib diisi',
            'judul.max' => 'Judul maksimal 50 karakter',
            'isi.required' => 'Isi berita wajib diisi',
            'tanggal.required' => 'Tanggal publikasi wajib diisi',
            'gambar.image' => 'Gambar harus berupa file gambar.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $validated['id_user'] = Auth::id();

        $berita->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id) {
        $berita = Berita::findOrFail(Crypt::decrypt($id));
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Data berhasil dihapus.');
    }

    public function publicBerita() {
        $profilSekolah = ProfilSekolah::first();
        $berita = Berita::latest('tanggal')->paginate(6);

        return view('public.berita.index', compact(
            'profilSekolah',
            'berita'
        ));
    }

    public function publicDetailBerita($id) {
        try {
            $profilSekolah = ProfilSekolah::first();
            $berita = Berita::findOrFail(Crypt::decrypt($id));
            return view('public.berita.detail', compact('berita', 'profilSekolah'));
        }
        catch (Exception $e) {
            return redirect()->route('public.berita')->with('error', 'Berita tidak ditemukan.');
        }
    }
}