@extends('layouts.public_app')

@section('school_name', $profilSekolah->nama_sekolah)

@section('title', 'Beranda')

@section('content')

    <section class="home-hero">
        {{-- BACKGROUND FOTO SEKOLAH --}}
        <div class="home-hero-background">
            @if (!empty($profilSekolah->foto) && Storage::disk('public')->exists($profilSekolah->foto))
                <img
                    src="{{ asset('storage/' . $profilSekolah->foto) }}"
                    alt="Foto {{ $profilSekolah->nama_sekolah }}"
                >
            @else
                <img
                    src="{{ asset('assets/images/foto_smp.jpg') }}"
                    alt="Foto {{ $profilSekolah->nama_sekolah }}"
                >
            @endif
        </div>
        <div class="home-hero-overlay"></div>

        <div class="container position-relative">
            
            <div class="home-hero-content text-center text-white">
                {{-- LOGO --}}
                @if (!empty($profilSekolah->logo) && Storage::disk('public')->exists($profilSekolah->logo))
                    <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="Logo {{ $profilSekolah->nama_sekolah }}"
                        class="home-hero-logo">
                @else
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo {{ $profilSekolah->nama_sekolah }}"
                        class="home-hero-logo">
                @endif

                {{-- NAMA SEKOLAH --}}
                <h1 class="fw-bold mt-4 mb-2">
                    {{ $profilSekolah->nama_sekolah }}
                </h1>

                <p class="fs-5 mb-0">
                    Sekolah Menengah Pertama Negeri
                </p>

            </div>
        </div>

    </section>

    {{-- STATISTIK SEKOLAH --}}
    <div class="home-statistics">

        <div class="container">

            <div class="row g-4">

                {{-- SISWA --}}
                <div class="col-md-4">

                    <div class="card border-0 shadow-lg rounded-4 h-100">

                        <div class="card-body text-center p-4">

                            <div class="d-inline-flex align-items-center justify-content-center
                                        bg-primary bg-opacity-10 text-primary rounded-circle p-3 mb-3">
                                <i class="fas fa-users fs-3"></i>
                            </div>

                            <h2 class="fw-bold mb-1">
                                {{ $jumlahSiswa }}
                            </h2>

                            <p class="text-secondary fw-medium mb-0">
                                Siswa
                            </p>

                        </div>

                    </div>

                </div>


                {{-- GURU --}}
                <div class="col-md-4">

                    <div class="card border-0 shadow-lg rounded-4 h-100">

                        <div class="card-body text-center p-4">

                            <div class="d-inline-flex align-items-center justify-content-center
                                        bg-success bg-opacity-10 text-success rounded-circle p-3 mb-3">
                                <i class="fas fa-chalkboard-teacher fs-3"></i>
                            </div>

                            <h2 class="fw-bold mb-1">
                                {{ $jumlahGuru }}
                            </h2>

                            <p class="text-secondary fw-medium mb-0">
                                Guru
                            </p>

                        </div>

                    </div>

                </div>


                {{-- EKSTRAKURIKULER --}}
                <div class="col-md-4">

                    <div class="card border-0 shadow-lg rounded-4 h-100">

                        <div class="card-body text-center p-4">

                            <div class="d-inline-flex align-items-center justify-content-center
                                        bg-warning bg-opacity-10 text-warning rounded-circle p-3 mb-3">
                                <i class="fas fa-trophy fs-3"></i>
                            </div>

                            <h2 class="fw-bold mb-1">
                                {{ $jumlahEskul }}
                            </h2>

                            <p class="text-secondary fw-medium mb-0">
                                Ekstrakurikuler
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- =========================================================
    SEKILAS SEKOLAH
    ========================================================= --}}

    <section class="py-5 bg-white after-statistic">

        <div class="container py-4">

            <div class="row align-items-center g-5">

                <div class="col-lg-5">

                    <div class="public-school-image">

                        @if (!empty($profilSekolah->foto) && Storage::disk('public')->exists($profilSekolah->foto))

                            <img src="{{ asset('storage/' . $profilSekolah->foto) }}"
                                alt="Foto {{ $profilSekolah->nama_sekolah }}" class="img-fluid">

                        @else

                            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo {{ $profilSekolah->nama_sekolah }}"
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

                    <a href="{{ route('public.profil') }}" class="btn text-white px-4">

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

                <div class="col-md-6 col-lg-3">

                    <div class="card border-0 shadow-sm h-100 public-info-card">

                        <div class="card-body p-4">

                            <div class="public-info-icon public-info-icon-blue mb-3">
                                <i class="fas fa-school"></i>
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


                <div class="col-md-6 col-lg-3">

                    <div class="card border-0 shadow-sm h-100 public-info-card">

                        <div class="card-body p-4">

                            <div class="public-info-icon public-info-icon-green mb-3">
                                <i class="fas fa-id-card"></i>
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


                <div class="col-md-6 col-lg-3">

                    <div class="card border-0 shadow-sm h-100 public-info-card">

                        <div class="card-body p-4">

                            <div class="public-info-icon public-info-icon-yellow  mb-3">
                                <i class="fas fa-user-tie"></i>
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


                <div class="col-md-6 col-lg-3">

                    <div class="card border-0 shadow-sm h-100 public-info-card">

                        <div class="card-body p-4">

                            <div class="public-info-icon public-info-icon-blue mb-3">
                                <i class="fas fa-calendar-alt"></i>
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


            <div class="row g-4">

                {{-- VISI --}}
                <div class="col-lg-6">

                    <div class="card border-0 shadow-sm public-vision-card public-vision-blue">

                        <div class="card-body p-4 p-lg-5">

                            <div class="d-flex align-items-center mb-4">

                                <div class="public-info-icon public-info-icon-blue me-3 mb-0">
                                    <i class="fas fa-bullseye"></i>
                                </div>

                                <span class="public-card-label">
                                    VISI
                                </span>

                            </div>

                            <p class="mb-0 lh-lg text-muted">
                                {{ $profilSekolah->visi ?? 'Visi sekolah belum tersedia.' }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- MISI --}}
                <div class="col-lg-6">

                    <div class="card border-0 shadow-sm public-vision-card public-vision-green">

                        <div class="card-body p-4 p-lg-5">

                            <div class="d-flex align-items-center mb-4">

                                <div class="public-info-icon public-info-icon-green me-3 mb-0">
                                    <i class="fas fa-check-circle"></i>
                                </div>

                                <span class="public-card-label">
                                    MISI
                                </span>

                            </div>

                            <p class="mb-0 lh-lg text-muted">
                                {{ $profilSekolah->misi ?? 'Misi sekolah belum tersedia.' }}
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

                                <div class="public-content-icon public-content-icon-yellow mb-3">
                                    <i class="fas fa-star"></i>
                                </div>

                                <h5 class="fw-bold mb-2">
                                    {{ $item->nama_eskul ?? '-' }}
                                </h5>

                                @if (!empty($item->guru))

                                    <p class="text-muted small mb-0">

                                        <i class="fas fa-user me-1"></i>

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

                                        <i class="fas fa-user"></i>

                                    </div>

                                @endif

                            </div>

                            <div class="card-body p-3">

                                <h6 class="fw-bold mb-1">
                                    {{ $item->nama_guru ?? '-' }}
                                </h6>

                                <small class="text-muted">
                                    {{ $item->mapel }}
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

                            @if (!empty($item->gambar))

                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul ?? 'Berita sekolah' }}"
                                    class="public-news-image">

                            @else

                                <div class="public-news-placeholder">

                                    <i class="fas fa-newspaper"></i>

                                </div>

                            @endif

                            <div class="card-body p-4">

                                @if (!empty($item->created_at))

                                    <small class="text-muted">

                                        <i class="far fa-calendar-alt me-1"></i>

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
                        Dokumentasi kegiatan {{ $profilSekolah->nama_sekolah }}.
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

                            @if (!empty($item->file))

                                <img src="{{ asset('storage/' . $item->file) }}" alt="Galeri {{ $profilSekolah->nama_sekolah }}"
                                    class="img-fluid">

                            @else

                                <div class="public-gallery-placeholder">

                                    <i class="fas fa-image"></i>

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
                        Website resmi {{ $profilSekolah->nama_sekolah }}
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
                        <i class="fas fa-map-marker-alt me-2"></i>
                        {{ $profilSekolah->alamat ?? '-' }}
                    </p>

                    <p class="text-white-50 small mb-0">
                        <i class="fas fa-phone me-2"></i>
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