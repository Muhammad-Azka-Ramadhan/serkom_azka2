<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 1 Padakembang @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <nav
        class="navbar navbar-expand-lg bg-body-tertiary rounded"
        aria-label="Thirteenth navbar example"
    >
        <div class="container-fluid">
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarsExample11"
            aria-controls="navbarsExample11"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div
            class="collapse navbar-collapse d-lg-flex"
            id="navbarsExample11"
        >
            <a class="navbar-brand col-lg-3 me-0" href="#">Centered nav</a>
            <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                @php
                    $menu = [
                        'public.dashboard' => 'Beranda',
                        'public.profil' => 'Profil Sekolah',
                        'public.ekstrakurikuler' => 'Ekstrakurikuler',
                        'public.guru' => 'Guru',
                        'public.siswa' => 'Siswa',
                        'public.berita' => 'Berita',
                        'public.galeri' => 'Galeri',
                    ]
                @endphp

                @foreach ($menu as $route => $label)
                <li class="nav-item {{ request()->routeIs($route) ? 'active' : '' }}">
                    <a class="nav-link" aria-current="page" href="{{ route($route) }}">{{$label}}</a>
                </li>
                @endforeach
            </ul>
            <div class="d-lg-flex col-lg-3 justify-content-lg-end">
            <button class="btn btn-primary">Button</button>
            </div>
        </div>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
