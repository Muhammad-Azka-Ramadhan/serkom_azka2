<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Berita::create([
            'judul' => 'Juara',
            'isi' => 'Juara pokoknamah',
            'tanggal' => '2026-08-20',
            'gambar' => '',
            'id_user' => 1
        ]);
    }
}
