@extends('layouts.admin_app')

@section('title', 'Galeri')

@section('content')

<div class="container-fluid py-4">
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

    <div class="card border-0 shadow-sm">
        {{-- Header --}}
        <div class="card-header bg-white border-0 px-4 pt-4 pb-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div>
                    <h4 class="fw-semibold mb-1">Data Galeri</h4>
                    <p class="text-muted small mb-0">Daftar galeri {{ $profilSekolah->nama_sekolah }}</p>
                </div>
                <a
                    href="{{ route('admin.galeri.create') }}"
                    class="btn btn-add">

                    <i class="fa-solid fa-plus me-1"></i>
                    Tambah Galeri
                </a>
            </div>
        </div>

        {{-- Body --}}
        <div class="card-body px-4 pb-4">
            <div class="table-responsive">
                <table
                    id="dataTable"
                    class="table table-hover table-bordered align-middle text-center w-100">

                    <thead class="text-capitalize">
                        <tr>
                            <th style="width: 5%; text-align: center;">No</th>
                            <th style="text-align: center">Judul</th>
                            <th style="text-align: center">Keterangan</th>
                            <th style="text-align: center">File</th>
                            <th style="text-align: center">Kategori</th>
                            <th style="text-align: center">Tanggal</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($galeri as $item)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td style="text-align: center" class="fw-semibold">{{ $item->judul }}</td>
                                <td style="text-align: center">{{ $item->keterangan }}</td>
                                <td style="text-align: center">
                                    @if ($item->kategori == 'Video')
                                        <video src="{{ asset('storage/' . $item->file) }}" class="table-image"></video>
                                    @else
                                    <img
                                        src="{{ asset('storage/' . $item->file) }}"
                                        alt="{{ $item->judul }}"
                                        class="table-image">
                                    @endif
                                </td>
                                <td style="text-align: center">{{ $item->kategori }}</td>
                                <td style="text-align: center">{{ $item->tanggal }}</td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.galeri.edit', Crypt::encrypt($item->id)) }}"
                                            class="btn btn-sm btn-outline-primary">

                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        {{-- Delete --}}
                                        <form
                                            action="{{ route('admin.galeri.destroy', Crypt::encrypt($item->id)) }}"
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
