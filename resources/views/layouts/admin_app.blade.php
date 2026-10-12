<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>{{ $profilSekolah->nama_sekolah }} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Administrasi SMP Negeri 1 Padakembang">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables/css/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom/admin.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('storage/' . $profilSekolah->logo) }}">    
    @stack('styles')
</head>

<body>
    <div class="admin-wrapper">
        <div class="sidebar-overlay" id="sidebarOverlay"></div>
        <aside class="admin-sidebar" id="adminSidebar">
            <div class="sidebar-brand">
                <a href="{{ route('admin.dashboard') }}" class="brand-link">
                    @if (!empty($profilSekolah->logo) && Storage::disk('public')->exists($profilSekolah->logo))
                        <img src="{{ asset('storage/' . $profilSekolah->logo) }}"
                            alt="Logo {{ $profilSekolah->nama_sekolah }}"
                            class="brand-logo">
                    @else
                        <img src="{{ asset('assets/images/logo.png') }}"
                            alt="Logo {{ $profilSekolah->nama_sekolah }}"
                            class="brand-logo">
                    @endif

                    <span class="brand-text">
                        {{ $profilSekolah->nama_sekolah }}
                    </span>
                </a>
            </div>

            <nav class="sidebar-nav">
                <ul class="sidebar-menu">
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

                    @if (Auth::user()->role == 'admin')
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
                    @endif
                </ul>
            </nav>
        </aside>

        <div class="admin-main" id="adminMain">
            <header class="admin-header">
                <div class="header-left">
                    <button
                        type="button"
                        class="sidebar-toggle"
                        id="sidebarToggle"
                        aria-label="Toggle sidebar">

                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <div class="header-title">
                        <h1>
                            @yield('title')
                        </h1>
                    </div>
                </div>

                <div class="admin-profile-wrapper">
                    <input type="checkbox" id="profileToggle" class="profile-checkbox">

                    <label for="profileToggle" class="admin-profile">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </label>

                    <div class="profile-dropdown">
                        <div class="profile-dropdown-header">
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

            <main class="admin-content" id="main-content">
                @yield('content')
            </main>

            <footer class="admin-footer">
                <p>
                    &copy; 2026 {{ $profilSekolah->nama_sekolah . '.' }}
                    All rights reserved.
                </p>
            </footer>
        </div>
    </div>

    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="{{ asset('assets/datatables/js/datatables.js') }}"></script>
    <script src="{{ asset('assets/datatables/js/datatables.min.js') }}"></script>

    <script src="{{ asset('assets/js/custom/admin.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>

    @stack('scripts')
    @yield('scripts')
</body>
</html>
