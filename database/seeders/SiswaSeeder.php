<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Siswa::create([
            'nisn' => '0089897764',
            'nama_siswa' => 'Ahmad Faisal',
            'jenis_kelamin' => 'Laki-laki',
            'tahun_masuk' => '2024'
        ]);

        Siswa::create([
            'nisn' => '0089897765',
            'nama_siswa' => 'Siti',
            'jenis_kelamin' => 'Perempuan',
            'tahun_masuk' => '2025'
        ]);

        Siswa::create([
            'nisn' => '0089897764',
            'nama_siswa' => 'Muhammad Ihsan',
            'jenis_kelamin' => 'Laki-laki',
            'tahun_masuk' => '2026'
        ]);
    }
}
