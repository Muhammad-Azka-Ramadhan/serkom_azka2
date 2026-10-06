@extends('layouts.admin_app')

@section('title', 'Edit Pengelola')

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
                Edit Pengelola
            </h4>

            <p class="text-muted small mb-0">
                Perbarui data pengelola sistem
            </p>

        </div>


        {{-- Body --}}
        <div class="card-body px-4 pb-4">

            <form
                action="{{ route('admin.user.update', Crypt::encrypt($user->id)) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- Nama --}}
                    <div class="col-md-6">

                        <label
                            for="name"
                            class="form-label fw-semibold">

                            Nama

                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control"
                            value="{{ old('name', $user->name) }}"
                            placeholder="Masukkan nama">

                    </div>


                    {{-- Username --}}
                    <div class="col-md-6">

                        <label
                            for="username"
                            class="form-label fw-semibold">

                            Username

                        </label>

                        <input
                            type="text"
                            name="username"
                            id="username"
                            class="form-control"
                            value="{{ old('username', $user->username) }}"
                            placeholder="Masukkan username">

                    </div>


                    {{-- Email --}}
                    <div class="col-md-6">

                        <label
                            for="email"
                            class="form-label fw-semibold">

                            Email

                        </label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            value="{{ old('email', $user->email) }}"
                            placeholder="Masukkan email">

                    </div>


                    {{-- Role --}}
                    <div class="col-md-6">

                        <label
                            for="role"
                            class="form-label fw-semibold">

                            Role

                        </label>

                        <select
                            name="role"
                            id="role"
                            class="form-select">

                            <option
                                value="admin"
                                {{ $user->role === 'admin' ? 'selected' : '' }}>

                                Admin

                            </option>

                            <option
                                value="operator"
                                {{ $user->role === 'operator' ? 'selected' : '' }}>

                                Operator

                            </option>

                        </select>

                    </div>


                    {{-- Password --}}
                    <div class="col-12">

                        <label
                            for="password"
                            class="form-label fw-semibold">

                            Password Baru

                        </label>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Masukkan password baru">

                        <div class="form-text">
                            Kosongkan jika tidak ingin mengubah password.
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