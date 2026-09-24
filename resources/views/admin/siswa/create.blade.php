@extends('admin_app')

@section('content')
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Basic form</h4>
            <form>
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="number" class="form-control" id="nisn" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama">
                </div>
                <div class="form-check">
                    <input type="radio" checked id="laki-laki" name="jenis_kelamin" class="form-check-input">
                    <label class="form-check-label" for="laki-laki">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input type="radio" checked id="perempuan" name="jenis_kelamin" class="form-check-input">
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
                        value="{{ old('tahun_masuk', date('Y')) }}" 
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