@extends('layouts.public_app')

@section('content')

@section('nama_sekolah', $profilSekolah->nama_sekolah)

@section('title', $galeri->judul)

<div class="container py-5">
    <div class="mb-4">
        <a href="{{ request('from') === 'beranda'
            ? route('public.beranda')
            : route('public.galeri') }}"
           class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-2"></i>
            Kembali
        </a>
    </div>
    <article class="card border-0 shadow-sm overflow-hidden">
        @if (!empty($galeri->file))
            @if ($galeri->kategori === 'Video')
                <video src="{{ asset('storage/' . $galeri->file) }}"
                    class="card-img-top w-100 public-card-image"
                    style="height: 450px"
                    controls></video>
            @else
                <img
                    src="{{ asset('storage/' . $galeri->file) }}"
                    class="card-img-top object-fit-cover"
                    style="height: 450px;"
                >
            @endif
            @else
                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 350px;">
                    <i class="bi bi-newspaper fs-1 text-secondary"></i>
                </div>
            @endif
        <div class="card-body p-4 p-md-5">
            <h1 class="fw-bold mb-4">
                {{ $galeri->judul ?? 'Tanpa judul' }}
            </h1>
            <div class="fs-5 lh-lg text-dark">
                {!! nl2br(e($galeri->keterangan)) !!}
            </div>
        </div>
    </article>
</div>
@endsection
