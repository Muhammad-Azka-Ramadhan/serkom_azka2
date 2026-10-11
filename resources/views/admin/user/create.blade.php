@extends('layouts.admin_app')

@section('title', 'Tambah Pengelola')

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
                Tambah Pengelola
            </h4>

            <p class="text-muted small mb-0">
                Tambahkan pengguna baru yang dapat mengakses sistem.
            </p>
        </div>

        <div class="card-body px-4 pb-4">
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf

                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-semibold">
                            Nama
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control"
                            placeholder="Masukkan nama pengelola">
                    </div>

                    <div class="col-md-6">
                        <label for="username" class="form-label fw-semibold">
                            Username
                        </label>

                        <input
                            type="text"
                            name="username"
                            id="username"
                            class="form-control"
                            placeholder="Masukkan username">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label fw-semibold">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            placeholder="Masukkan alamat email">
                    </div>

                    <div class="col-md-6">
                        <label for="role" class="form-label fw-semibold">
                            Role
                        </label>

                        <select name="role" id="role" class="form-select">
                            <option value="admin">
                                Admin
                            </option>

                            <option value="operator">
                                Operator
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label fw-semibold">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Masukkan password">
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4 pt-3 border-top">
                    <button type="submit" class="btn btn-simpan px-4">
                        <i class="fa-solid fa-save me-1"></i>
                        Simpan
                    </button>

                    <a
                        href="{{ route('admin.user.index') }}"
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
