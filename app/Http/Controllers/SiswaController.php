<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function index() {
        $data = [
            'title' => 'Siswa'
        ];

        $siswa = Siswa::orderBy('nama_siswa', 'asc')->paginate(10);

        return view('admin.siswa.index', [
            'data' => $data,
            'siswa' => $siswa
        ]);
    }

    public function create() {
        $data = [
            'title' => 'Siswa'
        ];

        return view('admin.siswa.create', $data);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nisn' => 'required|string',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki, Perempuan',
            'tahun_masuk' => 'required|string|numeric'
        ]);

        $created = Siswa::create($validated);
        return redirect()->route('admin.siswa');
    }

    public function edit($id_siswa) {
        $data = [
            'title' => 'Siswa'
        ];

        $siswa = Siswa::findOrFail($id_siswa);
        return view('admin.siswa.edit', [
            'data' => $data,
            'siswa' => $siswa
        ]);
    }

    public function update(Request $request, $id_siswa) {
        $siswa = Siswa::findOrFail($id_siswa);
        $validated = $request->validate([
            'nisn' => 'required|string',
            'nama_siswa' => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tahun_masuk' => 'required|string|numeric'
        ]);

        $siswa->update($validated);
        return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy($id_siswa) {
        $siswa = Siswa::findOrFail($id_siswa);
        $siswa->delete();

        return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil dihapus');
    }
}
