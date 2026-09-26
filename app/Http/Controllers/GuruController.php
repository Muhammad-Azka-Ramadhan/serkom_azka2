<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    public function index() {
        $data = [
            'title' => 'Guru',
            'breadcrumb' => [
                'Guru',
            ]
        ];

        $guru = Guru::paginate(10);
        return view('admin.guru.index', [
            'data' => $data,
            'guru' => $guru
        ]);
    }
    
    public function create() {
        $data = [
            'title' => 'Tambah Guru',
            'breadcrumb' => [
                'Guru',
                'Tambah Guru'
            ]
        ];
        return view('admin.guru.create', $data);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_guru' => 'required|string',
            'nip' => 'required|string',
            'mapel' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            $nama_foto = $foto->getClientOriginalName();

            $foto->move(
                public_path('storage/'),
                $nama_foto
            );
            $validated['foto'] = 'storage/' . $nama_foto;
        }

        $created = Guru::create($validated);
        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function edit($id_guru) {
        $data = [
            'title' => 'Edit Guru'
        ];
        $guru = Guru::findOrFail($id_guru);
        return view('admin.guru.edit', [
            'data' => $data,
            'guru' => $guru
        ]);

    }
}
