@extends('layouts.admin_app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
    {{-- HEADER --}}
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Dashboard</h3>
        <p class="text-muted mb-0">Ringkasan data administrasi {{ $profilSekolah->nama_sekolah }}</p>
    </div>

    {{-- STATISTIK --}}
    <div class="row g-4 mb-4">
        {{-- SISWA --}}
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-2">Total Siswa</p>
                            <h3 class="fw-bold mb-0">{{ $totalSiswa }}</h3>
                        </div>
                        <div class="dashboard-icon dashboard-icon-blue">
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- GURU --}}
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-2">Total Guru</p>
                            <h3 class="fw-bold mb-0">{{ $totalGuru }}</h3>
                        </div>
                        <div class="dashboard-icon dashboard-icon-green">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- EKSTRAKURIKULER --}}
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-2">Ekstrakurikuler</p>
                            <h3 class="fw-bold mb-0">{{ $totalEskul }}</h3>
                        </div>
                        <div class="dashboard-icon dashboard-icon-yellow">
                            <i class="fa-solid fa-people-group"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- PENGELOLA --}}
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-2">Pengelola</p>
                            <h3 class="fw-bold mb-0">{{ $totalPengelola }}</h3>
                        </div>
                        <div class="dashboard-icon dashboard-icon-red">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- BARIS BERITA + GALERI --}}
    <div class="row g-4 mb-4">
        {{-- BERITA TERBARU --}}
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold mb-1">Berita Terbaru</h5>
                            <small class="text-muted">Lima berita terakhir</small>
                        </div>
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    @forelse ($beritaTerbaru as $item)
                        <div class="dashboard-list-item px-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                @if ($item->gambar)
                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        class="dashboard-news-image">
                                @else
                                    <div class="dashboard-news-image dashboard-placeholder">
                                        <i class="fa-solid fa-newspaper"></i>
                                    </div>
                                @endif

                                <div class="flex-grow-1">
                                    <h6 class="fw-semibold mb-1">{{ $item->judul }}</h6>
                                    <small class="text-muted">{{ $item->tanggal }}</small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted py-5">Belum ada berita.</div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- GALERI TERBARU --}}
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold mb-1">Galeri Terbaru</h5>
                            <small class="text-muted">Dokumentasi terbaru</small>
                        </div>
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row g-3">
                        @forelse ($galeriTerbaru as $item)
                            <div class="col-6">
                                <div class="dashboard-gallery-item">
                                    <img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->judul }}">
                                    <div class="dashboard-gallery-title">{{ $item->judul }}</div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="text-center text-muted py-5">Belum ada galeri.</div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- DATA TERBARU --}}
    <div class="row g-4">
        {{-- SISWA --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Siswa Terbaru</h5>
                        <a href="{{ route('admin.siswa.index') }}" class="text-primary small text-decoration-none">Lihat</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    @forelse ($siswaTerbaru as $item)
                        <div class="px-4 py-3 border-top">
                            <div class="d-flex align-items-center gap-3">
                                <div class="dashboard-small-icon">
                                    <i class="fa-solid fa-user-graduate"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $item->nama_siswa }}</div>
                                    <small class="text-muted">NISN: {{ $item->nisn }}</small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted py-4">Belum ada data siswa.</div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- GURU --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Guru Terbaru</h5>
                        <a href="{{ route('admin.guru.index') }}" class="text-primary small text-decoration-none">Lihat</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    @forelse ($guruTerbaru as $item)
                        <div class="px-4 py-3 border-top">
                            <div class="d-flex align-items-center gap-3">
                                @if ($item->foto)
                                    <img
                                        src="{{ asset('storage/' . $item->foto) }}"
                                        alt="{{ $item->nama_guru }}"
                                        class="dashboard-avatar">
                                @else
                                    <div class="dashboard-avatar dashboard-placeholder">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                @endif
                                <div>
                                    <div class="fw-semibold">{{ $item->nama_guru }}</div>
                                    <small class="text-muted">{{ $item->mapel }}</small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted py-4">Belum ada data guru.</div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- EKSTRAKURIKULER --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Ekstrakurikuler</h5>
                        <a href="{{ route('admin.eskul.index') }}" class="text-primary small text-decoration-none">Lihat</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    @forelse ($eskulTerbaru as $item)
                        <div class="px-4 py-3 border-top">
                            <div class="d-flex align-items-center gap-3">
                                <div class="dashboard-small-icon">
                                    <i class="fa-solid fa-people-group"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold">{{ $item->nama_eskul }}</div>
                                    <small class="text-muted">{{ $item->jadwal_latihan }}</small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted py-4">Belum ada ekstrakurikuler.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection