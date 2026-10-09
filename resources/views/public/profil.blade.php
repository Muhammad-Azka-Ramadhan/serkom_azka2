@extends('layouts.public_app')

@section('school_name', $profilSekolah->nama_sekolah)

@section('title', 'Profil Sekolah')

@section('content')

{{-- HEADER --}}
<section class="py-5 public-page-header">
    <div class="container py-5">
        <div class="text-center mx-auto" style="max-width: 760px;">
            <span class="public-section-label">
                TENTANG SEKOLAH
            </span>
            <h1 class="display-5 fw-bold text-white mt-2 mb-3">
                Profil Sekolah
            </h1>
            <p class="text-white-50 mb-0">
                Mengenal lebih dekat {{ $profilSekolah->nama_sekolah }}
                sebagai lembaga pendidikan yang berkomitmen
                terhadap perkembangan peserta didik.
            </p>
        </div>
    </div>
</section>

{{-- IDENTITAS SEKOLAH --}}
<section class="py-5 bg-light">
    <div class="container py-3">
        <div class="row g-4 align-items-stretch">
            {{-- LOGO --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center text-center p-4 p-lg-5">
                        @if (!empty($profilSekolah->logo) && Storage::disk('public')->exists($profilSekolah->logo))
                            <img
                                src="{{ asset('storage/' . $profilSekolah->logo) }}"
                                alt="Logo {{ $profilSekolah->nama_sekolah }}"
                                class="img-fluid mb-4"
                                style="max-height: 220px;"
                            >
                        @else
                            <img
                                src="{{ asset('assets/images/logo.png') }}"
                                alt="Logo {{ $profilSekolah->nama_sekolah }}"
                                class="img-fluid mb-4"
                                style="max-height: 220px;"
                            >
                        @endif
                        <h5 class="fw-bold mb-1">
                            {{ $profilSekolah->nama_sekolah }}
                        </h5>
                        <p class="text-secondary small mb-0">
                            Sekolah Menengah Pertama Negeri
                        </p>
                    </div>
                </div>
            </div>

            {{-- DATA SEKOLAH --}}
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 p-lg-5">
                        <span class="badge bg-primary-subtle text-primary px-3 py-2 mb-3">
                            Identitas Sekolah
                        </span>
                        <h2 class="fw-bold mb-4">
                            {{ $profilSekolah->nama_sekolah }}
                        </h2>
                        <div class="row g-4">
                            {{-- KEPALA SEKOLAH --}}
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="public-info-icon public-info-icon-yellow rounded-3 p-3 flex-shrink-0">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div>
                                        <small class="text-secondary d-block mb-1">
                                            Kepala Sekolah
                                        </small>
                                        <div class="fw-semibold">
                                            {{ $profilSekolah->kepala_sekolah ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- NPSN --}}
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="public-info-icon public-info-icon-blue rounded-3 p-3 flex-shrink-0">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <div>
                                        <small class="text-secondary d-block mb-1">
                                            NPSN
                                        </small>
                                        <div class="fw-semibold">
                                            {{ $profilSekolah->npsn ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- TAHUN BERDIRI --}}
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="public-info-icon public-info-icon-green rounded-3 p-3 flex-shrink-0">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div>
                                        <small class="text-secondary d-block mb-1">
                                            Tahun Berdiri
                                        </small>
                                        <div class="fw-semibold">
                                            {{ $profilSekolah->tahun_berdiri ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- KONTAK --}}
                            <div class="col-md-6">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="public-info-icon public-info-icon-blue rounded-3 p-3 flex-shrink-0">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div>
                                        <small class="text-secondary d-block mb-1">
                                            Kontak
                                        </small>
                                        <div class="fw-semibold">
                                            {{ $profilSekolah->kontak ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- ALAMAT --}}
                            <div class="col-12">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="public-info-icon public-info-icon-green rounded-3 p-3 flex-shrink-0">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <small class="text-secondary d-block mb-1">
                                            Alamat
                                        </small>
                                        <div class="fw-semibold">
                                            {{ $profilSekolah->alamat ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- DESKRIPSI --}}
<section class="py-5 bg-white">
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="text-center mb-4">
                            <span class="badge bg-primary-subtle text-primary px-3 py-2 mb-3">
                                Tentang Kami
                            </span>
                            <h2 class="fw-bold mb-2">
                                {{ $profilSekolah->nama_sekolah }}
                            </h2>
                        </div>
                        <div class="text-secondary lh-lg text-center">
                            {!! nl2br(e($profilSekolah->deskripsi ?? 'Belum ada deskripsi sekolah.')) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- VISI & MISI --}}
<section class="py-5 bg-light">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="badge bg-primary-subtle text-primary px-3 py-2 mb-3">
                Arah Sekolah
            </span>
            <h2 class="fw-bold mb-2">
                Visi & Misi
            </h2>
            <p class="text-secondary mb-0">
                Landasan dalam mewujudkan tujuan pendidikan sekolah.
            </p>
        </div>

        <div class="row g-4">
            {{-- VISI --}}
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 public-vision-card public-vision-blue">
                    <div class="card-body p-4 p-lg-5">
                        <div class="d-inline-flex public-info-icon public-info-icon-blue rounded-circle p-3 mb-4">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h4 class="fw-bold mb-3">
                            Visi
                        </h4>
                        <p class="text-secondary lh-lg mb-0">
                            {{ $profilSekolah->visi ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- MISI --}}
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 h-100 public-vision-card public-vision-green">
                    <div class="card-body p-4 p-lg-5">
                        <div class="d-inline-flex public-info-icon public-info-icon-green rounded-circle p-3 mb-4">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h4 class="fw-bold mb-3">
                            Misi
                        </h4>
                        <div class="text-secondary lh-lg">
                            {!! nl2br(e($profilSekolah->misi ?? '-')) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<footer class="py-5 public-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5">
                <h5 class="text-white fw-bold mb-3">{{ $profilSekolah->nama_sekolah }}</h5>
                <p class="text-white-50 small mb-0">
                    Website resmi {{ $profilSekolah->nama_sekolah }}
                    sebagai media informasi sekolah.
                </p>
            </div>
            <div class="col-md-4 col-lg-3">
                <h6 class="text-white fw-bold mb-3">Navigasi</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <a href="{{ route('public.beranda') }}" class="text-white-50 text-decoration-none footer-link">Beranda</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('public.profil') }}" class="text-white-50 text-decoration-none footer-link">Profil Sekolah</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('public.eskul') }}" class="text-white-50 text-decoration-none footer-link">Ekstrakurikuler</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('public.guru') }}" class="text-white-50 text-decoration-none footer-link">Guru</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('public.berita') }}" class="text-white-50 text-decoration-none footer-link">Berita</a>
                    </li>
                    <li>
                        <a href="{{ route('public.galeri') }}" class="text-white-50 text-decoration-none footer-link">Galeri</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 col-lg-4">
                <h6 class="text-white fw-bold mb-3">Kontak</h6>
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