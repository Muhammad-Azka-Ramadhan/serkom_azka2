<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Guru;
use Illuminate\Http\Request;

// use Illuminate\Http\Request;

class GaleriController extends Controller
{
    //
    public function index() {
        $galeri = Galeri::all();

        return view('admin.galeri.index', compact('galeri'));
    }                
    
    public function create() {
        return view('admin.galeri.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'judul' => 'required|string|max:50',
            'kategori' => 'required|in:foto,video',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'file' => 'required|file|mimes:jpeg,png,jpg,mp4|max:10240'
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'judul.max' => 'Judul maksimal 50 karakter.',
            'kategori.required' => 'Kategori wajib diisi.',
            'tanggal.required' => 'Tanggal wajib diiisi.',
            'file.required' => 'File foto atau video wajib diunggah.',
            'file.mimes' => 'Format file yang didukung: JPG, JPEG, PNG, atau MP4.',
            'file.max' => 'Ukuran file maksimal 10MB.'
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('galeri, public');
        }

        $created = Galeri::create($validated);
        return redirect()->route('admin.galeri.index')->with('succeess', 'Galeri berhasil ditambahkan');
    }
}
