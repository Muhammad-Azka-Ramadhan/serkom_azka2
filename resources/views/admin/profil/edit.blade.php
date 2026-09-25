@extends('admin_app')

@section('title', $data['title'])

@section('content')
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Edit Profil</h4>
            <form>
                @csrf
                <div class="form-group">
                    <label for="nama_sekolah">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah" value="{{$profilSekolah->nama_sekolah}}">
                </div>
                <div class="form-group">
                    <label for="kepala_sekolah">Kepala Sekolah</label>
                    <input type="text" name="kepala_sekolah" class="form-control" id="kepala_sekolah" value="{{$profilSekolah->kepala_sekolah}}">
                </div>
                <div class="form-group">
                    <label for="npsn">NPSN</label>
                    <input type="number" name="npsn" class="form-control" id="npsn" value="{{$profilSekolah->npsn}}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{$profilSekolah->alamat}}">
                </div>
                <div class="form-group">
                    <label for="kontak">Kontak</label>
                    <input type="number" name="kontak" class="form-control" id="kontak" value="{{$profilSekolah->kontak}}">
                </div>
                <div class="form-group">
                    <label for="visi_misi">Visi Misi</label>
                    <input type="text" name="visi_misi" class="form-control" id="visi_misi" value="{{$profilSekolah->visi_misi}}">
                </div>
                <div class="form-group">
                    <label for="tahun_berdiri">Tahun Berdiri</label>
                    <input type="number" name="tahun_berdiri" class="form-control" id="tahun_berdiri" value="{{$profilSekolah->tahun_berdiri}}">
                </div>
                <button type="submit" class="btn btn-primary mt-4 pe-4 ps-4">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection