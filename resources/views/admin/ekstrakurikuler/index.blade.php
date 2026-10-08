@extends('layouts.admin_app')

@section('title', 'Ekstrakurikuler')

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
                    <h4 class="fw-semibold mb-1">Data Ekstrakurikuler</h4>
                    <p class="text-muted mb-0 small">Daftar ekstrakurikuler {{ $profilSekolah->nama_sekolah }}</p>
                </div>
                <a
                    href="{{ route('admin.eskul.create') }}"
                    class="btn btn-add">

                    <i class="fa-solid fa-plus me-1"></i>
                    Tambah Ekstrakurikuler
                </a>
            </div>
        </div>

        {{-- Card Body --}}
        <div class="card-body px-4 pb-4">
            <div class="table-responsive">
                <table
                    id="dataTable"
                    class="table table-hover table-bordered align-middle text-center w-100">

                    <thead class="table-primary">
                        <tr>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">Ekstrakurikuler</th>
                            <th style="text-align: center">Pembina</th>
                            <th style="text-align: center">Jadwal Latihan</th>
                            <th style="text-align: center">Deskripsi</th>
                            <th style="text-align: center">Gambar</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ekstrakurikuler as $item)
                            <tr>
                                <td style="width: 5%; text-align: center">{{ $loop->iteration }}</td>
                                <td style="text-align: center" class="fw-semibold">{{ $item->nama_eskul }}</td>
                                <td style="text-align: center">{{ $item->guru->nama_guru ?? '-' }}</td>
                                <td style="text-align: center">{{ $item->jadwal_latihan }}</td>
                                <td style="text-align: center" class="text-start">{{ $item->deskripsi }}</td>
                                <td style="text-align: center">
                                    <img
                                        src="{{ asset('storage/' . $item->gambar) }}"
                                        alt="{{ $item->nama_eskul }}"
                                        class="table-image">
                                </td>
                                <td style="text-align: center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a
                                            href="{{ route('admin.eskul.edit', Crypt::encrypt($item->id)) }}"
                                            class="btn btn-sm btn-outline-primary">

                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <form
                                            action="{{ route('admin.eskul.destroy', Crypt::encrypt($item->id)) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Hapus">

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