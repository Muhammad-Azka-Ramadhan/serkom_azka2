<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    public function index() {
        $data = [
            'title' => 'Guru'
        ];

        $guru = Guru::paginate(10);
        return view('admin.guru.index', [
            'data' => $data,
            'guru' => $guru
        ]);
    }
}
