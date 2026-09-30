<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    public function index() {
        $siswa = Siswa::latest()->get();

        return view('admin.siswa.index', compact('siswa'));
    }

    public function create() {
        return view('admin.siswa.create');
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
        $siswa = Siswa::findOrFail(Crypt::decrypt($id));
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id) {
        $siswa = Siswa::findOrFail($id);
        $validated = $request->validate([
            'nisn' => 'required|string|unique:siswa,nisn,' . ($id ?? 'NULL') . ',id',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|string|integer'
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
