@extends('layouts.admin_app')

@section('title', 'Siswa')

@section('content')

<div class="container-fluid py-4">
    {{-- Alert Success --}}
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
    {{-- Card --}}
    <div class="card border-0 shadow-sm">
        {{-- Card Header --}}
        <div class="card-header bg-white border-0 px-4 pt-4 pb-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div>
                    <h4 class="fw-semibold mb-1">Data Siswa</h4>
                    <p class="text-muted mb-0 small">Daftar siswa SMPN 1 Padakembang</p>
                </div>
                @if (Auth::user()->role === 'admin')
                <a
                    href="{{ route('admin.siswa.create') }}"
                    class="btn btn-add">

                    <i class="fa-solid fa-plus me-1"></i>
                    Tambah Siswa
                </a>
                @endif
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
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tahun Masuk</th>
                            @if (Auth::user()->role === 'admin')
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nisn }}</td>
                                <td class="fw-semibold">{{ $item->nama_siswa }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>{{ $item->tahun_masuk }}</td>
                                @if (Auth::user()->role === 'admin')
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.siswa.edit', Crypt::encrypt($item->id)) }}"
                                            class="btn btn-sm btn-outline-primary"
                                            title="Edit">

                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        {{-- Delete --}}
                                        <form
                                            action="{{ route('admin.siswa.destroy', Crypt::encrypt($item->id)) }}"
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
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection