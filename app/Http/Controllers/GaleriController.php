<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriController extends Controller
{
    //
    public function index() {
        $data = [
            'title' => 'Galeri'
        ];
        
        return view('admin.galeri', $data);
    }
}
