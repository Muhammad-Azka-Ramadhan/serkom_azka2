<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('nama_sekolah') | @yield('title')</title>

    {{-- FONT AWESOME --}}
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="{{ asset('assets/dist/css/bootstrap.min.css') }}">

    {{-- PUBLIC CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom/public.css') }}">
</head>

<body>
    {{-- =========================================================
    HEADER
    ========================================================= --}}
    <header>
        <nav class="navbar navbar-expand-lg fixed-top bg-white public-navbar">
            <div class="container">
                {{-- BRAND --}}
                <a
                    href="{{ route('public.beranda') }}"
                    class="navbar-brand d-flex align-items-center gap-3"
                >
                    @if (!empty($profilSekolah->logo) && Storage::disk('public')->exists($profilSekolah->logo))
                        <img
                            src="{{ asset('storage/' . $profilSekolah->logo) }}"
                            alt="Logo {{ $profilSekolah->nama_sekolah }}"
                            class="public-logo"
                        >
                    @else
                        <img
                            src="{{ asset('assets/images/logo.png') }}"
                            alt="Logo {{ $profilSekolah->nama_sekolah }}"
                            class="public-logo"
                        >
                    @endif

                    <div class="brand-text">
                        <div class="brand-title">
                            {{ $profilSekolah->nama_sekolah }}
                        </div>

                        <div class="brand-subtitle">
                            Sekolah Menengah Pertama Negeri
                        </div>
                    </div>
                </a>

                {{-- MOBILE TOGGLER --}}
                <button
                    class="navbar-toggler border-0 shadow-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#publicNavbar"
                    aria-controls="publicNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- NAVIGATION --}}
                <div
                    class="collapse navbar-collapse"
                    id="publicNavbar"
                >
                    @php
                        $menu = [
                            'public.beranda' => 'Beranda',
                            'public.profil' => 'Profil Sekolah',
                            'public.eskul' => 'Ekstrakurikuler',
                            'public.guru' => 'Guru',
                            'public.berita' => 'Berita',
                            'public.galeri' => 'Galeri',
                        ];

                    @endphp

                    <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                        @foreach ($menu as $route => $label)
                            <li class="nav-item">
                                <a
                                    href="{{ route($route) }}"
                                    class="nav-link {{ request()->routeIs($route) ? 'active' : '' }}"
                                >
                                    {{ $label }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    {{-- =========================================================
    CONTENT
    ========================================================= --}}

    <main class="public-main">
        @yield('content')
    </main>

    <footer class="py-5 public-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-5">
                    <h5 class="text-white fw-bold mb-3">{{ $profilSekolah->nama_sekolah }}</h5>
                    <p class="text-white-50 small mb-0">
                        Website resmi {{ $profilSekolah->nama_sekolah }}
                        sebagai media informasi sekolah.
                    </p>
                </div>
                <div class="col-md-4 col-lg-3">
                    <h6 class="text-white fw-bold mb-3">Navigasi</h6>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <a href="{{ route('public.beranda') }}" class="text-white-50 text-decoration-none footer-link">Beranda</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('public.profil') }}" class="text-white-50 text-decoration-none footer-link">Profil Sekolah</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('public.eskul') }}" class="text-white-50 text-decoration-none footer-link">Ekstrakurikuler</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('public.guru') }}" class="text-white-50 text-decoration-none footer-link">Guru</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ route('public.berita') }}" class="text-white-50 text-decoration-none footer-link">Berita</a>
                        </li>
                        <li>
                            <a href="{{ route('public.galeri') }}" class="text-white-50 text-decoration-none footer-link">Galeri</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 col-lg-4">
                    <h6 class="text-white fw-bold mb-3">Kontak</h6>
                    <p class="text-white-50 small mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        {{ $profilSekolah->alamat ?? '-' }}
                    </p>
                    <p class="text-white-50 small mb-0">
                        <i class="fas fa-phone me-2"></i>
                        {{ $profilSekolah->kontak ?? '-' }}
                    </p>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <div class="text-center">
                <small class="text-white-50">
                    &copy; {{ date('Y') }}
                    {{ $profilSekolah->nama_sekolah }}
                    All rights reserved.
                </small>
            </div>
        </div>
    </footer>

    {{-- PUBLIC JS --}}
    <script src="{{ asset('assets/js/public.js') }}"></script>

    {{-- BOOTSTRAP JS --}}
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')
</body>
</html>