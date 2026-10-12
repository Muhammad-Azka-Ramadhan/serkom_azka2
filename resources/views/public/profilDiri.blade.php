@extends('layouts.public_app')

@section('title', 'Profil Pribadi')

@section('nama_sekolah', $profilSekolah->nama_sekolah)

@section('content')
<section id="tentang" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-primary fw-semibold">
                <i class="fa-solid fa-user me-2"></i>
                INFORMASI PRIBADI
            </span>

            <h2 class="fw-bold mt-2">Data Diri</h2>

            <p class="text-muted">
                Informasi lengkap mengenai diri saya
            </p>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-lg-4 col-md-5">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <img src="{{ asset('assets/images/Muhammad Azka Ramadhan (1).JPG') }}"
                             alt="Foto Profil"
                             class="img-fluid rounded-3 shadow-sm mb-4"
                             style="width: 100%; max-width: 280px; height: 320px; object-fit: contain;">

                        <h4 class="fw-bold mb-2">
                            Muhammad Azka Ramadhan
                        </h4>

                        <p class="text-muted mb-3">
                            <i class="fa-solid fa-graduation-cap me-2"></i>
                            Siswa SMK YPC Tasikmalaya
                        </p>

                        <span class="badge bg-primary px-3 py-2">
                            Rekayasa Perangkat Lunak
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 p-lg-5">
                        <h5 class="fw-bold mb-4">
                            <i class="fa-solid fa-address-card text-primary me-2"></i>
                            Informasi Pribadi
                        </h5>

                        <div class="d-flex align-items-start py-3 border-bottom">
                            <div class="text-primary me-3" style="width: 25px;">
                                <i class="fa-solid fa-user"></i>
                            </div>

                            <div class="flex-grow-1">
                                <small class="text-muted d-block mb-1">
                                    Nama Lengkap
                                </small>

                                <span class="fw-semibold">
                                    Muhammad Azka Ramadhan
                                </span>
                            </div>
                        </div>

                        <div class="d-flex align-items-start py-3 border-bottom">
                            <div class="text-primary me-3" style="width: 25px;">
                                <i class="fa-solid fa-calendar-days"></i>
                            </div>

                            <div class="flex-grow-1">
                                <small class="text-muted d-block mb-1">
                                    Tempat, Tanggal Lahir
                                </small>

                                <span class="fw-semibold">
                                    Tasikmalaya, 06 September 2008
                                </span>
                            </div>
                        </div>

                        <div class="d-flex align-items-start py-3 border-bottom">
                            <div class="text-primary me-3" style="width: 25px;">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>

                            <div class="flex-grow-1">
                                <small class="text-muted d-block mb-1">
                                    Alamat
                                </small>

                                <span class="fw-semibold">
                                    Kp. Bojongsari, RT/RW 05/01, Desa Ciawang, Kecamatan Leuwisari, Kabupaten Tasikmalaya, Jawa Barat 46464
                                </span>
                            </div>
                        </div>

                        <div class="d-flex align-items-start py-3 border-bottom">
                            <div class="text-primary me-3" style="width: 25px;">
                                <i class="fa-solid fa-phone"></i>
                            </div>

                            <div class="flex-grow-1">
                                <small class="text-muted d-block mb-1">
                                    Kontak
                                </small>

                                <span class="fw-semibold">
                                    081320308503
                                </span>
                            </div>
                        </div>

                        <div class="d-flex align-items-start py-3">
                            <div class="text-primary me-3" style="width: 25px;">
                                <i class="fa-solid fa-envelope"></i>
                            </div>

                            <div class="flex-grow-1">
                                <small class="text-muted d-block mb-1">
                                    Email
                                </small>

                                <span class="fw-semibold text-break">
                                    azka52752@gmail.com
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
