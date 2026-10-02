@extends('admin_app')
@section('title', 'Galeri')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mt-5">
            @session('success')
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endsession
            <div class="card-header">
                <div class="header-title">Edit Galeri</div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.galeri.update', Crypt::encrypt($galeri->id)) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" value="{{ $galeri->judul }}">
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" id="kategori" class="form-select">
                                <option value="Foto" {{ $galeri->kategori == 'Foto' ? 'selected' : '' }}>Foto</option>
                                <option value="Video" {{ $galeri->kategori == 'Video' ? 'selected' : '' }}>Video</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-12">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $galeri->tanggal }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file">File</label>
                        <img src="{{ asset('storage/' . $galeri->file) }}" alt="" width="200px" height="200px">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ $galeri->keterangan }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 pe-4 ps-4 ">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
