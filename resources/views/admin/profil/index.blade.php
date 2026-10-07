@extends('layouts.admin_app')

@section('title', 'Profil Sekolah')

@section('content')
<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>
            <div class="text-primary small fw-semibold mb-1">
                <i class="fa-solid fa-school me-1"></i>
                ADMINISTRASI SEKOLAH
            </div>

            <h3 class="fw-bold text-dark mb-1">
                Profil Sekolah
            </h3>

            <p class="text-muted mb-0">
                Informasi lengkap mengenai SMPN 1 Padakembang
            </p>
        </div>

        @if (Auth::user()->role === 'admin')
        <a
            href="{{ route('admin.profil.edit', Crypt::encrypt($profilSekolah->id)) }}"
            class="btn btn-add px-3">

            <i class="fa-solid fa-pen-to-square me-1"></i>
            Edit Profil

        </a>
        @endif

    </div>


    {{-- IDENTITAS SEKOLAH --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body p-0">

            <div class="row g-0">

                {{-- LOGO --}}
                <div class="col-lg-4">

                    <div class="h-100 d-flex flex-column justify-content-center align-items-center text-center bg-light p-4">

                        @if (!empty($profilSekolah->logo) && Storage::disk('public')->exists($profilSekolah->logo))

                            <img
                                src="{{ asset('storage/' . $profilSekolah->logo) }}"
                                alt="Logo {{ $profilSekolah->nama_sekolah }}"
                                class="img-fluid mb-3"
                                style="width: 130px; height: 130px; object-fit: contain;">

                        @else

                            <img
                                src="{{ asset('assets/images/logo_smp.png') }}"
                                alt="Logo SMPN 1 Padakembang"
                                class="img-fluid mb-3"
                                style="width: 130px; height: 130px; object-fit: contain;">

                        @endif

                        <h4 class="fw-bold mb-1">
                            {{ $profilSekolah->nama_sekolah ?? 'SMPN 1 Padakembang' }}
                        </h4>

                        <p class="text-muted mb-0">
                            Sekolah Menengah Pertama Negeri
                        </p>

                    </div>

                </div>


                {{-- INFORMASI SEKOLAH --}}
                <div class="col-lg-8">

                    <div class="p-4">

                        <div class="d-flex align-items-center gap-2 mb-4">

                            <div class="text-primary">
                                <i class="fa-solid fa-circle-info"></i>
                            </div>

                            <h5 class="fw-bold mb-0">
                                Informasi Sekolah
                            </h5>

                        </div>


                        <div class="row g-3">

                            {{-- Nama Sekolah --}}
                            <div class="col-md-6">

                                <div class="border rounded-3 p-3 h-100">

                                    <small class="text-muted d-block mb-1">
                                        Nama Sekolah
                                    </small>

                                    <span class="fw-semibold">
                                        {{ $profilSekolah->nama_sekolah ?? '-' }}
                                    </span>

                                </div>

                            </div>


                            {{-- Kepala Sekolah --}}
                            <div class="col-md-6">

                                <div class="border rounded-3 p-3 h-100">

                                    <small class="text-muted d-block mb-1">
                                        Kepala Sekolah
                                    </small>

                                    <span class="fw-semibold">
                                        {{ $profilSekolah->kepala_sekolah ?? '-' }}
                                    </span>

                                </div>

                            </div>


                            {{-- NPSN --}}
                            <div class="col-md-6">

                                <div class="border rounded-3 p-3 h-100">

                                    <small class="text-muted d-block mb-1">
                                        NPSN
                                    </small>

                                    <span class="fw-semibold">
                                        {{ $profilSekolah->npsn ?? '-' }}
                                    </span>

                                </div>

                            </div>


                            {{-- Tahun Berdiri --}}
                            <div class="col-md-6">

                                <div class="border rounded-3 p-3 h-100">

                                    <small class="text-muted d-block mb-1">
                                        Tahun Berdiri
                                    </small>

                                    <span class="fw-semibold">
                                        {{ $profilSekolah->tahun_berdiri ?? '-' }}
                                    </span>

                                </div>

                            </div>


                            {{-- Kontak --}}
                            <div class="col-md-6">

                                <div class="border rounded-3 p-3 h-100">

                                    <small class="text-muted d-block mb-1">
                                        Kontak
                                    </small>

                                    <span class="fw-semibold">
                                        {{ $profilSekolah->kontak ?? '-' }}
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ALAMAT --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white border-bottom p-4">

            <div class="d-flex align-items-center gap-3">

                <div class="text-primary fs-5">
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <div>

                    <h5 class="fw-bold mb-1">
                        Alamat Sekolah
                    </h5>

                    <small class="text-muted">
                        Lokasi dan alamat sekolah
                    </small>

                </div>

            </div>

        </div>


        <div class="card-body p-4">

            <div class="d-flex align-items-start gap-3">

                <i class="fa-solid fa-map-location-dot text-primary mt-1"></i>

                <p class="mb-0 text-secondary">
                    {{ $profilSekolah->alamat ?? 'Alamat sekolah belum tersedia.' }}
                </p>

            </div>

        </div>

    </div>


    {{-- FOTO SEKOLAH --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white border-bottom p-4">

            <div class="d-flex align-items-center gap-3">

                <div class="text-primary fs-5">
                    <i class="fa-solid fa-image"></i>
                </div>

                <div>

                    <h5 class="fw-bold mb-1">
                        Foto Sekolah
                    </h5>

                    <small class="text-muted">
                        Dokumentasi SMPN 1 Padakembang
                    </small>

                </div>

            </div>

        </div>


        <div class="card-body p-3 p-md-4">

            @if (!empty($profilSekolah->foto) && Storage::disk('public')->exists($profilSekolah->foto))

                <img
                    src="{{ asset('storage/' . $profilSekolah->foto) }}"
                    alt="Foto {{ $profilSekolah->nama_sekolah }}"
                    class="img-fluid rounded-3 w-100 profile-school-image">

            @else

                <img
                    src="{{ asset('assets/images/foto_smp.jpg') }}"
                    alt="Foto SMPN 1 Padakembang"
                    class="img-fluid rounded-3 w-100 profile-school-image">

            @endif

        </div>

    </div>


    {{-- VISI & MISI --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white border-bottom p-4">

            <div class="d-flex align-items-center gap-3">

                <div class="text-primary fs-5">
                    <i class="fa-solid fa-bullseye"></i>
                </div>

                <div>

                    <h5 class="fw-bold mb-1">
                        Visi & Misi
                    </h5>

                    <small class="text-muted">
                        Visi dan misi sekolah
                    </small>

                </div>

            </div>

        </div>


        <div class="card-body p-4">

            <div class="row g-4">

                {{-- VISI --}}
                <div class="col-lg-6">

                    <div class="bg-light border rounded-3 p-4 h-100">

                        <h6 class="fw-bold mb-3">

                            <i class="fa-solid fa-eye text-primary me-2"></i>
                            Visi

                        </h6>

                        <p class="text-secondary mb-0">
                            {{ $profilSekolah->visi ?? 'Visi sekolah belum tersedia.' }}
                        </p>

                    </div>

                </div>


                {{-- MISI --}}
                <div class="col-lg-6">

                    <div class="bg-light border rounded-3 p-4 h-100">

                        <h6 class="fw-bold mb-3">

                            <i class="fa-solid fa-list-check text-primary me-2"></i>
                            Misi

                        </h6>

                        <p class="text-secondary mb-0">
                            {!! nl2br(e($profilSekolah->misi ?? 'Misi sekolah belum tersedia.')) !!}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- DESKRIPSI --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white border-bottom p-4">

            <div class="d-flex align-items-center gap-3">

                <div class="text-primary fs-5">
                    <i class="fa-solid fa-building-columns"></i>
                </div>

                <div>

                    <h5 class="fw-bold mb-1">
                        Deskripsi Sekolah
                    </h5>

                    <small class="text-muted">
                        Informasi singkat mengenai sekolah
                    </small>

                </div>

            </div>

        </div>


        <div class="card-body p-4">

            <p class="text-secondary mb-0 lh-lg">
                {{ $profilSekolah->deskripsi ?? 'Deskripsi sekolah belum tersedia.' }}
            </p>

        </div>

    </div>

</div>
@endsection