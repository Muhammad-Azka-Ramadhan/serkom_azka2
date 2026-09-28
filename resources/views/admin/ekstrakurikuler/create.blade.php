@extends('admin_app')
@section('title', 'Ekstrakrikuler')
@section('content')
<div class="card">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-body">
        <h4 class="header-title">Tambah Guru</h4>
        <form action="{{ route('admin.eskul.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Ekstrakurikuler</label>
                <input type="text" class="form-control" name="nama_eskul" id="nama">
            </div>
            <div class="form-group">
                <label for="jadwal">Jadwal</label>
                <input type="text" class="form-control" name="jadwal_latihan" id="jadwal">
            </div>
            <div class="form-group">
                <label for="pembina">Pembina</label>
                <select name="id_guru" id="pembina" class="form-select">
                    @foreach ($guru as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_guru }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" id="deskripsi">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" name="gambar" id="gambar">
            </div>
            <button type="submit" class="btn btn-primary mt-4 pe-4 ps-4">Submit</button>
        </form>
    </div>
</div>
@endsection
