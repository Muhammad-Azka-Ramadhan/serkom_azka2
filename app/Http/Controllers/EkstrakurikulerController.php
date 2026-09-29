<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use Illuminate\Http\Request;

// use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    //
    public function index() {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('admin.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function create() {
        $guru = Guru::all();
        return view('admin.ekstrakurikuler.create', compact('guru'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_eskul' => 'required|string',
            'id_guru' => 'required|exists:guru,id',
            'jadwal_latihan' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');

            $nama_gambar = $gambar->getClientOriginalName();

            $gambar->move(
                public_path('storage/'),
                $nama_gambar
            );
            $validated['gambar'] ='storage/' . $nama_gambar;
        }

        $created = Ekstrakurikuler::create($validated);
        return redirect()->route('admin.eskul.index')->with('success', 'Data ekstrakurikuler berhasil ditambahkan');
    }

    public function edit($id) {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
        $guru = Guru::all();
        return view(
            'admin.ekstrakurikuler.edit',
            compact(['ekstrakurikuler', 'guru'])
        );
    }

    public function update(Request $request, $id) {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        $validated = $request->validate([
            'nama_eskul' => 'required|string',
            'id_guru' => 'required|exists:guru,id',
            'jadwal_latihan' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');

            $nama_gambar = $gambar->getClientOriginalName();

            $gambar->move(
                public_path('storage/'),
                $nama_gambar
            );
            $validated['gambar'] ='storage/' . $nama_gambar;
        }

        $ekstrakurikuler->update($validated);
        return redirect()->route('admin.eskul.index')->with('success', 'Data ekstrakurikuler berhasil diperbarui');
    }

    public function destroy($id) {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
        $ekstrakurikuler->delete();

        return redirect()->route('admin.eskul.index')->with('success', 'Data berhasil dihapus');
    }
}
