<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Galeri::create([
            'judul' => 'Kegiatan Perkemahan Masa Tamu',
            'Keterangan' => 'Perkemahan untuk siswa baru',
            'file' => '',
            'Kategori' => 'Foto',
            'tanggal' => '2026-07-17',
        ]);

        Galeri::create([
            'judul' => 'Kegiatan LDKS',
            'Keterangan' => 'Pelaksanaan Latihan Dasar Kepeimpinan Siswa (LDKS)',
            'file' => '',
            'Kategori' => 'Foto',
            'tanggal' => '2026-08-17',
        ]);

        Galeri::create([
            'judul' => 'Kegiatan Lomba Tingkat 1',
            'Keterangan' => 'Lomba tingkat 1 kelas 7 & 8',
            'file' => '',
            'Kategori' => 'Foto',
            'tanggal' => '2026-09-17',
        ]);
    }
}
