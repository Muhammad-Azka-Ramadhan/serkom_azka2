<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::latest()->get();

        return view('admin.siswa.index', compact('siswa'));
    }

    public function create() {
        return view('admin.siswa.create', compact('siswa'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nisn' => 'required|string',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki, Perempuan',
            'tahun_masuk' => 'required|string|numeric'
        ]);

        $created = Siswa::create($validated);
        return redirect()->route('admin.siswa.index');
    }

    public function edit($id) {
        $data = [
            'title' => 'Siswa'
        ];

        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', [
            'data' => $data,
            'siswa' => $siswa
        ]);
    }

    public function update(Request $request, $id) {
        $siswa = Siswa::findOrFail($id);
        $validated = $request->validate([
            'nisn' => 'required|string',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|string|numeric'
        ]);

        $siswa->update($validated);
        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy($id) {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
