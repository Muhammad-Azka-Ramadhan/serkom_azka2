<?php

namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EkstrakurikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Ekstrakurikuler::create([
            'id_guru' => 1,
            'nama_eskul' => 'pramuka',
            // 'pembina' => 'Cecep Cepi',
            'jadwal_latihan' => 'Sabtu',
            'deskripsi' => 'Disiplin, berani, dan setia',
            'gambar' => ''
        ]);
    }
}
