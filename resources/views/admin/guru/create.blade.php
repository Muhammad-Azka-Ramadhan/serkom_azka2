@extends('layouts.admin_app')

@section('title', 'Tambah Guru')

@section('content')

<div class="container-fluid py-4">
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

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 px-4 pt-4">
            <h4 class="fw-semibold mb-1">
                Tambah Guru
            </h4>

            <p class="text-muted small mb-0">
                Tambahkan data guru baru ke dalam sistem.
            </p>
        </div>

        <div class="card-body px-4 pb-4">
            <form
                action="{{ route('admin.guru.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="nama" class="form-label fw-semibold">
                            Nama Guru
                        </label>

                        <input
                            type="text"
                            name="nama_guru"
                            id="nama"
                            class="form-control"
                            value=""
                            placeholder="Masukkan nama guru">
                    </div>

                    <div class="col-md-6">
                        <label for="nip" class="form-label fw-semibold">
                            NIP
                        </label>

                        <input
                            type="number"
                            name="nip"
                            id="nip"
                            class="form-control"
                            value=""
                            placeholder="Masukkan NIP">
                    </div>

                    <div class="col-md-6">
                        <label for="mapel" class="form-label fw-semibold">
                            Mata Pelajaran
                        </label>

                        <input
                            type="text"
                            name="mapel"
                            id="mapel"
                            class="form-control"
                            value=""
                            placeholder="Masukkan mata pelajaran">
                    </div>

                    <div class="col-md-6">
                        <label for="foto" class="form-label fw-semibold">
                            Foto
                        </label>

                        <input
                            type="file"
                            name="foto"
                            id="foto"
                            class="form-control">

                        <div class="form-text">
                            Pilih foto guru yang akan digunakan.
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-simpan px-4">
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
