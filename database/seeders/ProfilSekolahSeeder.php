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
            'visi' => 'Menjadi sekolah yang unggul dalam prestasi akademik dan non-akademik, serta berperan aktif dalam pengembangan karakter peserta didik.',
            'misi' => '1. Meningkatkan kualitas pembelajaran melalui inovasi dan metode yang efektif.
            2. Mengembangkan potensi peserta didik dalam bidang akademik dan non-akademik.
            3. Mendorong partisipasi aktif dalam kegiatan sosial dan kemasyarakatan.
            4. Membangun lingkungan sekolah yang aman, nyaman, dan mendukung pembelajaran.
            5. Menjalin kerja sama dengan berbagai pihak untuk meningkatkan kualitas pendidikan.',
            'tahun_berdiri' => '1987',
            'deskripsi' => 'SMPN 1 Padakembang merupakan sekolah yang
            berkomitmen memberikan pendidikan berkualitas
            serta mengembangkan potensi peserta didik
            dalam bidang akademik maupun nonakademik.'
        ]);
    }
}
