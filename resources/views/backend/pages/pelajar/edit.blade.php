@extends('backend.base')

@section('title', 'pelajar')
@section('content')
@include('sweetalert::alert')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Pelajar /</span>
            {{$pelajar->id}}/edit
        </h4>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ Auth::user()->roles == 'admin' ? route('admin.pelajar.update', $pelajar->id) : route('pegawai.pelajar.update',$pelajar->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">username</label>
                                        <input type="text" name="username" class="form-control" placeholder="masukan username"
                                            value="{{ $pelajar->username }}" required>
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
                                        <input type="text" name="nama" class="form-control" placeholder="masukan nama pelajar"
                                            value="{{ $pelajar->pelajar->nama }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">nomor ponsel</label>
                                        <input type="text" name="nomor_ponsel" class="form-control" placeholder="masukan nomor ponsel"
                                            value="{{ $pelajar->pelajar->nomor_ponsel }}" required>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <a href="{{ Auth::user()->roles == 'admin' ? route('admin.pelajar.index') : route('pegawai.mitra.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
