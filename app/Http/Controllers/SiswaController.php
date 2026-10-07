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
        $siswa = Siswa::all();

        $validated = $request->validate([
            'nisn' => 'required|string|unique:siswa,nisn|max:10',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|string|numeric'
        ], [
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.unique' => 'NISN sudah digunakan.',
            'nisn.max' => 'NISN maksimal 10 digit',
            'nama_siswa.required' => 'Nama siswa wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'tahun_masuk.required' => 'Tahun masuk wajib diisi.',
        ]);

        $created = Siswa::create($validated);
        return redirect()->route('admin.siswa.index');
    }

    public function edit($id) {
        $siswa = Siswa::findOrFail(Crypt::decrypt($id));

        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id) {
        $siswa = Siswa::findOrFail(Crypt::decrypt($id));

        $validated = $request->validate([
            'nisn' => 'required|string|unique:siswa,nisn,' . $siswa->id . '|max:10',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|string|integer'
        ], [
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.unique' => 'NISN sudah digunakan.',
            'nisn.max' => 'NISN maksimal 10 digit',
            'nama_siswa.required' => 'Nama siswa wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'tahun_masuk.required' => 'Tahun masuk wajib diisi.',
        ]);

        $siswa->update($validated);

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy($id) {
        $siswa = Siswa::findOrFail(Crypt::decrypt($id));
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }

    public function publicSiswa() {
        return view('public.siswa');
    }
}