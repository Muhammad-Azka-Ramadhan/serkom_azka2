@extends('admin_app')

@section('title', 'Siswa')

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
        <div class="card-header">
            <h4 class="header-title mb-0">Tambah Siswa</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.siswa.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="number" class="form-control" name="nisn" id="nisn">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" class="form-control" name="nama_siswa" id="nama">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="mb-2">Jenis Kelamin</label>
                    <div class="form-group form-control">
                        <div class="form-check">
                            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" class="form-check-input" value="Laki-laki">
                            <label class="form-check-label" for="jenis_kelamin">Laki-laki</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" class="form-check-input" value="Perempuan">
                            <label class="form-check-label" for="jenis_kelamin">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                    <input
                        type="number"
                        name="tahun_masuk"
                        id="tahun_masuk"
                        class="form-control @error('tahun_masuk') is-invalid @enderror"
                        min="2010"
                        max="{{ date('Y') }}"
                        required
                    >
                    @error('tahun_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-4 pe-4 ps-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
