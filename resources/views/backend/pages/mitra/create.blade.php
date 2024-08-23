@extends('backend.base')

@section('title', 'mitra')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Mitra /</span>
            create
        </h4>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <form action="{{ route('admin.mitra.store') }}" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="masukan username" value="{{old('username')}}"
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
                                        <label class="form-label">Nama mitra</label>
                                        <input type="text" name="nama" class="form-control" placeholder="masukan nama pegawai"
                                            value="{{ old('nama') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" aria-label="Multiple select example" name="jenis_kelamin">
                                            <option value="" selected>silahkan pilih</option>
                                            <option value="pria">pria</option>
                                            <option value="wanita">wanita</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="form-label">nomor ponsel</label>
                                        <input type="tel" name="nomor_ponsel" class="form-control" placeholder="masukan nomor ponsel"
                                            value="{{ old('nomor_ponsel') }}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div>
                                        <label class="form-label">mata pelajaran</label>
                                        <input type="tel" name="mata_pelajaran" class="form-control" placeholder="masukan mata pelajaran"
                                            value="{{ old('mata_pelajaran') }}" required>
                                    </div>
                                    <div>
                                        <label class="form-label">alamat</label>
                                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control"></textarea>
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
@endsection
