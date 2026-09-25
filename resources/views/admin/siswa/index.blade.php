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
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tahun Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswa as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nisn }}</td>
                                    <td>{{ $item->nama_siswa }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tahun_masuk }}</td>
                                    <td>
                                        <button type="button" class="action-btn edit-btn" onclick="window.location.href='{{ route('admin.siswa.edit', $item->id_siswa) }}'">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                       <form action="{{ route('admin.siswa.destroy', $item->id_siswa) }}"
                                            method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="action-btn delete-btn">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td>
                                            Belum ada data siswa
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
