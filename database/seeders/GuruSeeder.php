<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Guru::create([
            'nama_guru' => 'Cecep Cepi',
            // 'id_mapel' => 1,
            'nip' => '1010101010',
            'foto' => ''
        ]);

        Guru::create([
            'nama_guru' => 'Reni Nur',
            // 'id_mapel' => 2,
            'nip' => '2020202021',
            'foto' => ''
        ]);

        Guru::create([
            'nama_guru' => 'Dedeh Rokayah',
            // 'id_mapel' => 3,
            'nip' => '2020202023',
            'foto' => ''
        ]);
    }
}
