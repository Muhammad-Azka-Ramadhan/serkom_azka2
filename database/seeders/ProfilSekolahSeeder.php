<?php

namespace Database\Seeders;

use App\Models\ProfilSekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProfilSekolah::create([
            'nama_sekolah' => 'SMPN 1 Padakembang',
            'kepala_sekolah' => 'Dr. H Ade Dasmana M.Si',
            'foto' => '',
            'logo' => '',
            'npsn'=> '1010101010',
            'alamat' => 'Jl. Cisinga Desa Cisaruni Kecamatan Padakembang',
            'kontak' => '089898989898',
            'visi_misi' => 'Menjadikan SMPN 1 Padakembang yang harmonis',
            'tahun_berdiri' => '1987',
            'deskripsi' => 'SMPN 1 Padakembang merupakan sekolah yang
            berkomitmen memberikan pendidikan berkualitas
            serta mengembangkan potensi peserta didik
            dalam bidang akademik maupun nonakademik.'
        ]);
    }
}
