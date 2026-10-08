@extends('layouts.admin_app')

@section('title', 'Data Pengelola')

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
        {{-- Header --}}
        <div class="card-header bg-white border-0 px-4 pt-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <h4 class="fw-semibold mb-1">
                        Data Pengelola
                    </h4>
                    <p class="text-muted small mb-0">
                        Kelola data pengguna yang memiliki akses ke sistem.
                    </p>
                </div>
                @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin.user.create') }}" class="btn btn-add">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Pengelola
                </a>
                @endif
            </div>
        </div>
        {{-- Body --}}
        <div class="card-body px-4 pb-4">
            <div class="table-responsive">
                <table id="dataTable" class="table table-hover table-bordered align-middle text-center w-100">
                    <thead class="text-capitalize">
                        <tr>
                            <th style="width: 5%; text-align: center;">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Role</th>
                            @if (Auth::user()->role === 'admin')
                            <th class="text-center">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->name }}</td>
                                <td class="text-center">{{ $item->username }}</td>
                                <td class="text-center">{{ $item->email }}</td>
                                <td class="text-center">{{ $item->role }}</td>
                                @if (Auth::user()->role === 'admin')
                                <td>
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        {{-- Edit --}}
                                        <a
                                            href="{{ route('admin.user.edit', Crypt::encrypt($item->id)) }}"
                                            class="btn btn-sm btn-outline-primary"
                                            title="Edit">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        {{-- Lock / Delete --}}
                                        @if ($item->id == 1)
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-outline-secondary disabled"
                                                title="Tidak dapat dihapus">
                                                <i class="fa-solid fa-lock"></i>
                                            </button>
                                        @else
                                            <form
                                                action="{{ route('admin.user.destroy', Crypt::encrypt($item->id)) }}"
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
                                        @endif
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