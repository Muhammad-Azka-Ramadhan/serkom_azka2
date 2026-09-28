<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    public function index() {
        $guru = Guru::latest()->get();

        return view('admin.guru.index', compact('guru'));
    }

    public function create() {
        return view('admin.guru.create');
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

    public function edit($id) {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id) {
        $guru = Guru::findOrFail($id);
        $validated =$request->validate([
            'nama_guru' => 'required|string',
            'nip' => 'required|string',
            'mapel' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            if (!empty($guru->foto)) {
                $fotolama = public_path($guru->foto);

                if (File::exists($fotolama)) {
                    File::delete($fotolama);
                }
            }
            $foto = $request->file('foto');

            $nama_foto = $foto->getClientOriginalName();

            $foto->move(
                public_path('storage/'),
                $nama_foto
            );
            $validated['foto'] = 'storage/' . $nama_foto;
        }
        $guru->update($validated);
        return redirect()->route('admin.guru.index')->with('success', 'Data guru berhasil diperbarui');
    }
}

