@extends('layouts.admin_app')

@section('title', 'Tambah Siswa')

@section('content')

<div class="container-fluid py-4">

    {{-- Error Validation --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">

            <strong>
                <i class="fa-solid fa-circle-exclamation me-1"></i>
                Terdapat kesalahan:
            </strong>

            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close">
            </button>

        </div>
    @endif

    {{-- Card --}}
    <div class="card border-0 shadow-sm">

        {{-- Header --}}
        <div class="card-header bg-white border-0 px-4 pt-4">

            <h4 class="fw-semibold mb-1">
                Tambah Siswa
            </h4>

            <p class="text-muted small mb-0">
                Tambahkan data siswa baru ke dalam sistem.
            </p>

        </div>

        {{-- Body --}}
        <div class="card-body px-4 pb-4">

            <form
                action="{{ route('admin.siswa.store') }}"
                method="POST">

                @csrf

                <div class="row g-4">

                    {{-- NISN --}}
                    <div class="col-md-6">

                        <label for="nisn" class="form-label fw-semibold">
                            NISN
                        </label>

                        <input
                            type="number"
                            name="nisn"
                            id="nisn"
                            class="form-control"
                            placeholder="Masukkan NISN">

                    </div>

                    {{-- Nama --}}
                    <div class="col-md-6">

                        <label for="nama" class="form-label fw-semibold">
                            Nama Siswa
                        </label>

                        <input
                            type="text"
                            name="nama_siswa"
                            id="nama"
                            class="form-control"
                            placeholder="Masukkan nama siswa">

                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Jenis Kelamin
                        </label>

                        <div class="d-flex align-items-center gap-4 pt-2">

                            <div class="form-check">
                                <input
                                    type="radio"
                                    id="laki-laki"
                                    name="jenis_kelamin"
                                    class="form-check-input"
                                    value="Laki-laki">

                                <label
                                    class="form-check-label"
                                    for="laki-laki">

                                    Laki-laki

                                </label>
                            </div>

                            <div class="form-check">
                                <input
                                    type="radio"
                                    id="perempuan"
                                    name="jenis_kelamin"
                                    class="form-check-input"
                                    value="Perempuan">

                                <label
                                    class="form-check-label"
                                    for="perempuan">

                                    Perempuan

                                </label>
                            </div>

                        </div>

                    </div>

                    {{-- Tahun Masuk --}}
                    <div class="col-md-6">

                        <label
                            for="tahun_masuk"
                            class="form-label fw-semibold">

                            Tahun Masuk

                        </label>

                        <input
                            type="number"
                            name="tahun_masuk"
                            id="tahun_masuk"
                            class="form-control @error('tahun_masuk') is-invalid @enderror"
                            min="2010"
                            max="{{ date('Y') }}"
                            placeholder="Contoh: {{ date('Y') }}"
                            required>

                        @error('tahun_masuk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                {{-- Button --}}
                <div class="d-flex gap-2 mt-4 pt-3 border-top">

                    <button
                        type="submit"
                        class="btn btn-simpan px-4">

                        <i class="fa-solid fa-save me-1"></i>
                        Simpan

                    </button>

                    <a
                        href="{{ route('admin.siswa.index') }}"
                        class="btn btn-outline-secondary px-4">

                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection