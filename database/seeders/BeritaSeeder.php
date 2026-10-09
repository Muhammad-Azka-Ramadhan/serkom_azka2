<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

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

        Berita::create([
            'judul' => 'SMP Negeri 1 Padakembang Gelar Class Meeting',
            'isi' => 'SMP Negeri 1 Padakembang menggelar kegiatan Class Meeting sebagai bagian dari kegiatan sekolah setelah pelaksanaan penilaian. Kegiatan ini diikuti oleh siswa dari berbagai kelas dengan penuh antusias dan semangat.
            Berbagai perlombaan dan kegiatan menarik diselenggarakan untuk memberikan kesempatan kepada siswa dalam mengembangkan bakat, kreativitas, sportivitas, serta mempererat kebersamaan antarsiswa.
            Melalui kegiatan Class Meeting, siswa diharapkan dapat menikmati suasana sekolah yang lebih menyenangkan sekaligus belajar bekerja sama dan menjunjung tinggi sportivitas.
            Kegiatan berlangsung dengan meriah dan mendapat antusiasme positif dari seluruh peserta. Semoga kegiatan ini dapat terus menjadi salah satu kegiatan yang mempererat kebersamaan keluarga besar SMP Negeri 1 Padakembang.',
            'tanggal' => '2026-10-01',
            'gambar' => '',
            'id_user' => 1
        ]);

        Berita::create([
            'judul' => 'SMP Negeri 1 Padakembang Raih Juara Lomba Kebersihan Sekolah',
            'isi' => 'SMP Negeri 1 Padakembang kembali menunjukkan prestasi melalui lomba kebersihan sekolah. Berkat kerja sama dan kepedulian seluruh warga sekolah dalam menjaga kebersihan serta lingkungan sekolah, SMP Negeri 1 Padakembang berhasil meraih juara dalam lomba kebersihan sekolah.
            Keberhasilan ini tidak lepas dari peran aktif para siswa, guru, dan seluruh warga sekolah dalam menciptakan lingkungan belajar yang bersih, sehat, dan nyaman.
            Prestasi tersebut diharapkan dapat meningkatkan kesadaran seluruh warga sekolah untuk terus menjaga kebersihan dan menjadikan lingkungan sekolah sebagai tempat belajar yang nyaman.
            Selamat kepada seluruh warga SMP Negeri 1 Padakembang atas pencapaian ini. Semoga semangat menjaga kebersihan terus menjadi budaya di lingkungan sekolah.',
            'tanggal' => '2026-07-10',
            'gambar' => '',
            'id_user' => 1
        ]);
    }
}
