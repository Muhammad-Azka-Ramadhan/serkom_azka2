@extends('admin_app')

@section('title', 'Guru')

@section('content')
<div class="col-12 mt-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Edit Guru</h4>
            <form action="{{ route('admin.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_guru">Nama</label>
                    <input type="text" class="form-control" name="nama_guru" id="nama" value="{{ $guru->nama_guru }}">
                </div>
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="number" class="form-control" name="nip" id="nip" value="{{ $guru->nip }}">
                </div>
                <div class="form-group">
                    <label for="mapel">Mapel</label>
                    <input type="text" class="form-control" name="mapel" id="mapel" value="{{ $guru->mapel }}">
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <img src="{{ asset('storage/'.$guru->foto) }}" alt="" style="width: 200px; height: 200px;">
                    <input type="file" class="form-control" name="foto" id="foto">
                </div>
                <button type="submit" class="btn btn-primary mt-4 pe-4 ps-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
