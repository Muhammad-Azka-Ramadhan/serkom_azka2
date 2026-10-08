<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('school_name') | @yield('title')</title>

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
                            'public.ekstrakurikuler' => 'Ekstrakurikuler',
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

    {{-- PUBLIC JS --}}
    <script src="{{ asset('assets/js/public.js') }}"></script>

    {{-- BOOTSTRAP JS --}}
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')
</body>
</html>