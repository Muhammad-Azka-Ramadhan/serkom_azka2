@extends('layouts.public_app')

@section('nama_sekolah', $profilSekolah->nama_sekolah)

@section('title', 'Berita')

@section('content')

{{-- HEADER HALAMAN --}}
<section class="py-5 public-page-header">
    <div class="container py-4">
        <div class="text-center mx-auto" style="max-width: 750px;">
            <span class="public-section-label">INFORMASI TERKINI</span>
            <h1 class="display-5 fw-bold text-white mt-2 mb-3">Berita Sekolah</h1>
            <p class="text-white-50 mb-0">
                Informasi, kegiatan, dan kabar terbaru
                {{ $profilSekolah->nama_sekolah }}.
            </p>
        </div>
    </div>
</section>

{{-- DAFTAR BERITA --}}
<section class="py-5 bg-light">
    <div class="container py-3">
        <div class="row g-4">
            @forelse ($berita as $item)
                <div class="col-md-6 col-lg-4">
                    <article class="card border-0 shadow-sm rounded-4 h-100 public-card">
                        {{-- FOTO --}}
                        <a href="{{ route('public.berita.detail', Crypt::encrypt($item->id)) }}?from=berita" class="text-decoration-none overflow-hidden">
                            @if (!empty($item->gambar))
                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->judul ?? 'Berita sekolah' }}"
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
                            @if (!empty($item->tanggal))
                                <div class="small text-secondary mb-2">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                </div>
                            @endif
                            <a href="{{ route('public.berita.detail', Crypt::encrypt($item->id)) }}?from=berita" class="text-decoration-none">
                                <h5 class="fw-bold mb-3 public-card-title">
                                    {{ $item->judul ?? 'Tanpa judul' }}
                                </h5>
                            </a>

                            @if (!empty($item->isi))
                                <p class="text-secondary mb-0">
                                    {{ Str::limit(strip_tags($item->isi), 100, '...') }}
                                </p>
                            @endif
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
        @if ($berita->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $berita->links() }}
            </div>
        @endif
    </div>
</section>


@endsection