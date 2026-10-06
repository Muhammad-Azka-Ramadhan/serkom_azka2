<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class BeritaController extends Controller
{
    //
    public function index() {
        $berita = Berita::latest()->get();

        return view('admin.berita.index', compact('berita'));
    }

    public function create() {
        $user = User::all();
        return view('admin.berita.create', compact('user'));
    }

    public function store(Request $request) {
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
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $validated['id_user'] = Auth::id();

        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id) {
        $berita = Berita::findOrFail(Crypt::decrypt($id));
        $user = User::all();

        return view('admin.berita.edit', compact('user', 'berita'));
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
        return view('public.berita');
    }
}