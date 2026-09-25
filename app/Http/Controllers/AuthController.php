<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login() {
        return view('admin.login');
    }

    public function prosesLogin(Request $request) {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            
            [
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Email tidak valid',
                'password.required' => 'Password wajib diisi'
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'))->with('success', 'Selamat datang kembali');
        }

        return back()->withErrors([
            'email' => 'Kombinasi alamat email atau kata sandi tidak sesuai.'
        ])->onlyInput('email');
    }
}
