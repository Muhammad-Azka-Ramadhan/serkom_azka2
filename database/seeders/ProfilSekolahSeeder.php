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
            'foto_kepala_sekolah' => '',
            'sambutan_kepala_sekolah' => 'Assalamu’alaikum warahmatullahi wabarakatuh.
            Puji syukur kita panjatkan ke hadirat Allah SWT atas segala rahmat dan karunia-Nya sehingga website resmi SMP Negeri 1 Padakembang dapat hadir sebagai sarana informasi, komunikasi, dan publikasi bagi seluruh warga sekolah serta masyarakat.
            Selamat datang di website resmi SMP Negeri 1 Padakembang. Kami berharap website ini dapat menjadi jendela informasi yang memberikan gambaran mengenai profil sekolah, kegiatan pembelajaran, prestasi peserta didik, program sekolah, serta berbagai informasi pendidikan lainnya.
            Sebagai lembaga pendidikan, SMP Negeri 1 Padakembang senantiasa berkomitmen untuk menciptakan lingkungan belajar yang aman, nyaman, dan inspiratif. Kami terus berupaya meningkatkan kualitas pendidikan melalui pengembangan karakter, peningkatan kompetensi, pemanfaatan teknologi, serta pembinaan potensi dan kreativitas peserta didik agar mampu menghadapi tantangan zaman.
            Kami menyadari bahwa keberhasilan pendidikan tidak terlepas dari kerja sama antara sekolah, orang tua, masyarakat, dan seluruh pihak terkait. Oleh karena itu, kami mengajak semua pihak untuk terus bersinergi dalam mewujudkan generasi yang beriman, berkarakter, berprestasi, dan berwawasan luas.
            Akhir kata, semoga website ini dapat memberikan manfaat bagi seluruh pengunjung dan menjadi salah satu langkah nyata dalam mewujudkan pelayanan informasi pendidikan yang transparan, informatif, dan mudah diakses.
            Wassalamu’alaikum warahmatullahi wabarakatuh.',
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
