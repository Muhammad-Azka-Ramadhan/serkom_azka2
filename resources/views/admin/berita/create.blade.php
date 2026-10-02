@extends('admin_app')
@section('title', 'Berita')
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
        <h4 class="header-title">Tambah Berita</h4>
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul">
            </div>
            <div class="form-group">
                <label for="isi">Isi</label>
                <input type="text" class="form-control" name="isi" id="isi">
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal">
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
