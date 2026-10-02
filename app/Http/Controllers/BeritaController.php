<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class BeritaController extends Controller
{
    //
    public function index() {
        $berita = Berita::all();

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

            $validated['gambar'] = $request->file('gambar')->store('berita');
        }
        // dd(Auth::check(), Auth::id(), Auth::user());

        $validated['id_user'] = Auth::id();

        $created = Berita::create($validated);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }
}
