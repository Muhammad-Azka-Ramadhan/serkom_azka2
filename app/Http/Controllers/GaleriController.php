<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Exception;

class GaleriController extends Controller
{
    //
    public function index() {
        $galeri = Galeri::latest()->get();

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
            $validated['file'] = $request->file('file')->store('galeri', 'public');
        }

        $created = Galeri::create($validated);
        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit($id) {
        try {
            $galeri = Galeri::findOrFail(Crypt::decrypt($id));
            return view('admin.galeri.edit', compact('galeri'));
        }
        catch (Exception $e) {
            return redirect()->route('admin.galeri.index')->with('error', 'Data galeri tidak ditemukan');
        }
    }

    public function update(Request $request, $id) {
        try {
            $galeri = Galeri::findOrFail(Crypt::decrypt($id));
        }
        catch (Exception $e) {
            return redirect()->route('admin.galeri.index')
                ->with('error', 'Data galeri tidak ditemukan');
        }

        $validated = $request->validate([
            'judul' => 'required|string|max:50',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,mp4|max:10240'
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'judul.max' => 'Judul maksimal 50 karakter.',
            'kategori.required' => 'Kategori wajib diisi.',
            'tanggal.required' => 'Tanggal wajib diiisi.',
            'file.mimes' => 'Format file yang didukung: JPG, JPEG, PNG, atau MP4.',
            'file.max' => 'Ukuran file maksimal 10MB.'
        ]);

        if ($request->hasFile('file')) {
            if ($galeri->file && Storage::disk('public')->exists($galeri->file)) {
                Storage::disk('public')->delete($galeri->file);
            }

            $validated['file'] = $request->file('file')->store('galeri', 'public');
        }

        $galeri->update($validated);

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil diedit');
    }

    public function destroy($id) {
        $galeri = Galeri::findOrFail(Crypt::decrypt($id));
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Data berhasil dihapus.');
    }

    public function publicGaleri() {
        return view('public.galeri');
    }
}