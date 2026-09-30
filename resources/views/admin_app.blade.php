<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>SMPN 1 Padakembang | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Administrasi SMP Negeri 1 Padakembang">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    {{-- Favicon
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icon/logo-smpn1-padakembang.png') }}"> --}}
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    {{-- Themify Icons --}}
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    {{-- MetisMenu --}}
    <link rel="stylesheet" href="{{ asset('assets/css/metismenujs.min.css') }}">
    {{-- Swiper --}}
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    {{-- Template CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    {{-- Custom CSS SMPN 1 Padakembang --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/css/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/css/datatables.min.css') }}">

</head>

<body>
    <a href="#main-content" class="skip-link">
        Skip to main content
    </a>
    {{-- PRELOADER --}}
    <div id="preloader">
        <div class="loader"></div>
    </div>
    {{-- PAGE CONTAINER --}}
    <div class="page-container">
        {{-- =========================
             SIDEBAR
        ========================== --}}
        <div class="sidebar-menu left-sidebar">
            {{-- Logo --}}
            <div class="sidebar-header">
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}">
                        @if (!empty($profilSekolah->logo) && file_exists(public_path($profilSekolah->logo)))
                            <img src="{{ asset($profilSekolah->logo) }}" alt="Logo SMPN 1 Padakembang"
                                class="img-fluid mb-3" style="width: 140px;">
                        @else
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo SMPN 1 Padakembang"
                                class="img-fluid mb-3" style="width: 140px;">
                        @endif
                        <span>SMPN 1 Padakembang</span>
                    </a>
                </div>
            </div>

            {{-- Menu --}}
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            {{-- Dashboard --}}
                            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-gauge-high"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            {{-- Siswa --}}
                            <li class="{{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.siswa.index') }}">
                                    <i class="fa-solid fa-user-graduate"></i>
                                    <span>Siswa</span>
                                </a>
                            </li>

                            {{-- Guru --}}
                            <li class="{{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.guru.index') }}">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <span>Guru</span>
                                </a>
                            </li>

                            {{-- Galeri --}}
                            <li class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.galeri.index') }}">
                                    <i class="fa-solid fa-images"></i>
                                    <span>Galeri</span>
                                </a>
                            </li>

                            {{-- Berita --}}
                            <li class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.berita.index') }}">
                                    <i class="fa-solid fa-newspaper"></i>
                                    <span>Berita</span>
                                </a>
                            </li>

                            {{-- Ekstrakurikuler --}}
                            <li class="{{ request()->routeIs('admin.eskul.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.eskul.index') }}">
                                    <i class="fa-solid fa-people-group"></i>
                                    <span>Ekstrakurikuler</span>
                                </a>
                            </li>

                            {{-- Profil Sekolah --}}
                            <li class="{{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.profil.index') }}">
                                    <i class="fa-solid fa-school"></i>
                                    <span>Profil Sekolah</span>
                                </a>
                            </li>

                            <li class="{{ request()->routeIs('admin.user.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.user.index') }}">
                                    Data Pengelola
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        {{-- =========================
             MAIN CONTENT
        ========================== --}}
        <div class="main-content">
            {{-- HEADER --}}
            <div class="header-area">
                <div class="row align-items-center">
                    {{-- Menu + Search --}}
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn float-start">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box float-start">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search...">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>

                    {{-- Notification --}}
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area float-end">
                            {{-- Fullscreen --}}
                            <li id="full-view">
                                <i class="ti-fullscreen"></i>
                            </li>
                            <li id="full-view-exit">
                                <i class="ti-zoom-out"></i>
                            </li>
                            {{-- Notification --}}
                            <li class="dropdown">
                                <i class="ti-bell dropdown-toggle" data-bs-toggle="dropdown">
                                    <span>2</span>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">
                                    <span class="notify-title">
                                        Anda memiliki notifikasi baru
                                        <a href="#">Lihat semua</a>
                                    </span>
                                    <div class="notify-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <i class="ti-key bg-danger"></i>
                                            </div>
                                            <div class="notify-text">
                                                <p>Password berhasil diubah</p>
                                                <span>Baru saja</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <i class="ti-comments-smiley bg-info"></i>
                                            </div>
                                            <div class="notify-text">
                                                <p>Komentar baru</p>
                                                <span>30 detik yang lalu</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            {{-- Email --}}
                            <li class="dropdown">
                                <i class="fa-regular fa-envelope dropdown-toggle" data-bs-toggle="dropdown">
                                    <span>3</span>
                                </i>
                                <div class="dropdown-menu notify-box nt-enveloper-box">
                                    <span class="notify-title">
                                        Pesan baru
                                        <a href="#">Lihat semua</a>
                                    </span>
                                    <div class="notify-list">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="{{ asset('assets/images/author/author-img1.jpg') }}"
                                                    alt="User">
                                            </div>
                                            <div class="notify-text">
                                                <p>Admin</p>
                                                <span class="msg">
                                                    Selamat datang di sistem administrasi.
                                                </span>
                                                <span>3:15 PM</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            {{-- Settings --}}
                            <li class="settings-btn">
                                <i class="ti-settings"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- =========================
                 PAGE TITLE
            ========================== --}}
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h1 class="page-title float-start">
                                @yield('title')
                            </h1>
                            <ul class="breadcrumbs float-start">
                                <li>
                                    <a href="{{ route('admin.dashboard') }}">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    @yield('title')
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- User Profile --}}
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile float-end">
                            <img class="avatar user-thumb" src="{{ asset('assets/images/author/avatar.png') }}"
                                alt="Avatar">
                            <h4 class="user-name dropdown-toggle" data-bs-toggle="dropdown">
                                Admin
                                <i class="fa-solid fa-angle-down"></i>
                            </h4>
                            <div class="dropdown-menu user-dropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fa-solid fa-user"></i>
                                    Profil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa-solid fa-gear"></i>
                                    Pengaturan
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item user-dropdown-logout" href="#">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    Keluar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- =========================
                 CONTENT
            ========================== --}}
            <div class="main-content-inner" id="main-content">
                @yield('content')
            </div>
        </div>

        {{-- =========================
             FOOTER
        ========================== --}}
        <footer>
            <div class="footer-area">
                <p>
                    © 2026 SMP Negeri 1 Padakembang.
                    All rights reserved.
                </p>
            </div>
        </footer>
    </div>

    {{-- =========================
         OFFSET AREA
    ========================== --}}
    <div class="offset-area">
        <div class="offset-close">
            <i class="ti-close"></i>
        </div>
        <ul class="nav offset-menu-tab">
            <li>
                <a class="active" data-bs-toggle="tab" href="#activity">
                    Activity
                </a>
            </li>
            <li>
                <a data-bs-toggle="tab" href="#settings">
                    Settings
                </a>
            </li>
        </ul>
        <div class="offset-content tab-content">
            {{-- Activity --}}
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Aktivitas</h4>
                            <span class="time">
                                <i class="ti-time"></i>
                                Baru saja
                            </span>
                        </div>
                        <p>
                            Selamat datang di dashboard
                            SMP Negeri 1 Padakembang.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Settings --}}
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>Pengaturan</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifikasi</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1">
                                    <label for="switch1">
                                        Toggle
                                    </label>
                                </div>
                            </div>
                            <p>
                                Aktifkan notifikasi dashboard.
                            </p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Aktivitas</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2">
                                    <label for="switch2">
                                        Toggle
                                    </label>
                                </div>
                            </div>
                            <p>
                                Tampilkan aktivitas terbaru.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- =========================
         JAVASCRIPT
    ========================== --}}

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metismenujs.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.1/dist/chart.umd.min.js"></script>
    <script src="{{ asset('assets/js/line-chart.js') }}"></script>
    <script src="{{ asset('assets/js/pie-chart.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('assets/datatables/js/datatables.js') }}"></script>
    <script src="{{ asset('assets/datatables/js/datatables.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>
    @stack('scripts')
</body>

</html>
