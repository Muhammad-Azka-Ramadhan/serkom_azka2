@extends('admin_app')

@section('title', 'Galeri')

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
                        <h4 class="header-title">Galeri</h4>
                        <a href="" class="action-btn add-btn mb-2"><i class="fa-solid fa-plus"></i>Tambah Galeri</a>
                    </div>
                    <div class="data-tables datatable-dark">
                        <table class="table text-center w-100">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>File</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galeri as $item)a
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$galeri->judul}}</td>
                                    <td>{{$galeri->keterangan}}</td>
                                    <td><img width="50px" height="50px" src="{{ asset('storage/' . $item->file) }}" alt=""></td>
                                    <td>{{$item->kategori}}</td>
                                    <td>{{$item->tanggal}}</td>
                                    <td>
                                        <button type="submit" class="action-btn edit-btn">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>

                                        <form action="" method="POST" class="d-inline">
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
