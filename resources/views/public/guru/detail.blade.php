@extends('layouts.public_app')

@section('school_name', $profilSekolah->nama_sekolah)
@section('title', 'Detail Guru')

@section('content')

<div class="container py-5">
    <a href="{{ route('public.guru') }}" class="btn btn-outline-primary mb-4">
        <i class="fas fa-arrow-left me-2"></i>
        Kembali
    </a>
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="row g-0">
            {{-- Foto Guru --}}
            <div class="col-lg-4">
                @if (!empty($guru->foto) && Storage::disk('public')->exists($guru->foto))
                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama_guru }}" class="img-fluid w-100 h-100 object-fit-cover">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center h-100">
                        <i class="fas fa-user fa-5x text-secondary"></i>
                    </div>
                @endif
            </div>

            {{-- Informasi Guru --}}
            <div class="col-lg-8">
                <div class="p-4 p-lg-5">
                    <span class="badge guru-badge mb-3">Guru</span>
                    <h2 class="fw-bold mb-4">{{ $guru->nama_guru }}</h2>
                    <div class="mb-4">
                        <small class="text-secondary d-block mb-1">NIP</small>
                        <div class="fw-semibold">{{ $guru->nip ?? '-' }}</div>
                    </div>
                    <div>
                        <small class="text-secondary d-block mb-1">Mata Pelajaran</small>
                        <div class="fw-semibold">{{ $guru->mapel ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection