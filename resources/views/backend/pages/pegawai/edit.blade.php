@extends('backend.base')

@section('title', 'pegawai')
@section('content')
    @php
        $baseURL = url('/');
    @endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Pegawai /</span>
            {{$pegawai->pegawai->id}}/edit
        </h4>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <form action="{{ route('admin.pegawai.update',$pegawai->id) }}" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="masukan username" value="{{$pegawai->username}}"
                                            autofocus />
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama pegawai</label>
                                        <input type="text" name="nama" class="form-control" placeholder="masukan nama pegawai"
                                            value="{{ $pegawai->pegawai->nama }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" aria-label="Multiple select example" name="jenis_kelamin">
                                            <option value="" selected>silahkan pilih</option>
                                            <option value="pria" {{$pegawai->pegawai->jenis_kelamin == 'pria' ? 'selected' : ''}}>pria</option>
                                            <option value="wanita" {{$pegawai->pegawai->jenis_kelamin == 'wanita' ? 'selected' : ''}}>wanita</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label">nomor ponsel</label>
                                        <input type="tel" name="nomor_ponsel" class="form-control" placeholder="masukan nomor ponsel"
                                            value="{{ $pegawai->pegawai->nomor_ponsel }}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Gambar Pegawai</label>
                                        <input type="file" name="gambar" class="form-control mb-2" >
                                            <button class="btn btn-primary btn-sm align-items-center" type="button"
                                            data-bs-toggle="modal" data-bs-target="#gambar">
                                            <span>
                                                Gambar sekarang
                                            </span>
                                        </button>
                                    </div>
                                    <div>
                                        <label class="form-label">alamat</label>
                                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{$pegawai->pegawai->alamat}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('admin.pegawai.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
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
                            <img src="{{ asset(Str::replace($baseURL . '/images/profil/', '', '/images/profil/' . $pegawai->pegawai->gambar)) }}" width="100%"
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
