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
            'nip' => '1010101010',
            'mapel' => 'Bahasa Indonesia',
            'foto' => ''
        ]);
        
        Guru::create([
            'nama_guru' => 'Reni Nur',
            'nip' => '2020202020',
            'mapel' => 'Matematika',
            'foto' => ''
        ]);
    }
}
