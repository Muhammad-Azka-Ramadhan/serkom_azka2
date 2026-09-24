@extends('admin_app')

@section('title', $data['title'])

@section('content')
<div class="main-content-inner" id="main-content">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="container d-flex justify-content-between">
                        <h4 class="header-title">Data Siswa</h4>
                        <a href="{{ route('admin.siswa.create') }}" class="action-btn add-siswa-btn"><i class="fa-solid fa-plus"></i>Tambah Siswa</a>
                    </div>
                    <div class="data-tables datatable-dark">
                        <table id="dataTable3" class="text-center w-100">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Mapel</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($guru as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_guru}}</td>
                                    <td>{{ $item->nip }}</td>
                                    <td>{{ $item->mapel }}</td>
                                    <td>{{ $item->foto }}</td>
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
                                            Belum ada data guru
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