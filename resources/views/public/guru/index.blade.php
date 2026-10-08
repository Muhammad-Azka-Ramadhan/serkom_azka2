@extends('layouts.public_app')

@section('school_name', $profilSekolah->nama_sekolah)

@section('title', 'Guru')

@section('content')

{{-- HEADER HALAMAN --}}
<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="text-center">
            <span class="badge bg-primary-subtle text-primary px-3 py-2 mb-3">Tenaga Pendidik</span>
            <h1 class="fw-bold mb-3">Guru {{ $profilSekolah->nama_sekolah }}</h1>
            <p class="text-muted mx-auto mb-0" style="max-width: 700px;">
                Mengenal tenaga pendidik yang berperan dalam mendukung
                proses pembelajaran dan perkembangan siswa.
            </p>
        </div>
    </div>
</section>

{{-- DAFTAR GURU --}}
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @forelse ($guru as $item)
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="card border-0 shadow-sm h-100 overflow-hidden">
                        {{-- FOTO --}}
                        <div class="bg-light text-center">
                        <a href="{{ route('public.guru.detail', Crypt::encrypt($item->id)) }}">
                            @if (!empty($item->foto))
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_guru ?? 'Foto Guru' }}" class="w-100" style="height: 280px; object-fit: cover;">
                            @else
                                <div class="d-flex align-items-center justify-content-center" style="height: 280px;">
                                    <i class="fas fa-user-circle text-secondary" style="font-size: 80px;"></i>
                                </div>
                            @endif
                        </a>
                        </div>
                        {{-- INFORMASI --}}
                        <div class="card-body text-center p-4">
                            <h5 class="fw-bold mb-2">{{ $item->nama_guru ?? 'Nama Guru' }}</h5>
                            @if (!empty($item->nip))
                                <p class="text-muted small mb-2">NIP. {{ $item->nip }}</p>
                            @endif
                            @if (!empty($item->mapel))
                                <span class="badge bg-primary-subtle text-primary">{{ $item->mapel }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-users text-secondary" style="font-size: 70px;"></i>
                        <h4 class="fw-bold mt-3">Belum Ada Data Guru</h4>
                        <p class="text-muted mb-0">Data guru belum tersedia untuk ditampilkan.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
