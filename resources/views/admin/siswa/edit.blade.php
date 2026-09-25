@extends('admin_app')

@section('title', $data['title'])

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
            <h4 class="header-title">Tambah Siswa</h4>
            <form action="{{ route('admin.siswa.update', $siswa->id_siswa) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="number" class="form-control" name="nisn" id="nisn" value="{{ $siswa->nisn }}">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" class="form-control" name="nama_siswa" id="nama" value="{{ $siswa->nama_siswa }}">
                </div>
                <div class="form-check">
                    <input type="radio" id="laki-laki" name="jenis_kelamin" class="form-check-input" value="Laki-laki"{{ $siswa->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input type="radio" id="perempuan" name="jenis_kelamin" class="form-check-input" value="Perempuan"{{ $siswa->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                    <label class="form-check-label" for="perempuan">Perempuan</label>
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
                        value="{{ old('tahun_masuk', $siswa->tahun_masuk) }}"
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
