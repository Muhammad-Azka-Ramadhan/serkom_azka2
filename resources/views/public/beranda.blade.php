@extends('layouts.public_app')

@section('school_name', $profilSekolah->nama_sekolah)

@section('title', 'Beranda')

@section('content')

    {{-- =========================================================
    HERO
    ========================================================= --}}

    <section class="public-hero">
        <div class="container">
            <div class="row align-items-center g-5">

                <div class="col-lg-7">
                    <div class="public-hero-content">

                        <span class="badge rounded-pill public-hero-badge mb-3">
                            {{ $profilSekolah->nama_sekolah }}
                        </span>

                        <h1 class="display-4 fw-bold text-white mb-3">
                            Membangun Generasi
                            <span class="public-hero-highlight">
                                Unggul
                            </span>
                            dan Berkarakter
                        </h1>

                        <p class="lead text-white-50 mb-4">
                            Selamat datang di website resmi
                            {{ $profilSekolah->nama_sekolah }}.
                            Temukan informasi mengenai sekolah,
                            guru, siswa, kegiatan, berita, dan galeri sekolah.
                        </p>

                        <div class="d-flex flex-wrap gap-2">

                            <a href="{{ route('public.profil') }}" class="btn btn-light px-4 py-2">
                                Lihat Profil Sekolah
                            </a>

                            <a href="{{ route('public.berita') }}" class="btn btn-outline-light px-4 py-2">
                                Berita Terbaru
                            </a>

                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="public-hero-image">

                        @if (
                                !empty($profilSekolah->foto) &&
                                Storage::disk('public')->exists($profilSekolah->foto)
                            )

                            <img src="{{ asset('storage/' . $profilSekolah->foto) }}" alt="SMP Negeri 1 Padakembang"
                                class="img-fluid">

                        @else

                            <img src="{{ asset('assets/images/logo.png') }}" alt="SMP Negeri 1 Padakembang" class="img-fluid">

                        @endif

                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- =========================================================
    STATISTIK SEKOLAH
    ========================================================= --}}

    <section class="py-5 bg-white">
        <div class="container py-3">

            <div class="row g-4 justify-content-center">

                {{-- GURU --}}
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 public-stat-card public-stat-card-blue">

                        <div class="card-body p-4 p-lg-5 text-center">

                            <div class="public-stat-icon mx-auto mb-4">
                                <i class="bi bi-person-workspace"></i>
                            </div>

                            <h2 class="display-5 fw-bold mb-1">
                                {{ $jumlahGuru }}
                            </h2>

                            <p class="text-muted mb-0">
                                Guru
                            </p>

                            <div class="public-stat-line mx-auto mt-3"></div>

                            <small class="text-muted d-block mt-3">
                                Tenaga pendidik
                            </small>

                        </div>

                    </div>
                </div>


                {{-- SISWA --}}
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 public-stat-card public-stat-card-green">

                        <div class="card-body p-4 p-lg-5 text-center">

                            <div class="public-stat-icon mx-auto mb-4">
                                <i class="bi bi-people-fill"></i>
                            </div>

                            <h2 class="display-5 fw-bold mb-1">
                                {{ $jumlahSiswa }}
                            </h2>

                            <p class="text-muted mb-0">
                                Siswa
                            </p>

                            <div class="public-stat-line mx-auto mt-3"></div>

                            <small class="text-muted d-block mt-3">
                                Peserta didik
                            </small>

                        </div>

                    </div>
                </div>


                {{-- EKSTRAKURIKULER --}}
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 public-stat-card public-stat-card-yellow">

                        <div class="card-body p-4 p-lg-5 text-center">

                            <div class="public-stat-icon mx-auto mb-4">
                                <i class="bi bi-stars"></i>
                            </div>

                            <h2 class="display-5 fw-bold mb-1">
                                {{ $jumlahEskul }}
                            </h2>

                            <p class="text-muted mb-0">
                                Ekstrakurikuler
                            </p>

                            <div class="public-stat-line mx-auto mt-3"></div>

                            <small class="text-muted d-block mt-3">
                                Kegiatan siswa
                            </small>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =========================================================
    SEKILAS SEKOLAH
    ========================================================= --}}

    <section class="py-5 bg-white">
        <div class="container py-4">

            <div class="row align-items-center g-5">

                <div class="col-lg-5">
                    <div class="public-school-image">

                        @if (
                                !empty($profilSekolah->foto) &&
                                Storage::disk('public')->exists($profilSekolah->foto)
                            )

                            <img src="{{ asset('storage/' . $profilSekolah->foto) }}" alt="Foto SMP Negeri 1 Padakembang"
                                class="img-fluid">

                        @else

                            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo SMP Negeri 1 Padakembang"
                                class="img-fluid">

                        @endif

                    </div>
                </div>

                <div class="col-lg-7">

                    <span class="public-section-label">
                        TENTANG SEKOLAH
                    </span>

                    <h2 class="fw-bold mt-2 mb-3">
                        Sekilas {{ $profilSekolah->nama_sekolah }}
                    </h2>

                    <p class="text-muted lh-lg mb-4">
                        {{ $profilSekolah->deskripsi ??
        'SMP Negeri 1 Padakembang merupakan satuan pendidikan yang berkomitmen dalam memberikan pendidikan berkualitas serta membentuk peserta didik yang berkarakter.' }}
                    </p>

                    <a href="{{ route('public.profil') }}" class="btn btn-primary px-4">
                        Selengkapnya
                    </a>

                </div>

            </div>

        </div>
    </section>


    {{-- =========================================================
    IDENTITAS SEKOLAH
    ========================================================= --}}

    <section class="py-5 public-section-light">
        <div class="container py-4">

            <div class="text-center mb-5">

                <span class="public-section-label">
                    INFORMASI SEKOLAH
                </span>

                <h2 class="fw-bold mt-2 mb-2">
                    Identitas Sekolah
                </h2>

                <p class="text-muted mb-0">
                    Informasi umum {{ $profilSekolah->nama_sekolah }}
                </p>

            </div>


            <div class="row g-4">

                {{-- NAMA --}}
                <div class="col-md-6 col-lg-3">

                    <div class="card border-0 shadow-sm h-100 public-info-card">

                        <div class="card-body p-4">

                            <div class="public-info-icon mb-3">
                                <i class="bi bi-building"></i>
                            </div>

                            <small class="text-muted">
                                Nama Sekolah
                            </small>

                            <h6 class="fw-bold mt-2 mb-0">
                                {{ $profilSekolah->nama_sekolah ?? 'SMP Negeri 1 Padakembang' }}
                            </h6>

                        </div>

                    </div>

                </div>


                {{-- NPSN --}}
                <div class="col-md-6 col-lg-3">

                    <div class="card border-0 shadow-sm h-100 public-info-card">

                        <div class="card-body p-4">

                            <div class="public-info-icon mb-3">
                                <i class="bi bi-card-text"></i>
                            </div>

                            <small class="text-muted">
                                NPSN
                            </small>

                            <h6 class="fw-bold mt-2 mb-0">
                                {{ $profilSekolah->npsn ?? '-' }}
                            </h6>

                        </div>

                    </div>

                </div>


                {{-- KEPALA SEKOLAH --}}
                <div class="col-md-6 col-lg-3">

                    <div class="card border-0 shadow-sm h-100 public-info-card">

                        <div class="card-body p-4">

                            <div class="public-info-icon mb-3">
                                <i class="bi bi-person-badge"></i>
                            </div>

                            <small class="text-muted">
                                Kepala Sekolah
                            </small>

                            <h6 class="fw-bold mt-2 mb-0">
                                {{ $profilSekolah->kepala_sekolah ?? '-' }}
                            </h6>

                        </div>

                    </div>

                </div>


                {{-- TAHUN --}}
                <div class="col-md-6 col-lg-3">

                    <div class="card border-0 shadow-sm h-100 public-info-card">

                        <div class="card-body p-4">

                            <div class="public-info-icon mb-3">
                                <i class="bi bi-calendar-event"></i>
                            </div>

                            <small class="text-muted">
                                Tahun Berdiri
                            </small>

                            <h6 class="fw-bold mt-2 mb-0">
                                {{ $profilSekolah->tahun_berdiri ?? '-' }}
                            </h6>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- =========================================================
    VISI & MISI
    ========================================================= --}}

    <section class="py-5 bg-white">
        <div class="container py-4">

            <div class="text-center mb-5">

                <span class="public-section-label">
                    ARAH PENDIDIKAN
                </span>

                <h2 class="fw-bold mt-2 mb-2">
                    Visi & Misi
                </h2>

                <p class="text-muted mb-0">
                    Landasan dan arah pendidikan sekolah
                </p>

            </div>


            <div class="row d-flex">

                <div class="col-lg-6">

                    <div class="card border-0 shadow-sm public-vision-card">

                        <div class="card-body p-4 p-lg-5">

                            <div class="d-flex align-items-center mb-4">

                                <div class="public-info-icon me-3 mb-0">
                                    <i class="bi bi-bullseye"></i>
                                </div>

                                <div>
                                    <span class="public-card-label">
                                        VISI
                                    </span>

                                </div>

                            </div>

                            <p class="mb-0 lh-lg text-muted">
                                {{ $profilSekolah->visi ?? 'Visi dan misi sekolah belum tersedia.' }}
                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm public-vision-card">

                        <div class="card-body p-4 p-lg-5">

                            <div class="d-flex align-items-center mb-4">

                                <div class="public-info-icon me-3 mb-0">
                                    <i class="bi bi-bullseye"></i>
                                </div>

                                <div>
                                    <span class="public-card-label">
                                        MISI
                                    </span>

                                </div>

                            </div>

                            <p class="mb-0 lh-lg text-muted">
                                {{ $profilSekolah->misi ?? 'Visi dan misi sekolah belum tersedia.' }}
                            </p>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>


    {{-- =========================================================
    EKSTRAKURIKULER
    ========================================================= --}}

    <section class="py-5 public-section-light">
        <div class="container py-4">

            <div class="d-flex justify-content-between align-items-end mb-4">

                <div>

                    <span class="public-section-label">
                        KEGIATAN SISWA
                    </span>

                    <h2 class="fw-bold mt-2 mb-1">
                        Ekstrakurikuler
                    </h2>

                    <p class="text-muted mb-0">
                        Kegiatan untuk mengembangkan minat dan bakat siswa.
                    </p>

                </div>

                <a href="{{ route('public.ekstrakurikuler') }}" class="btn btn-outline-primary d-none d-md-inline-block">
                    Lihat Semua
                </a>

            </div>


            <div class="row g-4">

                @forelse ($ekstrakurikuler->take(4) as $item)

                    <div class="col-md-6 col-lg-3">

                        <div class="card border-0 shadow-sm h-100 public-content-card">

                            <div class="card-body p-4">

                                <div class="public-content-icon mb-3">
                                    <i class="bi bi-stars"></i>
                                </div>

                                <h5 class="fw-bold mb-2">
                                    {{ $item->nama_eskul ?? '-' }}
                                </h5>

                                @if (!empty($item->guru))

                                    <p class="text-muted small mb-0">
                                        Pembina:
                                        {{ $item->guru->nama_guru ?? '-' }}
                                    </p>

                                @endif

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-light border text-center">
                            Belum ada data ekstrakurikuler.
                        </div>

                    </div>

                @endforelse

            </div>


            <div class="text-center mt-4 d-md-none">

                <a href="{{ route('public.ekstrakurikuler') }}" class="btn btn-outline-primary">
                    Lihat Semua
                </a>

            </div>

        </div>
    </section>


    {{-- =========================================================
    GURU
    ========================================================= --}}

    <section class="py-5 bg-white">
        <div class="container py-4">

            <div class="d-flex justify-content-between align-items-end mb-4">

                <div>

                    <span class="public-section-label">
                        TENAGA PENDIDIK
                    </span>

                    <h2 class="fw-bold mt-2 mb-1">
                        Guru
                    </h2>

                    <p class="text-muted mb-0">
                        Tenaga pendidik {{ $profilSekolah->nama_sekolah }}
                    </p>

                </div>

                <a href="{{ route('public.guru') }}" class="btn btn-outline-primary d-none d-md-inline-block">
                    Lihat Semua
                </a>

            </div>


            <div class="row g-4">

                @forelse ($guru->take(4) as $item)

                    <div class="col-md-6 col-lg-3">

                        <div class="card border-0 shadow-sm h-100 public-teacher-card">

                            <div class="public-teacher-photo">

                                @if (!empty($item->foto))

                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_guru ?? 'Guru' }}"
                                        class="img-fluid">

                                @else

                                    <div class="public-placeholder">
                                        <i class="bi bi-person"></i>
                                    </div>

                                @endif

                            </div>

                            <div class="card-body p-3">

                                <h6 class="fw-bold mb-1">
                                    {{ $item->nama_guru ?? '-' }}
                                </h6>

                                <small class="text-muted">
                                    Guru
                                </small>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-light border text-center">
                            Belum ada data guru.
                        </div>

                    </div>

                @endforelse

            </div>


            <div class="text-center mt-4 d-md-none">

                <a href="{{ route('public.guru') }}" class="btn btn-outline-primary">
                    Lihat Semua
                </a>

            </div>

        </div>
    </section>


    {{-- =========================================================
    BERITA
    ========================================================= --}}

    <section class="py-5 public-section-light">
        <div class="container py-4">

            <div class="d-flex justify-content-between align-items-end mb-4">

                <div>

                    <span class="public-section-label">
                        INFORMASI TERKINI
                    </span>

                    <h2 class="fw-bold mt-2 mb-1">
                        Berita Terbaru
                    </h2>

                    <p class="text-muted mb-0">
                        Informasi dan kegiatan terbaru sekolah.
                    </p>

                </div>

                <a href="{{ route('public.berita') }}" class="btn btn-outline-primary d-none d-md-inline-block">
                    Semua Berita
                </a>

            </div>


            <div class="row g-4">

                @forelse ($berita->take(3) as $item)

                    <div class="col-md-6 col-lg-4">

                        <article class="card border-0 shadow-sm h-100 public-news-card">

                            @if (!empty($item->foto))

                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul ?? 'Berita sekolah' }}"
                                    class="public-news-image">

                            @else

                                <div class="public-news-placeholder">
                                    <i class="bi bi-newspaper"></i>
                                </div>

                            @endif

                            <div class="card-body p-4">

                                @if (!empty($item->created_at))

                                    <small class="text-muted">
                                        {{ $item->created_at->format('d M Y') }}
                                    </small>

                                @endif

                                <h5 class="fw-bold mt-2 mb-0">
                                    {{ $item->judul ?? '-' }}
                                </h5>

                            </div>

                        </article>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-light border text-center">
                            Belum ada berita.
                        </div>

                    </div>

                @endforelse

            </div>

        </div>
    </section>


    {{-- =========================================================
    GALERI
    ========================================================= --}}

    <section class="py-5 bg-white">
        <div class="container py-4">

            <div class="d-flex justify-content-between align-items-end mb-4">

                <div>

                    <span class="public-section-label">
                        DOKUMENTASI
                    </span>

                    <h2 class="fw-bold mt-2 mb-1">
                        Galeri Sekolah
                    </h2>

                    <p class="text-muted mb-0">
                        Dokumentasi kegiatan SMP Negeri 1 Padakembang.
                    </p>

                </div>

                <a href="{{ route('public.galeri') }}" class="btn btn-outline-primary d-none d-md-inline-block">
                    Lihat Galeri
                </a>

            </div>


            <div class="row g-3">

                @forelse ($galeri->take(6) as $item)

                    <div class="col-6 col-md-4">

                        <div class="public-gallery-card">

                            @if (!empty($item->foto))

                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Galeri SMP Negeri 1 Padakembang"
                                    class="img-fluid">

                            @else

                                <div class="public-gallery-placeholder">
                                    <i class="bi bi-image"></i>
                                </div>

                            @endif

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="alert alert-light border text-center">
                            Belum ada dokumentasi galeri.
                        </div>

                    </div>

                @endforelse

            </div>


            <div class="text-center mt-4 d-md-none">

                <a href="{{ route('public.galeri') }}" class="btn btn-outline-primary">
                    Lihat Galeri
                </a>

            </div>

        </div>
    </section>


    {{-- =========================================================
    CTA
    ========================================================= --}}

    <section class="public-cta py-5">

        <div class="container py-4">

            <div class="row align-items-center g-4">

                <div class="col-lg-8">

                    <h2 class="fw-bold text-white mb-2">
                        Mengenal {{ $profilSekolah->nama_sekolah }} Lebih Dekat
                    </h2>

                    <p class="text-white-50 mb-0">
                        Temukan informasi lengkap mengenai sekolah,
                        guru, siswa, kegiatan, berita, dan dokumentasi sekolah.
                    </p>

                </div>

                <div class="col-lg-4 text-lg-end">

                    <a href="{{ route('public.profil') }}" class="btn btn-light px-4">
                        Lihat Profil Sekolah
                    </a>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
    FOOTER
    ========================================================= --}}

    <footer class="public-footer">

        <div class="container py-5">

            <div class="row g-4">

                <div class="col-lg-5">

                    <h5 class="text-white fw-bold mb-3">
                        {{ $profilSekolah->nama_sekolah }}
                    </h5>

                    <p class="text-white-50 small mb-0">
                        Website resmi SMP Negeri 1 Padakembang
                        sebagai media informasi sekolah.
                    </p>

                </div>


                <div class="col-md-4 col-lg-3">

                    <h6 class="text-white fw-bold mb-3">
                        Navigasi
                    </h6>

                    <ul class="list-unstyled public-footer-links">

                        <li>
                            <a href="{{ route('public.beranda') }}">
                                Beranda
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('public.profil') }}">
                                Profil Sekolah
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('public.ekstrakurikuler') }}">
                                Ekstrakurikuler
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('public.guru') }}">
                                Guru
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('public.siswa') }}">
                                Siswa
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('public.berita') }}">
                                Berita
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('public.galeri') }}">
                                Galeri
                            </a>
                        </li>

                    </ul>

                </div>


                <div class="col-md-8 col-lg-4">

                    <h6 class="text-white fw-bold mb-3">
                        Kontak
                    </h6>

                    <p class="text-white-50 small mb-2">
                        {{ $profilSekolah->alamat ?? '-' }}
                    </p>

                    <p class="text-white-50 small mb-0">
                        {{ $profilSekolah->kontak ?? '-' }}
                    </p>

                </div>

            </div>


            <hr class="border-secondary my-4">


            <div class="text-center">

                <small class="text-white-50">
                    &copy; {{ date('Y') }}
                    {{ $profilSekolah->nama_sekolah }}
                    All rights reserved.
                </small>

            </div>

        </div>

    </footer>

@endsection