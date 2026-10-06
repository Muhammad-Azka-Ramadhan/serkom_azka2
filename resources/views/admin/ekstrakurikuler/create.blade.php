@extends('layouts.admin_app')

@section('title', 'Ekstrakurikuler')

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

            <button type="button"
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
                Tambah Ekstrakurikuler
            </h4>

            <p class="text-muted small mb-0">
                Tambahkan data ekstrakurikuler sekolah
            </p>

        </div>


        {{-- Body --}}
        <div class="card-body px-4 pb-4">

            <form
                action="{{ route('admin.eskul.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    {{-- Nama --}}
                    <div class="col-md-6">

                        <label for="nama" class="form-label fw-semibold">
                            Nama Ekstrakurikuler
                        </label>

                        <input
                            type="text"
                            name="nama_eskul"
                            id="nama"
                            class="form-control"
                            value="{{ old('nama_eskul') }}"
                            placeholder="Masukkan nama ekstrakurikuler">

                    </div>


                    {{-- Jadwal --}}
                    <div class="col-md-6">

                        <label for="jadwal" class="form-label fw-semibold">
                            Jadwal Latihan
                        </label>

                        <input
                            type="text"
                            name="jadwal_latihan"
                            id="jadwal"
                            class="form-control"
                            value="{{ old('jadwal_latihan') }}"
                            placeholder="Contoh: Sabtu, 08.00 - 10.00">

                    </div>


                    {{-- Pembina --}}
                    <div class="col-md-6">

                        <label for="pembina" class="form-label fw-semibold">
                            Pembina
                        </label>

                        <select
                            name="id_guru"
                            id="pembina"
                            class="form-select">

                            <option value="">
                                -- Pilih Pembina --
                            </option>

                            @foreach ($guru as $item)

                                <option
                                    value="{{ $item->id }}"
                                    {{ old('id_guru') == $item->id ? 'selected' : '' }}>

                                    {{ $item->nama_guru }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Deskripsi --}}
                    <div class="col-md-6">

                        <label for="deskripsi" class="form-label fw-semibold">
                            Deskripsi
                        </label>

                        <textarea
                            name="deskripsi"
                            id="deskripsi"
                            class="form-control"
                            rows="3"
                            placeholder="Masukkan deskripsi ekstrakurikuler">{{ old('deskripsi') }}</textarea>

                    </div>


                    {{-- Gambar --}}
                    <div class="col-12">

                        <label for="gambar" class="form-label fw-semibold">
                            Gambar
                        </label>

                        <input
                            type="file"
                            name="gambar"
                            id="gambar"
                            class="form-control">

                        <div class="form-text">
                            Pilih gambar ekstrakurikuler yang akan ditampilkan.
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
                        href="{{ route('admin.eskul.index') }}"
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