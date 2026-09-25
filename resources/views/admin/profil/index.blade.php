@extends('admin_app')

@section('title', $data['title'])

@section('content')
<div class="container-fluid mt-4">
    <!-- Header Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold mb-1">Profil Sekolah</h3>
                    <p class="text-muted mb-0">Profil SMPN 1 Padakembang</p>
                </div>
                <a href="{{route('admin.profil.edit', $profilSekolah->id_profil)}}" class="btn btn-primary"><i class="fas fa-edit me-1"></i>Edit Profil</a>
            </div>
        </div>
    </div>
    <!-- Identitas Sekolah -->
    <div class="row">
        <!-- Logo -->
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-body text-center">
                    @if (!empty($profilSekolah->logo) && file_exists(public_path('assets/images/' . $profilSekolah->logo)))
                    <img src="{{asset('assets/images/' . $profilSekolah->logo)}}" alt="Logo SMPN 1 Padakembang"  class="img-fluid mb-3" style="width: 140px;">
                    @else
                    <img src="{{asset('assets/images/logo.png')}}" alt="Logo SMPN 1 Padakembang"  class="img-fluid mb-3" style="width: 140px;">
                    @endif
                    <h4 class="fw-bold mb-1">SMPN 1 Padakembang</h4>

                    <p class="text-muted mb-0">Sekolah Menengah Pertama Negeri</p>
                </div>
            </div>
        </div>
        <!-- Informasi Sekolah -->
        <div class="col-lg-8 mt-4 mt-lg-0">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0">Informasi Sekolah</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                            
                        <div class="col-md-6 mb-4">
                            <small class="text-muted">Nama Sekolah</small>
                            <div class="fw-bold mt-1">{{$profilSekolah->nama_sekolah}}</div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <small class="text-muted">Kepala Sekolah</small>
                            <div class="fw-bold mt-1">{{$profilSekolah->kepala_sekolah}}</div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <small class="text-muted">NPSN</small>
                            <div class="fw-bold mt-1">{{$profilSekolah->npsn}}</div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <small class="text-muted">Tahun Berdiri</small>
                            <div class="fw-bold mt-1">{{$profilSekolah->tahun_berdiri}}</div>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted">Kontak</small>
                            <div class="fw-bold mt-1">{{$profilSekolah->kontak}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alamat & Foto -->
    <div class="row mt-4">
        <!-- Alamat -->
        <div class="col-lg-5">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="mb-0">Alamat Sekolah</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">{{$profilSekolah->alamat}}</p>
                </div>
            </div>
        </div>

        <!-- Foto Sekolah -->
        <div class="col-lg-7 mt-4 mt-lg-0">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Foto Sekolah</h5>
                </div>
                <div class="card-body">
                    <img
                        src="assets/img/foto-sekolah.jpg"
                        alt="Foto SMPN 1 Padakembang"
                        class="img-fluid rounded w-100"
                    >
                </div>
            </div>
        </div>
    </div>

    <!-- Visi & Misi -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Visi & Misi</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">{{$profilSekolah->deskripsi}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Deskripsi -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Deskripsi Sekolah</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-0">
                        SMPN 1 Padakembang merupakan satuan pendidikan
                        tingkat sekolah menengah pertama yang berada
                        di wilayah Padakembang, Kabupaten Tasikmalaya.
                        Sekolah menyelenggarakan pendidikan untuk
                        mengembangkan potensi akademik maupun
                        nonakademik peserta didik.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection