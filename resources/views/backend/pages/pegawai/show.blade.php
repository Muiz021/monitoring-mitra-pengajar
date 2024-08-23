@extends('backend.base')

@section('title', 'lokasi')
@section('content')
@php
$baseURL = url('/');
@endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Lokasi /</span>
            {{$lokasi->id}}/show
        </h4>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label w-100">Gambar Lokasi</label>
                            <button class="btn btn-primary btn-sm align-items-center" type="button"
                            data-bs-toggle="modal" data-bs-target="#gambar">
                            <span>
                                Gambar sekarang
                            </span>
                        </button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Lokasi</label>
                            <input type="text" name="nama" class="form-control" placeholder="masukan nama lokasi"
                                value="{{ $lokasi->nama }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Lokasi</label>
                            <textarea class="form-control" name="alamat" cols="30" rows="10" placeholder="masukan alamat" required>{{ $lokasi->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Link Maps</label>
                            <input type="text" name="link_maps" class="form-control" placeholder="masukan link maps"
                                value="{{ $lokasi->link_maps }}" required>
                        </div>
                        <div>
                            <a href="{{route('admin/lokasi.index')}}" class="btn btn-secondary">Kembali</a>
                        </div>
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
                            <img src="{{ asset(Str::replace($baseURL . '/images/lokasi/', '', '/images/lokasi/' . $lokasi->foto)) }}" width="100%"
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
