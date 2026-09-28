@extends('admin_app')

@section('title', 'Ekstrakurikuler')

@section('content')
<div class="main-content-inner" id="main-content">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="container d-flex justify-content-between">
                        <h4 class="header-title">Data Ekstrakurikuler</h4>
                        <a href="{{ route('admin.eskul.create') }}" class="action-btn add-siswa-btn"><i class="fa-solid fa-plus"></i>Tambah Ekstrakurikuler</a>
                    </div>
                        <table id="dataTable3" class="text-center w-100">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Ekstrakurikuler</th>
                                    <th>Pembina</th>
                                    <th>Jadwal Latihan</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>zzz
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ekstrakurikuler as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_eskul }}</td>
                                    <td>{{ $item->pembina }}</td>
                                    <td>{{ $item->jadwal_latihan}}</td>
                                    <td>{{ $item->deskripsi}}</td>
                                    <td><img width="50px" height="50px" src="{{asset($item->gambar)}}" alt=""></td>
                                    <td>
                                        <button type="button" class="action-btn edit-btn">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>

                                        <button type="button" class="action-btn delete-btn">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td>
                                            Belum ada data ekstrakurikuler
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
