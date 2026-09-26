@extends('admin_app')
@section('title', $title)
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="header-title">Tambah Guru</h4>
        <form action="{{ route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Guru</label>
                <input type="text" class="form-control" name="nama_guru" id="nama">
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="number" class="form-control" name="nip" id="nip">
            </div>
            <div class="form-group">
                <label for="mapel">Mapel</label>
                <input type="text" class="form-control" name="mapel" id="mapel">
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" name="foto" id="foto">
            </div>
            <button type="submit" class="btn btn-primary mt-4 pe-4 ps-4">Submit</button>
        </form>
    </div>
</div>
@endsection