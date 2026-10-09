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
            'jadwal_latihan' => 'Sabtu, 14.00 - selesai',
            'deskripsi' => 'Disiplin, berani, dan setia',
            'gambar' => ''
        ]);

        Ekstrakurikuler::create([
            'id_guru' => 2,
            'nama_eskul' => 'Paskibra',
            'jadwal_latihan' => 'Jumat, 14.00 - selesai',
            'deskripsi' => 'Disiplin, berani, dan setia',
            'gambar' => ''
        ]);

        Ekstrakurikuler::create([
            'id_guru' => 1,
            'nama_eskul' => 'PMR',
            'jadwal_latihan' => 'Kamis, 14.00 - selesai',
            'deskripsi' => 'Disiplin, berani, dan setia',
            'gambar' => ''
        ]);
    }
}
