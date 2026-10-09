@extends('layouts.public_app')

@section('title', $ekstrakurikuler->nama_eskul)

@section('content')
    {{-- Header halaman --}}
    <section class="public-ekskul-header text-center text-white py-5">
        <div class="container py-3">
            <span class="public-ekskul-label">KEGIATAN SEKOLAH</span>

            <h1 class="display-5 fw-bold mt-3 mb-3">
                {{ $ekstrakurikuler->nama_eskul }}
            </h1>

            <p class="mb-0 public-ekskul-header-description">
                Informasi lengkap kegiatan ekstrakurikuler SMPN 1 Padakembang.
            </p>
        </div>
    </section>

    {{-- Konten detail --}}
    <section class="public-ekskul-content py-5">
        <div class="container">

            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb small">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('public.eskul') }}">
                            Ekstrakurikuler
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $ekstrakurikuler->nama_eskul }}
                    </li>
                </ol>
            </nav>

            <div class="row g-4 align-items-start">

                {{-- Gambar dan deskripsi --}}
                <div class="col-12 col-lg-8">
                    <article class="card border-0 shadow-sm public-ekskul-detail-card overflow-hidden">

                        @if ($ekstrakurikuler->gambar)
                            <img
                                src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                                class="public-ekskul-detail-image"
                                alt="{{ $ekstrakurikuler->nama_eskul }}"
                            >
                        @else
                            <div class="public-ekskul-image-placeholder public-ekskul-detail-placeholder d-flex align-items-center justify-content-center">
                                <i class="bi bi-image"></i>
                            </div>
                        @endif

                        <div class="card-body p-4 p-md-5">
                            <span class="public-ekskul-label public-ekskul-label-light">
                                EKSTRAKURIKULER SEKOLAH
                            </span>

                            <h2 class="h3 fw-bold mt-3 mb-3 public-ekskul-card-title">
                                {{ $ekstrakurikuler->nama_eskul }}
                            </h2>

                            <hr class="public-ekskul-divider my-4">

                            <h3 class="h5 fw-bold public-ekskul-card-title mb-3">
                                <i class="bi bi-info-circle text-primary me-2"></i>
                                Deskripsi Kegiatan
                            </h3>

                            <div class="public-ekskul-detail-description text-secondary">
                                @if ($ekstrakurikuler->deskripsi)
                                    {!! nl2br(e($ekstrakurikuler->deskripsi)) !!}
                                @else
                                    <p class="mb-0">
                                        Deskripsi kegiatan belum tersedia.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </article>
                </div>

                {{-- Informasi ekstrakurikuler --}}
                <div class="col-12 col-lg-4">
                    <aside class="card border-0 shadow-sm public-ekskul-detail-card">
                        <div class="card-body p-4">
                            <h2 class="h5 fw-bold public-ekskul-card-title mb-4">
                                Informasi Kegiatan
                            </h2>

                            {{-- Pembina --}}
                            <div class="d-flex align-items-start gap-3 public-ekskul-info-row">
                                <div class="public-ekskul-info-icon">
                                    <i class="bi bi-person-fill"></i>
                                </div>

                                <div>
                                    <div class="small text-secondary mb-1">
                                        Pembina
                                    </div>
                                    <div class="fw-semibold public-ekskul-info-value">
                                        {{ $ekstrakurikuler->guru->nama_guru ?? 'Belum ditentukan' }}
                                    </div>
                                </div>
                            </div>

                            {{-- Jadwal --}}
                            <div class="d-flex align-items-start gap-3 public-ekskul-info-row">
                                <div class="public-ekskul-info-icon">
                                    <i class="bi bi-calendar-week"></i>
                                </div>

                                <div>
                                    <div class="small text-secondary mb-1">
                                        Jadwal Latihan
                                    </div>
                                    <div class="fw-semibold public-ekskul-info-value">
                                        {{ $ekskul->jadwal ?? 'Belum tersedia' }}
                                    </div>
                                </div>
                            </div>

                            {{-- Nama ekstrakurikuler --}}
                            <div class="d-flex align-items-start gap-3 public-ekskul-info-row">
                                <div class="public-ekskul-info-icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>

                                <div>
                                    <div class="small text-secondary mb-1">
                                        Nama Ekstrakurikuler
                                    </div>
                                    <div class="fw-semibold public-ekskul-info-value">
                                        {{ $ekstrakurikuler->nama_eskul }}
                                    </div>
                                </div>
                            </div>

                            <a
                                href="{{ route('public.eskul') }}"
                                class="btn btn-outline-primary w-100 mt-4"
                            >
                                <i class="bi bi-arrow-left me-2"></i>
                                Kembali ke Ekstrakurikuler
                            </a>
                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </section>
@endsection