@extends('admin_app')
@section('title', 'Galeri')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mt-5">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-header">
                <div class="card-title mb-0">Tambah Galeri</div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.galeri.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul">
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-select" name="kategori" id="kategori">
                                    <option value="foto">Foto</option>
                                    <option value="video">Video</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" class="form-control" name="file" id="file">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 px-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
