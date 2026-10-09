@extends('layouts.public_app')

@section('school_name', $profilSekolah->nama_Sekolah)

@section('title', 'Detail Berita')

@section('content')
<div class="container py-5">
    {{-- TOMBOL KEMBALI --}}
    <div class="mb-4">
        <a href="{{ request('from') === 'beranda' 
            ? route('public.beranda')
            : route('public.berita') }}"
           class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali
        </a>
    </div>

    {{-- ARTIKEL BERITA --}}
    <article class="card border-0 shadow-sm overflow-hidden">
        {{-- FOTO BERITA --}}
        @if (!empty($berita->gambar))
            <img
                src="{{ asset('storage/' . $berita->gambar) }}"
                alt="{{ $berita->judul ?? 'Berita sekolah' }}"
                class="card-img-top object-fit-cover"
                style="height: 450px;">
        @else
            <div class="bg-light d-flex align-items-center justify-content-center"
                 style="height: 350px;">

                <i class="bi bi-newspaper fs-1 text-secondary"></i>
            </div>
        @endif

        {{-- ISI ARTIKEL --}}
        <div class="card-body p-4 p-md-5">
            {{-- TANGGAL --}}
            @if (!empty($berita->tanggal))
                <div class="text-muted mb-3">
                    <i class="bi bi-calendar3 me-1"></i>

                    {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                </div>
            @elseif (!empty($berita->created_at))
                <div class="text-muted mb-3">
                    <i class="bi bi-calendar3 me-1"></i>

                    {{ ($berita->created_at)->format('d M Y') }}
                </div>
            @endif

            {{-- JUDUL --}}
            <h1 class="fw-bold mb-4">
                {{ $berita->judul ?? 'Tanpa judul' }}
            </h1>

            {{-- ISI BERITA --}}
            <div class="fs-5 lh-lg text-dark">
                {!! nl2br(e($berita->isi)) !!}
            </div>
        </div>
    </article>
</div>
@endsection