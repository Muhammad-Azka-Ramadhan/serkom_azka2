@extends('layouts.admin_app')

@section('title', 'Edit Profil')

@section('content')
<div class="container-fluid py-4">

    {{-- Error --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <strong>Terjadi kesalahan:</strong>

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

    <div class="card border-0 shadow-sm">

        {{-- Header --}}
        <div class="card-header bg-white border-0 px-4 pt-4">
            <h4 class="fw-semibold mb-1">Edit Profil Sekolah</h4>
            <p class="text-muted mb-0">
                Perbarui informasi profil {{ $profilSekolah->nama_sekolah }}
            </p>
        </div>

        {{-- Body --}}
        <div class="card-body px-4 pb-4">

            <form
                action="{{ route('admin.profil.update', Crypt::encrypt($profilSekolah->id)) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row g-3">

                    {{-- Nama Sekolah --}}
                    <div class="col-md-6">
                        <label for="nama_sekolah" class="form-label">
                            Nama Sekolah
                        </label>

                        <input
                            type="text"
                            name="nama_sekolah"
                            id="nama_sekolah"
                            class="form-control"
                            value="{{ old('nama_sekolah', $profilSekolah->nama_sekolah) }}">
                    </div>

                    {{-- Kepala Sekolah --}}
                    <div class="col-md-6">
                        <label for="kepala_sekolah" class="form-label">
                            Kepala Sekolah
                        </label>

                        <input
                            type="text"
                            name="kepala_sekolah"
                            id="kepala_sekolah"
                            class="form-control"
                            value="{{ old('kepala_sekolah', $profilSekolah->kepala_sekolah) }}">
                    </div>

                    {{-- NPSN --}}
                    <div class="col-md-6">
                        <label for="npsn" class="form-label">
                            NPSN
                        </label>

                        <input
                            type="text"
                            name="npsn"
                            id="npsn"
                            class="form-control"
                            value="{{ old('npsn', $profilSekolah->npsn) }}">
                    </div>

                    {{-- Tahun Berdiri --}}
                    <div class="col-md-6">
                        <label for="tahun_berdiri" class="form-label">
                            Tahun Berdiri
                        </label>

                        <input
                            type="number"
                            name="tahun_berdiri"
                            id="tahun_berdiri"
                            class="form-control"
                            value="{{ old('tahun_berdiri', $profilSekolah->tahun_berdiri) }}">
                    </div>

                    {{-- Kontak --}}
                    <div class="col-md-6">
                        <label for="kontak" class="form-label">
                            Kontak
                        </label>

                        <input
                            type="text"
                            name="kontak"
                            id="kontak"
                            class="form-control"
                            value="{{ old('kontak', $profilSekolah->kontak) }}">
                    </div>

                    {{-- Alamat --}}
                    <div class="col-12">
                        <label for="alamat" class="form-label">
                            Alamat
                        </label>

                        <textarea
                            name="alamat"
                            id="alamat"
                            rows="3"
                            class="form-control">{{ old('alamat', $profilSekolah->alamat) }}</textarea>
                    </div>

                    {{-- Visi --}}
                    <div class="col-12">
                        <label for="visi" class="form-label">
                            Visi
                        </label>

                        <textarea
                            name="visi"
                            id="visi"
                            rows="3"
                            class="form-control">{{ old('visi', $profilSekolah->visi) }}</textarea>
                    </div>

                    {{-- Misi --}}
                    <div class="col-12">
                        <label for="misi" class="form-label">
                            Misi
                        </label>

                        <textarea
                            name="misi"
                            id="misi"
                            rows="5"
                            class="form-control">{{ old('misi', $profilSekolah->misi) }}</textarea>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-12">
                        <label for="deskripsi" class="form-label">
                            Deskripsi
                        </label>

                        <textarea
                            name="deskripsi"
                            id="deskripsi"
                            rows="5"
                            class="form-control">{{ old('deskripsi', $profilSekolah->deskripsi) }}</textarea>
                    </div>

                    {{-- Logo --}}
                    <div class="col-md-6">
                        <label for="logo" class="form-label">
                            Logo Sekolah
                        </label>

                        @if ($profilSekolah->logo && Storage::disk('public')->exists($profilSekolah->logo))
                            <div class="mb-3">
                                <img
                                    src="{{ asset('storage/' . $profilSekolah->logo) }}"
                                    alt="Logo Sekolah"
                                    class="profile-edit-logo">
                            </div>
                        @endif

                        <div class="text-muted small mb-2">
                            File saat ini: <strong>{{ basename($profilSekolah->logo) }}</strong>
                        </div>

                        <input
                            type="file"
                            name="logo"
                            id="logo"
                            class="form-control"
                            accept="image/*"
                            value="{{ $profilSekolah->logo }}">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti logo.
                        </small>
                    </div>

                    {{-- Foto Sekolah --}}
                    <div class="col-md-6">
                        <label for="foto" class="form-label">
                            Foto Sekolah
                        </label>

                        @if ($profilSekolah->foto && Storage::disk('public')->exists($profilSekolah->foto))
                            <div class="mb-3">
                                <img
                                    src="{{ asset('storage/' . $profilSekolah->foto) }}"
                                    alt="Foto Sekolah"
                                    class="profile-edit-photo"
                                >
                            </div>
                        @endif

                        <div class="text-muted small mb-2">
                            File saat ini: <strong>{{ basename($profilSekolah->foto) }}</strong>
                        </div>

                        <input
                            type="file"
                            name="foto"
                            id="foto"
                            class="form-control"
                            accept="image/*"
                            value="{{ asset('storage/' . $profilSekolah->foto) }}">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti foto.
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label for="foto_kepsek" class="form-label">
                            Foto Kepala Sekolah
                        </label>
                        @if ($profilSekolah->foto_kepala_sekolah && Storage::disk('public')->exists($profilSekolah->foto_kepala_sekolah))
                            <img
                                src="{{ asset('storage/' . $profilSekolah->foto_kepala_sekolah) }}" 
                                alt="Foto Kepala Sekolah" 
                                class="profile-edit-photo"
                            >
                        @endif
                        <div class="text-muted small mb-2">
                            File saat ini: <strong>{{ $profilSekolah->foto_kepala_sekolah }}</strong>
                        </div>

                        <input 
                            type="file" 
                            name="foto_kepala_sekolah" 
                            id="foto_kepsek"
                            class="form-control"
                            accept="image/*"
                            value="{{ asset('storage/' . $profilSekolah->foto_kepala_sekolah) }}"
                        >
                    </div>

                    <div class="col-md-12">
                        <label for="sambutan" class="form-label">
                            Sambutan Kepala Sekolah
                        </label>
                        <textarea name="sambutan_kepala_sekolah" id="sambutan" rows="5" class="form-control">
                            {{ old('sambutan_kepala_sekolah', $profilSekolah->sambutan_kepala_sekolah) }}
                        </textarea>
                    </div>
                </div>

                {{-- Action --}}
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

                    <a
                        href="{{ route('admin.profil.index') }}"
                        class="btn btn-outline-secondary px-4">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-simpan px-4">
                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>
@endsection