@extends('backend.base')

@section('title', 'mitra')
@section('content')
@include('sweetalert::alert')
    @php
        $baseURL = url('/');
    @endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Mitra /</span>
            {{$mitra->id}}/edit
        </h4>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ Auth::user()->roles == 'admin' ? route('admin.mitra.update', $mitra->id) : route('pegawai.mitra.update',$mitra->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">username</label>
                                        <input type="text" name="username" class="form-control" placeholder="masukan username"
                                            value="{{ $mitra->username }}" required>
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label">password</label>
                                        <div class="input-group input-group-merge">
                                            <input
                                              type="password"
                                              class="form-control"
                                              name="password"
                                              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                              aria-describedby="password"
                                            />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                          </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" placeholder="masukan nama mitra"
                                            value="{{ $mitra->mitra->nama }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">jenis kelamin</label>
                                        <select class="form-select" aria-label="Multiple select example" name="jenis_kelamin">
                                            <option value="" selected>silahkan pilih</option>
                                            <option value="pria" {{$mitra->mitra->jenis_kelamin == 'pria' ? 'selected' : '' }}>pria</option>
                                            <option value="wanita" {{$mitra->mitra->jenis_kelamin == 'wanita' ? 'selected' : '' }}>wanita</option>
                                          </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">mata pelajaran</label>
                                        <input type="text" name="mata_pelajaran" class="form-control" placeholder="masukan mata pelajaran"
                                            value="{{ $mitra->mitra->mata_pelajaran }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">nomor ponsel</label>
                                        <input type="text" name="nomor_ponsel" class="form-control" placeholder="masukan mata pelajaran"
                                            value="{{ $mitra->mitra->nomor_ponsel }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" cols="30" rows="10" placeholder="masukan alamat">{{ $mitra->mitra->alamat }}</textarea>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <a href="{{ Auth::user()->roles == 'admin' ? route('admin.mitra.index') : route('pegawai.mitra.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="gambar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gambar sekarang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ asset(Str::replace($baseURL . '/images/profil/', '','/images/profil/' . $mitra->mitra->gambar)) }}" width="100%"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
