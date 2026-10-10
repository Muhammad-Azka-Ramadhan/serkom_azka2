<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use App\Models\ProfilSekolah;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    //
    public function index() {
        $ekstrakurikuler = Ekstrakurikuler::all();
        $profilSekolah = ProfilSekolah::first();
        return view('admin.ekstrakurikuler.index', compact(
            'ekstrakurikuler',
            'profilSekolah'
        ));
    }

    public function create() {
        $profilSekolah = ProfilSekolah::first();
        $guru = Guru::all();
        return view('admin.ekstrakurikuler.create', compact(
            'guru',
            'profilSekolah'
        ));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_eskul' => 'required|string',
            'id_guru' => 'required|exists:guru,id',
            'jadwal_latihan' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ], [
            'nama_eskul.required' => 'Nama ekstrakurikuler wajib diisi.',
            'id_guru.required' => 'Guru pembimbing wajib dipilih.',
            'id_guru.exists' => 'Guru pembimbing sudah membimbing ekstrakurikuler lain.',
            'jadwal_latihan.required' => 'Jadwal latihan wajib diisi.',
            'deskripsi.required' => 'Deskripsi ekstrakurikuler wajib diisi.',
            'gambar.required' => 'Gambar Wajib diisi',
            'gambar.image' => 'Gambar harus berupa file gambar.',
            'gambar.mimes' => 'Gambar harus berupa file dengan format jpg, jpeg, atau png.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        $created = Ekstrakurikuler::create($validated);
        return redirect()->route('admin.eskul.index')->with('success', 'Data ekstrakurikuler berhasil ditambahkan');
    }

    public function edit($id) {
        try {
            $profilSekolah = ProfilSekolah::first();
            $ekstrakurikuler = Ekstrakurikuler::findOrFail(Crypt::decrypt($id));
            $guru = Guru::all();
            return view(
                'admin.ekstrakurikuler.edit',
                compact(['ekstrakurikuler', 'guru', 'profilSekolah'])
            );
        }
        catch (Exception $e) {
            return redirect()->route('admin.eskul.index')->with('error', 'Data Ekstrakurikuler tidak ditemukan');
        }
    }

    public function update(Request $request, $id) {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail(Crypt::decrypt($id));

        $validated = $request->validate([
            'nama_eskul' => 'required|string',
            'id_guru' => 'required|exists:guru,id',
            'jadwal_latihan' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ], [
            'nama_eskul.required' => 'Nama ekstrakurikuler wajib diisi.',
            'id_guru.required' => 'Guru pembimbing wajib dipilih.',
            'id_guru.exists' => 'Guru pembimbing sudah membimbing ekstrakurikuler lain.',
            'jadwal_latihan.required' => 'Jadwal latihan wajib diisi.',
            'deskripsi.required' => 'Deskripsi ekstrakurikuler wajib diisi.',
            'gambar.image' => 'Gambar harus berupa file gambar.',
            'gambar.mimes' => 'Gambar harus berupa file dengan format jpg, jpeg, atau png.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.'
        ]);

        if ($request->hasFile('gambar')) {
            if ($ekstrakurikuler->gambar && Storage::disk('public')->exists($ekstrakurikuler->gambar)) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('ekstrakurikuler', 'public');
        }

        $ekstrakurikuler->update($validated);
        return redirect()->route('admin.eskul.index')->with('success', 'Data ekstrakurikuler berhasil diperbarui');
    }

    public function destroy($id) {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail(Crypt::decrypt($id));
        $ekstrakurikuler->delete();

        return redirect()->route('admin.eskul.index')->with('success', 'Data berhasil dihapus');
    }

    public function publicEkstrakurikuler() {
        $profilSekolah = ProfilSekolah::first();
        $ekstrakurikuler = Ekstrakurikuler::paginate(6);
        $guru = Guru::all();
        return view('public.ekstrakurikuler.index', compact('profilSekolah', 'ekstrakurikuler', 'guru'));
    }

    public function showPublic($id) {
        try {
            $profilSekolah = ProfilSekolah::first();
            $ekstrakurikuler = Ekstrakurikuler::findOrFail(Crypt::decrypt($id));
            $guru = Guru::all();
            return view('public.ekstrakurikuler.detail', compact('profilSekolah', 'ekstrakurikuler', 'guru'));
        }
        catch (Exception $e) {
            return redirect()->route('public.eskul');
        }
    }
}