@extends('layouts.public_app')

@section('nama_sekolah', $profilSekolah->nama_sekolah)

@section('title', 'Ekstrakurikuler')

@section('content')
    {{-- Header halaman --}}
    <section class="public-ekskul-header text-center text-white py-5">
        <div class="container py-3">
            <span class="public-ekskul-label">KEGIATAN SEKOLAH</span>

            <h1 class="display-5 fw-bold mt-3 mb-3">
                Ekstrakurikuler
            </h1>

            <p class="mb-0 public-ekskul-header-description">
                Temukan berbagai kegiatan untuk mengembangkan bakat,
                minat, dan kreativitas siswa SMPN 1 Padakembang.
            </p>
        </div>
    </section>

    <section class="py-5 bg-light">
    <div class="container py-3">
        <div class="row g-4">
            @forelse ($ekstrakurikuler as $item)
                <div class="col-md-6 col-lg-4">
                    <article class="card border-0 shadow-sm rounded-4 h-100 public-card">
                        {{-- FOTO --}}
                        <a href="{{ route('public.eskul.detail', Crypt::encrypt($item->id)) }}?from=berita" class="text-decoration-none overflow-hidden">
                            @if (!empty($item->gambar))
                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->nama_eskul ?? 'Berita sekolah' }}"
                                    class="card-img-top w-100 object-fit-cover public-card-image"
                                    style="height: 230px;"
                                >
                            @else
                                <div class="bg-body-secondary d-flex align-items-center justify-content-center" style="height: 230px;">
                                    <i class="fas fa-newspaper fa-3x text-secondary"></i>
                                </div>
                            @endif
                        </a>

                        {{-- ISI --}}
                        <div class="card-body p-4">
                            @if (!empty($item->jadwal_latihan))
                                <div class="small text-secondary mb-2">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    {{ $item->jadwal_latihan }}
                                </div>
                            @endif
                            <a href="{{ route('public.eskul.detail', Crypt::encrypt($item->id)) }}?from=berita" class="text-decoration-none">
                                <h5 class="fw-bold mb-3 public-card-title">
                                    {{ $item->nama_eskul ?? 'Tanpa judul' }}
                                </h5>
                            </a>
                            <div class="small text-secondary mb-0 ">
                                <i class="fa-solid fa-user"></i>
                                Pembina : {{ $item->guru->nama_guru }}
                            </div>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 text-center p-5">
                        <i class="fas fa-newspaper fa-3x text-secondary mb-4"></i>
                        <h4 class="fw-bold mb-2">
                            Belum Ada Berita
                        </h4>
                        <p class="text-secondary mb-0">
                            Belum ada berita atau informasi yang
                            dipublikasikan oleh sekolah.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if ($ekstrakurikuler->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $ekstrakurikuler->links() }}
            </div>
        @endif
    </div>
</section>
@endsection