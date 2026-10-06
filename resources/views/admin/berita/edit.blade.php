@extends('layouts.admin_app')

@section('title', 'Edit Berita')

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
                Edit Berita
            </h4>

            <p class="text-muted small mb-0">
                Perbarui data berita sekolah
            </p>

        </div>


        {{-- Body --}}
        <div class="card-body px-4 pb-4">

            <form
                action="{{ route('admin.berita.update', Crypt::encrypt($berita->id)) }}"
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
                            value="{{ old('judul', $berita->judul) }}"
                            placeholder="Masukkan judul berita">

                    </div>


                    {{-- Isi --}}
                    <div class="col-12">

                        <label
                            for="isi"
                            class="form-label fw-semibold">

                            Isi Berita

                        </label>

                        <textarea
                            name="isi"
                            id="isi"
                            class="form-control"
                            rows="5"
                            placeholder="Masukkan isi berita">{{ old('isi', $berita->isi) }}</textarea>

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
                            value="{{ old('tanggal', $berita->tanggal) }}">

                    </div>


                    {{-- Gambar --}}
                    <div class="col-12">

                        <label
                            for="gambar"
                            class="form-label fw-semibold">

                            Gambar

                        </label>

                        <div class="mb-3">

                            <img
                                src="{{ asset('storage/' . $berita->gambar) }}"
                                alt="Gambar berita"
                                class="rounded"
                                style="width: 200px; height: 200px; object-fit: cover;">

                        </div>

                        <input
                            type="file"
                            name="gambar"
                            id="gambar"
                            class="form-control">

                        <div class="form-text">
                            Pilih gambar baru jika ingin mengganti gambar berita.
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
                        href="{{ route('admin.berita.index') }}"
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