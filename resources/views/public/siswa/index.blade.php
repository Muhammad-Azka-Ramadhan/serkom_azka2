@extends('layouts.public_app')

@section('nama_sekolah', $profilSekolah->nama_sekolah)

@section('title', 'Siswa')

@section('content')

<div class="container-fluid py-4">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white border-0 px-4 pt-4 pb-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div>
                    <h4 class="fw-semibold mb-1">Data Siswa</h4>
                    <p class="text-muted mb-0 small">Daftar siswa {{ $profilSekolah->nama_sekolah }}</p>
                </div>
            </div>
        </div>

        <div class="card-body px-4 pb-4">
            <div class="table-responsive">
                <table
                    id="dataTable"
                    class="table table-hover table-bordered align-middle text-center w-100">
                    <thead class="table-primary">
                        <tr>
                            <th style=" width: 5%; text-align: center">No</th>
                            <th style="text-align: center">NISN</th>
                            <th style="text-align: center">Nama</th>
                            <th style="text-align: center">Jenis Kelamin</th>
                            <th style="text-align: center">Tahun Masuk</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($siswa as $item)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td style="text-align: center">{{ $item->nisn }}</td>
                                <td style="text-align: center" class="fw-semibold">{{ $item->nama_siswa }}</td>
                                <td style="text-align: center">{{ $item->jenis_kelamin }}</td>
                                <td style="text-align: center">{{ $item->tahun_masuk }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($siswa->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $siswa->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
