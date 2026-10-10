@extends('layouts.public_app')

@section('nama_sekolah', $profilSekolah->nama_sekolah)

@section('title', $ekstrakurikuler->nama_eskul)

@section('content')
    <section class="py-5">
        <div class="container">

            {{-- JUDUL --}}
            <h1 class="h2 fw-bold text-card mb-4">
                {{ $ekstrakurikuler->nama_eskul }}
            </h1>

            {{-- GAMBAR DAN INFORMASI --}}
            <div class="row g-4 align-items-stretch mb-5">

                {{-- GAMBAR --}}
                <div class="col-12 col-lg-7">
                    <div class="rounded-4 overflow-hidden h-100">
                        <img
                            src="{{ $ekstrakurikuler->gambar
                                ? asset('storage/' . $ekstrakurikuler->gambar)
                                : asset('assets/images/eskul-default.jpg') }}"
                            alt="{{ $ekstrakurikuler->nama_eskul }}"
                            class="w-100 h-100 eskul-gambar-utama"
                        >
                    </div>
                </div>

                {{-- INFORMASI --}}
                <div class="col-12 col-lg-5">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 p-lg-5">

                            <h2 class="h5 fw-bold text-card mb-4">
                                Informasi Kegiatan
                            </h2>

                            {{-- JADWAL --}}
                            <div class="d-flex align-items-start gap-3 mb-4">
                                <div class="eskul-info-icon">
                                    <i class="bi bi-calendar-event"></i>
                                </div>

                                <div>
                                    <div class="fw-semibold text-card mb-1">
                                        Jadwal Latihan
                                    </div>
                                    <div class="text-secondary">
                                        {{ $ekstrakurikuler->jadwal_latihan ?? 'Belum ditentukan' }}
                                    </div>
                                </div>
                            </div>

                            {{-- PEMBINA --}}
                            <div class="d-flex align-items-start gap-3">
                                <div class="eskul-info-icon">
                                    <i class="bi bi-person-fill"></i>
                                </div>

                                <div>
                                    <div class="fw-semibold text-card mb-1">
                                        Pembina
                                    </div>
                                    <div class="text-secondary">
                                        {{ $ekstrakurikuler->guru->nama_guru ?? 'Belum ditentukan' }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-4">
                <h2 class="h4 fw-bold text-card mb-3">
                    Deskripsi Kegiatan
                </h2>

                <div class="eskul-deskripsi">
                    {!! nl2br(e($ekstrakurikuler->deskripsi ?? 'Deskripsi belum tersedia.')) !!}
                </div>
            </div>

            {{-- TOMBOL KEMBALI --}}
            <a href="{{ route('public.eskul') }}"
               class="btn btn-outline-primary mt-2">
                <i class="bi bi-arrow-left me-1"></i>
                Kembali ke Ekstrakurikuler
            </a>

        </div>
    </section>
@endsection