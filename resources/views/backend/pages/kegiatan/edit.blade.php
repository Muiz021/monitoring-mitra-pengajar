@extends('backend.base')

@section('title', 'kegiatan')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Kegiatan /</span>
            {{$kegiatan->id}}/edit
        </h4>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">

                    <form action="{{route(Auth::user()->roles == 'admin' ? 'admin.kegiatan.update' : 'pegawai.kegiatan.update',$kegiatan->id)}}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Nama Kegiatan</label>
                                <input type="text" name="nama" class="form-control"
                                    placeholder="Masukkan nama kegiatan" value="{{$kegiatan->nama}}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lokasi Kegiatan</label>
                                <select class="form-select" aria-label="Multiple select example" name="lokasi_id">
                                    @foreach ($lokasi as $item)
                                    <option value="{{$item->id}}" {{$kegiatan->lokasi->id == $item->id ? 'selected' : ''}}>{{$item->nama}}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route(Auth::user()->roles == 'admin'? 'admin.kegiatan.index' : 'pegawai.kegiatan.index')}}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
