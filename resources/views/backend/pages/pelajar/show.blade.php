@extends('backend.base')

@section('title', 'pelajar')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Pelajar /</span>
            {{$pelajar->id}}/show
        </h4>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">username</label>
                            <input type="text" name="username" class="form-control" placeholder="masukan username"
                                value="{{ $pelajar->username }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="masukan nama pelajar"
                                value="{{ $pelajar->pelajar->nama }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">nomor ponsel</label>
                            <input type="text" name="nomor_ponsel" class="form-control" placeholder="masukan nomor ponsel"
                                value="{{ $pelajar->pelajar->nomor_ponsel }}" disabled>
                        </div>
                        <div>
                            <a href="{{ Auth::user()->roles == 'admin' ? route('admin.pelajar.index') : route('pegawai.mitra.index') }}"
                                class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
