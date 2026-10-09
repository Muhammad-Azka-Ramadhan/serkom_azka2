@extends('layouts.public_app')
@section('title', 'Galeri')
@section('content')
{{-- HEADER --}}
<section class="py-5 public-page-header">
    <div class="container py-4">
        <div class="text-center mx-auto" style="max-width: 750px;">
            <span class="public-section-label">
                DOKUMENTASI SEKOLAH
            </span>
            <h1 class="display-5 fw-bold text-white mt-2 mb-3">
                Galeri Sekolah
            </h1>
            <p class="text-white-50 mb-0">
                Dokumentasi kegiatan, aktivitas, dan berbagai momen
                di {{ $profilSekolah->nama_sekolah }}.
            </p>
        </div>
    </div>
</section>

{{-- DAFTAR GALERI --}}
<section class="py-5 bg-light">
    <div class="container py-3">
        <div class="row g-4">
            @forelse ($galeri as $item)
                <div class="col-12 col-sm-6 col-lg-4">
                    <article class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 public-card">
                        {{-- FOTO --}}
                        @if (!empty($item->file) && Storage::disk('public')->exists($item->file))

                            <a
                                href="{{ asset('storage/' . $item->file) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="public-card-image"
                            >
                                <img
                                    src="{{ asset('storage/' . $item->file) }}"
                                    alt="{{ $item->judul ?? 'Dokumentasi sekolah' }}"
                                    class="card-img-top w-100 object-fit-cover"
                                    style="height: 240px;"
                                    loading="lazy"
                                >
                            </a>
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-body-secondary" style="height: 240px;">
                                <i class="fas fa-images fa-3x text-secondary"></i>
                            </div>
                        @endif

                        {{-- INFORMASI --}}
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2 public-card-title">
                                {{ $item->judul ?? 'Dokumentasi Sekolah' }}
                            </h5>
                            @if (!empty($item->keterangan))
                                <p class="text-secondary mb-0">
                                    {{ Str::limit(strip_tags($item->keterangan), 120, '...') }}
                                </p>
                            @endif
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm rounded-4 text-center p-5">
                        <div class="mb-4">
                            <i class="fas fa-images fa-3x text-secondary"></i>
                        </div>
                        <h4 class="fw-bold mb-2">
                            Belum Ada Galeri
                        </h4>
                        <p class="text-secondary mb-0">
                            Dokumentasi kegiatan sekolah belum tersedia.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if (method_exists($galeri, 'hasPages') && $galeri->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $galeri->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
