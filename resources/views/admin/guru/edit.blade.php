@extends('layouts.admin_app')

@section('title', 'Edit Guru')

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
                Edit Guru
            </h4>

            <p class="text-muted small mb-0">
                Perbarui data guru sekolah
            </p>

        </div>


        {{-- Body --}}
        <div class="card-body px-4 pb-4">

            <form
                action="{{ route('admin.guru.update', Crypt::encrypt($guru->id)) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- Nama --}}
                    <div class="col-md-6">

                        <label
                            for="nama_guru"
                            class="form-label fw-semibold">

                            Nama Guru

                        </label>

                        <input
                            type="text"
                            name="nama_guru"
                            id="nama_guru"
                            class="form-control"
                            value="{{ old('nama_guru', $guru->nama_guru) }}"
                            placeholder="Masukkan nama guru">

                    </div>


                    {{-- NIP --}}
                    <div class="col-md-6">

                        <label
                            for="nip"
                            class="form-label fw-semibold">

                            NIP

                        </label>

                        <input
                            type="number"
                            name="nip"
                            id="nip"
                            class="form-control"
                            value="{{ old('nip', $guru->nip) }}"
                            placeholder="Masukkan NIP">

                    </div>


                    {{-- Mapel --}}
                    <div class="col-md-6">

                        <label
                            for="mapel"
                            class="form-label fw-semibold">

                            Mata Pelajaran

                        </label>

                        <input
                            type="text"
                            name="mapel"
                            id="mapel"
                            class="form-control"
                            value="{{ old('mapel', $guru->mapel) }}"
                            placeholder="Masukkan mata pelajaran">

                    </div>


                    {{-- Foto --}}
                    <div class="col-md-6">

                        <label
                            for="foto"
                            class="form-label fw-semibold">

                            Foto Guru

                        </label>

                        @if ($guru->foto)

                            <div class="mb-3">

                                <img
                                    src="{{ asset('storage/' . $guru->foto) }}"
                                    alt="Foto {{ $guru->nama_guru }}"
                                    class="rounded"
                                    style="width: 100px; height: 100px; object-fit: cover;">

                            </div>

                        @endif

                        <input
                            type="file"
                            name="foto"
                            id="foto"
                            class="form-control">

                        <div class="form-text">
                            Pilih foto baru jika ingin mengganti foto guru.
                        </div>

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
                        href="{{ route('admin.guru.index') }}"
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