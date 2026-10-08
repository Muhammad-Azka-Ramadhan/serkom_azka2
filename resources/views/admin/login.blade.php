<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Login - Admin SMPN 1 Padakembang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Halaman login admin SMPN 1 Padakembang">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    {{-- CSS TEMPLATE --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    {{-- CSS LOGIN --}}
    <link rel="stylesheet" href="{{ asset('assets/css/custom/login.css') }}">
</head>

<body>
    <div class="login-wrapper">
        <div class="login-card">
            {{-- HEADER --}}
            <div class="login-header">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo SMPN 1 Padakembang" class="login-logo">
                <h4>Admin SMPN 1 Padakembang</h4>
                <p>Sistem Informasi Administrasi Sekolah</p>
            </div>
            {{-- BODY --}}
            <div class="login-body">
                <h5 class="login-title">
                    Masuk ke Dashboard
                </h5>
                <p class="login-subtitle">
                    Silakan masuk menggunakan akun administrator.
                </p>
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <i class="fa-solid fa-circle-exclamation me-2"></i>
                        {{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <form action="{{ route('login_proses') }}" method="POST">
                    @csrf
                    {{-- EMAIL --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Email
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-regular fa-envelope"></i>
                            </span>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                                placeholder="Masukkan email" autocomplete="email" required>
                        </div>
                        @error('email')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- PASSWORD --}}
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Masukkan password" autocomplete="current-password" required>
                        </div>
                        @error('password')
                            <div class="text-danger small mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-login">
                        <i class="fa-solid fa-right-to-bracket me-2"></i>
                        Masuk
                    </button>
                </form>
                <div class="login-footer">
                    <p>
                        &copy; {{ date('Y') }}
                        <span>SMPN 1 Padakembang</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- JS TEMPLATE --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metismenujs.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>