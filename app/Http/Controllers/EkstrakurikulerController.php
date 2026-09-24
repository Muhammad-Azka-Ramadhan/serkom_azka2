<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    //
    public function index() {
        $data = [
            'title' => 'Ekstrakurikuler'
        ];

        return view('admin.ekstrakurikuler.index', $data);
    }
}
