<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    //
    public function index() {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function create() {
        return view('admin.user.create');
    }

    public function store (Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:user,username',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,operator'
        ], [
            'name.required' => 'Nama wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'role.required' => 'Role wajib diisi.',
        ]);

        $user = User::create($validated);
        return redirect()->route('admin.user.index')->with('success', 'Pengelola berhasil ditambahkan.');
    }

    public function edit($id) {
        $user = User::findOrFail(Crypt::decrypt($id));
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail(Crypt::decrypt($id));

        $validated = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:user,username,' . $user->id,
            'email' => 'required|email|unique:user,email,' . $user->id,
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,operator'
        ], [
            'name.required' => 'Nama wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah digunakan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'role.required' => 'Role wajib diisi.',
        ]);

        $user->update($validated);
        return redirect()->route('admin.user.index')->with('success', 'Pengelola berhasil diperbarui.');
    }

    public function destroy($id) {
        $user = User::findOrFail(Crypt::decrypt($id));
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', ' Data pengelola berhasil dihapus.');
    }
}