@extends('admin_app')
@section('content')
@section('title', 'Ekstrakurikuler')
<div class="card"></div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h4 class="header-title">Edit Ekstrakurikuler</h4>
        <form action="{{ route('admin.eskul.update', $ekstrakurikuler->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Ekstrakurikuler</label>
                <input type="text" name="nama_eskul" id="nama" class="form-control" value="{{ $ekstrakurikuler->nama_eskul }}">
            </div>
            <div class="form-group">
                <label for="jadwal">Jadwal Latihan</label>
                <input type="text" name="jadwal_latihan" id="jadwal" class="form-control" value="{{ $ekstrakurikuler->jadwal_latihan }}">
            </div>
            <div class="form-group">
                <label for="pembina">Pembina</label>
                <select name="id_guru" id="pembina" class="form-select">
                    @foreach ($guru as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $ekstrakurikuler->id_guru ? 'selected' : '' }} >{{$item->nama_guru}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{ $ekstrakurikuler->deskripsi }}">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                @if ($ekstrakurikuler->gambar && file_exists(public_path($ekstrakurikuler->gambar)))
                    <div class="mb-2">
                        <img src="{{ asset($ekstrakurikuler->gambar) }}"
                            alt="Foto Sekolah"
                            class="img-fluid rounded"
                            style="max-width: 300px;">
                    </div>
                @endif
                <input type="file" class="form-control" name="gambar" id="gambar" value="">
            </div>
            <button type="submit" class="btn btn-primary mt-4 pe-4 ps-4">Submit</button>
        </form>
    </div>
</div>
@endsection
