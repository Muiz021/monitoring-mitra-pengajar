@extends('backend.base')

@section('title', 'mitra')
@section('content')
    @php
        $baseURL = url('/');
    @endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Mitra /</span>
            {{$mitra->id}}/show
        </h4>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">username</label>
                                    <input type="text" name="username" class="form-control"
                                        placeholder="masukan username" value="{{ $mitra->username }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" value="{{ $mitra->mitra->nama }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">jenis kelamin</label>
                                    <input type="text" class="form-control" value="{{ $mitra->mitra->jenis_kelamin }}"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">mata pelajaran</label>
                                    <input type="text" class="form-control" value="{{ $mitra->mitra->mata_pelajaran }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">nomor ponsel</label>
                                    <input type="text" name="nomor_ponsel" class="form-control"
                                        placeholder="masukan mata pelajaran" value="{{ $mitra->mitra->nomor_ponsel }}"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" cols="30" rows="10" placeholder="masukan alamat" readonly>{{ $mitra->mitra->alamat }}</textarea>
                                </div>

                            </div>
                        </div>
                        <div>
                            <a href="{{ route(Auth::user()->roles == 'admin' ? 'admin.mitra.index':'pegawai.mitra.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
