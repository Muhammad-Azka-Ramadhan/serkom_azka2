@extends('layouts.public_app')

@section('school_name', $profilSekolah->nama_sekolah)

@section('title', 'Berita')

@section('content')

{{-- =========================================================
    HEADER HALAMAN
    ========================================================= --}}

<section class="public-page-header">

    <div class="container">

        <div class="public-page-header-content">

            <span class="public-section-label">
                INFORMASI TERKINI
            </span>

            <h1>
                Berita Sekolah
            </h1>

            <p>
                Informasi, kegiatan, dan kabar terbaru
                {{ $profilSekolah->nama_sekolah }}.
            </p>

        </div>

    </div>

</section>


{{-- =========================================================
    DAFTAR BERITA
    ========================================================= --}}

<section class="py-5 public-section-light">

    <div class="container py-4">

        <div class="row g-4">

            @forelse ($berita as $item)

                <div class="col-md-6 col-lg-4">

                    <article class="card border-0 shadow-sm h-100 public-news-page-card">

                        {{-- FOTO BERITA --}}
                        <div class="public-news-page-image">
                            <a href="{{ route('public.berita.detail', Crypt::encrypt($item->id)) }}">
                                 @if (!empty($item->gambar))
                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->judul ?? 'Berita sekolah' }}"
                                    >
                                @else
                                    <div class="public-news-page-placeholder">
                                        <i class="bi bi-newspaper"></i>
                                    </div>
                                @endif
                            </a>
                        </div>


                        {{-- ISI CARD --}}
                        <div class="card-body p-4">

                            {{-- TANGGAL --}}
                            @if (!empty($item->tanggal))

                                <div class="public-news-page-date">

                                    <i class="bi bi-calendar3 me-1"></i>

                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

                                </div>

                            @endif


                            {{-- JUDUL --}}
                            <a href="{{ route('public.berita.detail', Crypt::encrypt($item->id)) }}" class="text-decoration-none">
                                <h4 class="public-news-page-title">
                                    {{ $item->judul ?? 'Tanpa judul' }}
                                </h4>
                            </a>

                            {{-- DESKRIPSI --}}
                            @if (!empty($item->isi))

                                <p class="public-news-page-excerpt">

                                    {{ Str::limit(strip_tags($item->isi), 100, '....') }}

                                </p>

                            @endif

                        </div>

                    </article>

                </div>

            @empty

                <div class="col-12">

                    <div class="public-news-empty">

                        <div class="public-news-empty-icon">

                            <i class="bi bi-newspaper"></i>

                        </div>

                        <h4>
                            Belum Ada Berita
                        </h4>

                        <p>
                            Belum ada berita atau informasi yang
                            dipublikasikan oleh sekolah.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- =====================================================
            PAGINATION
            ===================================================== --}}

        @if ($berita->hasPages())

            <div class="public-news-pagination">

                {{ $berita->links() }}

            </div>

        @endif

    </div>

</section>


{{-- =========================================================
    CTA
    ========================================================= --}}

<section class="public-cta py-5">

    <div class="container py-4">

        <div class="row align-items-center g-4">

            <div class="col-lg-8">

                <span class="public-cta-label">
                    INFORMASI SEKOLAH
                </span>

                <h2 class="fw-bold text-white mb-2">

                    {{ $profilSekolah->nama_sekolah }}

                </h2>

                <p class="text-white-50 mb-0">

                    Temukan berbagai informasi mengenai
                    sekolah, guru, siswa, kegiatan, dan
                    dokumentasi sekolah.

                </p>

            </div>


            <div class="col-lg-4 text-lg-end">

                <a
                    href="{{ route('public.profil') }}"
                    class="btn btn-light px-4"
                >
                    Lihat Profil Sekolah
                </a>

            </div>

        </div>

    </div>

</section>

@endsection