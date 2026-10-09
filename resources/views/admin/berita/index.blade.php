@extends('layouts.admin_app')

@section('title', 'Berita')

@section('content')
<div class="container-fluid py-4">
    {{-- Alert --}}
    @session('success')
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close">
            </button>
        </div>
    @endsession

    @session('error')
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>
            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close">
            </button>
        </div>
    @endsession

    {{-- Card --}}
    <div class="card border-0 shadow-sm">
        {{-- Card Header --}}
        <div class="card-header bg-white border-0 px-4 pt-4 pb-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div>
                    <h4 class="fw-semibold mb-1">Data Berita</h4>
                    <p class="text-muted mb-0 small">Daftar berita {{ $profilSekolah->nama_sekolah }}</p>
                </div>
                <a href="{{ route('admin.berita.create') }}" class="btn btn-add">
                    <i class="fa-solid fa-plus me-1"></i>
                    Tambah Berita
                </a>
            </div>
        </div>

        {{-- Card Body --}}
        <div class="card-body px-4 pb-4">
            <div class="table-responsive">
                <table id="dataTable" class="table table-hover table-bordered align-middle text-center w-100">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 5%; text-align: center">No</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Isi</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Pembuat Berita</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td  class="fw-semibold text-center">{{ $item->judul }}</td>
                                <td class="text-center">{{  Str::limit($item->isi, 200, '....') }}</td>
                                <td class="text-center">{{ $item->tanggal }}</td>
                                <td>
                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        class="table-image">
                                </td>
                                <td class="text-center">{{ $item->user->name ?? 'Tidak diketahui' }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a
                                            href="{{ route('admin.berita.edit', Crypt::encrypt($item->id)) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <form
                                            action="{{ route('admin.berita.destroy', Crypt::encrypt($item->id)) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection