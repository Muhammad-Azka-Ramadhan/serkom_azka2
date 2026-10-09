@extends('layouts.public_app')

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

    {{-- Daftar ekstrakurikuler --}}
    <section class="public-ekskul-content py-5">
        <div class="container">
            <div class="row g-4">
                @forelse ($ekstrakurikuler as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <article class="card public-ekskul-card h-100 border-0 shadow-sm">

                            {{-- Gambar --}}
                            <a
                                href="{{ route('public.eskul.detail', Crypt::encrypt($item->id)) }}"
                                class="public-ekskul-image-link"
                                aria-label="Lihat {{ $item->nama_eskul }}"
                            >
                                @if ($item->gambar)
                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        class="card-img-top public-ekskul-image"
                                        alt="{{ $item->nama_eskul }}"
                                        loading="lazy"
                                    >
                                @else
                                    <div class="public-ekskul-image-placeholder d-flex align-items-center justify-content-center">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                            </a>

                            {{-- Isi kartu --}}
                            <div class="card-body p-4 d-flex flex-column">
                                <div class="small text-secondary mb-3">
                                    <i class="bi bi-calendar3 me-2 text-primary"></i>
                                    {{ $item->created_at?->translatedFormat('d M Y') ?? 'Kegiatan sekolah' }}
                                </div>

                                <h2 class="h5 fw-bold public-ekskul-card-title mb-3">
                                    <a
                                        href="{{ route('public.eskul.detail', Crypt::encrypt($item->id)) }}"
                                        class="text-decoration-none"
                                    >
                                        {{ $item->nama_eskul }}
                                    </a>
                                </h2>

                                <div class="small text-secondary mb-2">
                                    <i class="bi bi-person-fill me-2 text-primary"></i>
                                    <span class="fw-semibold">Pembina:</span>
                                    {{ $item->guru->nama_guru ?? 'Belum ditentukan' }}
                                </div>

                                <div class="small text-secondary mb-3">
                                    <i class="bi bi-clock me-2 text-primary"></i>
                                    <span class="fw-semibold">Jadwal:</span>
                                    {{ $item->jadwal ?? 'Belum tersedia' }}
                                </div>

                                <p class="small text-secondary public-ekskul-excerpt mb-4">
                                    {{ \Illuminate\Support\Str::limit($item->deskripsi ?? 'Informasi kegiatan belum tersedia.', 140) }}
                                </p>

                                <a
                                    href="{{ route('public.eskul.detail', Crypt::encrypt($item->id)) }}"
                                    class="public-ekskul-read-more mt-auto text-decoration-none fw-semibold"
                                >
                                    Lihat Detail
                                    <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm text-center py-5">
                            <div class="card-body">
                                <i class="bi bi-journal-richtext display-4 text-primary"></i>
                                <h2 class="h5 fw-bold mt-3">
                                    Belum Ada Ekstrakurikuler
                                </h2>
                                <p class="text-secondary mb-0">
                                    Informasi ekstrakurikuler belum tersedia.
                                </p>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if (method_exists($ekstrakurikuler, 'links'))
                <div class="d-flex justify-content-center mt-5">
                    {{ $ekstrakurikuler->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection