<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">

    <title>SMPN 1 Padakembang | @yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
        content="Sistem Administrasi SMP Negeri 1 Padakembang">

    <link rel="stylesheet" href="{{ asset('assets/dist/css/bootstrap.min.css') }}">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="{{ asset('assets/css/fontawesome.min.css') }}">

    {{-- DataTables --}}
    <link rel="stylesheet"
        href="{{ asset('assets/datatables/css/datatables.css') }}">

    {{-- CUSTOM CSS --}}
    <link rel="stylesheet"
        href="{{ asset('assets/css/admin.css') }}">

    @stack('styles')
</head>

<body>

    {{-- ==========================================
         PAGE WRAPPER
    =========================================== --}}
    <div class="admin-wrapper">


        {{-- ==========================================
             MOBILE OVERLAY
        =========================================== --}}
        <div class="sidebar-overlay" id="sidebarOverlay"></div>


        {{-- ==========================================
             SIDEBAR
        =========================================== --}}
        <aside class="admin-sidebar" id="adminSidebar">

            {{-- LOGO --}}
            <div class="sidebar-brand">

                <a href="{{ route('admin.dashboard') }}"
                    class="brand-link">

                    @if (
                        !empty($profilSekolah->logo) &&
                        Storage::disk('public')->exists($profilSekolah->logo)
                    )

                        <img src="{{ asset('storage/' . $profilSekolah->logo) }}"
                            alt="Logo SMPN 1 Padakembang"
                            class="brand-logo">

                    @else

                        <img src="{{ asset('assets/images/logo.png') }}"
                            alt="Logo SMPN 1 Padakembang"
                            class="brand-logo">

                    @endif

                    <span class="brand-text">
                        SMPN 1 Padakembang
                    </span>

                </a>

            </div>


            {{-- SIDEBAR MENU --}}
            <nav class="sidebar-nav">

                <ul class="sidebar-menu">


                    {{-- Dashboard --}}
                    <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                        <a href="{{ route('admin.dashboard') }}">

                            <span class="menu-icon">
                                <i class="fa-solid fa-gauge-high"></i>
                            </span>

                            <span class="menu-text">
                                Dashboard
                            </span>

                        </a>

                    </li>


                    {{-- Siswa --}}
                    <li class="{{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.siswa.index') }}">

                            <span class="menu-icon">
                                <i class="fa-solid fa-user-graduate"></i>
                            </span>

                            <span class="menu-text">
                                Siswa
                            </span>

                        </a>

                    </li>


                    {{-- Guru --}}
                    <li class="{{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.guru.index') }}">

                            <span class="menu-icon">
                                <i class="fa-solid fa-chalkboard-user"></i>
                            </span>

                            <span class="menu-text">
                                Guru
                            </span>

                        </a>

                    </li>


                    {{-- Galeri --}}
                    <li class="{{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.galeri.index') }}">

                            <span class="menu-icon">
                                <i class="fa-solid fa-images"></i>
                            </span>

                            <span class="menu-text">
                                Galeri
                            </span>

                        </a>

                    </li>


                    {{-- Berita --}}
                    <li class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.berita.index') }}">

                            <span class="menu-icon">
                                <i class="fa-solid fa-newspaper"></i>
                            </span>

                            <span class="menu-text">
                                Berita
                            </span>

                        </a>

                    </li>


                    {{-- Ekstrakurikuler --}}
                    <li class="{{ request()->routeIs('admin.eskul.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.eskul.index') }}">

                            <span class="menu-icon">
                                <i class="fa-solid fa-people-group"></i>
                            </span>

                            <span class="menu-text">
                                Ekstrakurikuler
                            </span>

                        </a>

                    </li>


                    {{-- Profil Sekolah --}}
                    <li class="{{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.profil.index') }}">

                            <span class="menu-icon">
                                <i class="fa-solid fa-school"></i>
                            </span>

                            <span class="menu-text">
                                Profil Sekolah
                            </span>

                        </a>

                    </li>


                    {{-- Data Pengelola --}}
                    <li class="{{ request()->routeIs('admin.user.*') ? 'active' : '' }}">

                        <a href="{{ route('admin.user.index') }}">

                            <span class="menu-icon">
                                <i class="fa-solid fa-users"></i>
                            </span>

                            <span class="menu-text">
                                Data Pengelola
                            </span>

                        </a>

                    </li>

                </ul>

            </nav>

        </aside>



        {{-- ==========================================
             MAIN AREA
        =========================================== --}}
        <div class="admin-main" id="adminMain">


            {{-- ==========================================
                 HEADER
            =========================================== --}}
            <header class="admin-header">

                <div class="header-left">

                    {{-- Sidebar Toggle --}}
                    <button
                        type="button"
                        class="sidebar-toggle"
                        id="sidebarToggle"
                        aria-label="Toggle sidebar">

                        <i class="fa-solid fa-bars"></i>

                    </button>


                    {{-- Page Title --}}
                    <div class="header-title">

                        <h1>
                            @yield('title')
                        </h1>


                        {{-- Breadcrumb --}}
                        <div class="breadcrumb">

                            <a href="{{ route('admin.dashboard') }}">
                                Home
                            </a>

                            <span>/</span>

                            <span>
                                @yield('title')
                            </span>

                        </div>

                    </div>

                </div>



                {{-- ==========================================
                     ADMIN PROFILE
                =========================================== --}}
                <div class="admin-profile-wrapper">

                    <input type="checkbox" id="profileToggle" class="profile-checkbox">

                    <label for="profileToggle" class="admin-profile">
                        <img src="{{ asset('assets/images/author/avatar.png') }}"
                            alt="{{ Auth::user()->name }}">

                        <span>{{ Auth::user()->name }}</span>

                        <i class="fa-solid fa-chevron-down"></i>
                    </label>

                    <div class="profile-dropdown">

                        <div class="profile-dropdown-header">
                            <img src="{{ asset('assets/images/author/avatar.png') }}"
                                alt="{{ Auth::user()->name }}">

                            <div>
                                <strong>{{ Auth::user()->name }}</strong>
                                <small>{{ ucfirst(Auth::user()->role) }}</small>
                            </div>
                        </div>

                        <div class="profile-dropdown-divider"></div>

                        <a href="{{ route('logout') }}" class="logout-link">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Keluar</span>
                        </a>

                    </div>

                </div>

            </header>



            {{-- ==========================================
                 CONTENT
            =========================================== --}}
            <main class="admin-content"
                id="main-content">

                @yield('content')

            </main>



            {{-- ==========================================
                 FOOTER
            =========================================== --}}
            <footer class="admin-footer">

                <p>
                    © 2026 SMP Negeri 1 Padakembang.
                    All rights reserved.
                </p>

            </footer>

        </div>

    </div>

    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>

    {{-- ==========================================
         JQUERY
    =========================================== --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


    {{-- ==========================================
         DATATABLES
    =========================================== --}}
    <script src="{{ asset('assets/datatables/js/datatables.js') }}"></script>

    <script src="{{ asset('assets/datatables/js/datatables.min.js') }}"></script>


    {{-- ==========================================
         CUSTOM JS
    =========================================== --}}
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>

    @stack('scripts')
    @yield('scripts')
</body>
</html>