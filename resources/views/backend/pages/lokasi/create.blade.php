@extends('backend.base')

@section('title', 'lokasi')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Lokasi /</span>
            create
        </h4>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">

                    <div class="card-body">
                        <form action="{{Auth::user()->roles == 'admin' ? route('admin.lokasi.store') : route('pegawai.lokasi.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Gambar Lokasi</label>
                                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Lokasi</label>
                                <input type="text" name="nama" class="form-control" placeholder="masukan nama lokasi"
                                    value="{{ old('nama') }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat Lokasi</label>
                                <textarea class="form-control" name="alamat" cols="30" rows="10" placeholder="masukan alamat" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Link Maps</label>
                                <input type="text" name="link_maps" class="form-control" placeholder="masukan link maps"
                                    value="{{ old('link_maps') }}" required>
                            </div>
                            <div>
                                <a href="{{route('admin.lokasi.index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
