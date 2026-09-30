@extends('admin_app')

@section('title', 'Ekstrakurikuler')

@section('content')
<div class="main-content-inner" id="main-content">
    <div class="row">
        <div class="col-12 mt-5">
            <hr>
            @session('success')
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endsession
            <div class="card">
                <div class="card-body">
                    <div class="container d-flex justify-content-between">
                        <h4 class="header-title">Data Ekstrakurikuler</h4>
                        <a href="{{ route('admin.eskul.create') }}" class="action-btn add-btn"><i class="fa-solid fa-plus"></i>Tambah Ekstrakurikuler</a>
                    </div>
                    <div class="datatable-dark">
                        <table id="" class="table text-center w-100">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Ekstrakurikuler</th>
                                    <th>Pembina</th>
                                    <th>Jadwal Latihan</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ekstrakurikuler as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_eskul }}</td>
                                    <td>{{ $item->guru->nama_guru }}</td>
                                    <td>{{ $item->jadwal_latihan}}</td>
                                    <td>{{ $item->deskripsi}}</td>
                                    <td><img width="50px" height="50px" src="{{asset($item->gambar)}}" alt=""></td>
                                    <td>
                                        <button type="button" class="action-btn edit-btn" onclick="window.location.href='{{ route('admin.eskul.edit', Crypt::encrypt($item->id)) }}'">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                        <form action="{{ route('admin.eskul.destroy', $item->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn delete-btn">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
