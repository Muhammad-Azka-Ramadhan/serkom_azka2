@extends('layouts.admin_app')

@section('title', 'Edit Galeri')

@section('content')

<div class="container-fluid py-4">

    {{-- Success --}}
    @session('success')
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">

            <i class="fa-solid fa-circle-check me-1"></i>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close">
            </button>

        </div>
    @endsession


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
                Edit Galeri
            </h4>

            <p class="text-muted small mb-0">
                Perbarui data galeri sekolah
            </p>

        </div>


        {{-- Body --}}
        <div class="card-body px-4 pb-4">

            <form
                action="{{ route('admin.galeri.update', Crypt::encrypt($galeri->id)) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- Judul --}}
                    <div class="col-12">

                        <label
                            for="judul"
                            class="form-label fw-semibold">

                            Judul

                        </label>

                        <input
                            type="text"
                            name="judul"
                            id="judul"
                            class="form-control"
                            value="{{ old('judul', $galeri->judul) }}"
                            placeholder="Masukkan judul galeri">

                    </div>


                    {{-- Kategori --}}
                    <div class="col-md-6">

                        <label
                            for="kategori"
                            class="form-label fw-semibold">

                            Kategori

                        </label>

                        <select
                            name="kategori"
                            id="kategori"
                            class="form-select">

                            <option
                                value="Foto"
                                {{ $galeri->kategori == 'Foto' ? 'selected' : '' }}>

                                Foto

                            </option>

                            <option
                                value="Video"
                                {{ $galeri->kategori == 'Video' ? 'selected' : '' }}>

                                Video

                            </option>

                        </select>

                    </div>


                    {{-- Tanggal --}}
                    <div class="col-md-6">

                        <label
                            for="tanggal"
                            class="form-label fw-semibold">

                            Tanggal

                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            id="tanggal"
                            class="form-control"
                            value="{{ old('tanggal', $galeri->tanggal) }}">

                    </div>


                    {{-- File --}}
                    <div class="col-12">

                        <label
                            for="file"
                            class="form-label fw-semibold">

                            File

                        </label>

                        <div class="mb-3">

                            <img
                                src="{{ asset('storage/' . $galeri->file) }}"
                                alt="{{ $galeri->judul }}"
                                class="rounded"
                                style="width: 200px; height: 200px; object-fit: cover;">

                        </div>

                        <input
                            type="file"
                            name="file"
                            id="file"
                            class="form-control">

                        <div class="form-text">
                            Pilih file baru jika ingin mengganti file galeri.
                        </div>

                    </div>


                    {{-- Keterangan --}}
                    <div class="col-12">

                        <label
                            for="keterangan"
                            class="form-label fw-semibold">

                            Keterangan

                        </label>

                        <textarea
                            name="keterangan"
                            id="keterangan"
                            class="form-control"
                            rows="3"
                            placeholder="Masukkan keterangan galeri">{{ old('keterangan', $galeri->keterangan) }}</textarea>

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
                        href="{{ route('admin.galeri.index') }}"
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