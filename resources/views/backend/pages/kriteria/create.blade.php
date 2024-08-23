@extends('backend.base')

@section('title', 'kriteria')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Kriteria /</span>
            create
        </h4>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">

                    <div class="card-body">
                        <form action="{{Auth::user()->roles == 'admin' ? route('admin.kriteria.store') : route('pegawai.lokasi.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="masukan nama kriteria"
                                    value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="weight">Bobot</label>
                                <input type="number" step="0.01" class="form-control" placeholder="masukan nama bobot" id="weight" name="weight" required>
                            </div>

                            <div class="mb-3">
                                <label for="is_benefit">Tipe</label>
                                <select class="form-control" id="is_benefit" name="is_benefit" required>
                                    <option value="1">Benefit</option>
                                    <option value="0">Cost</option>
                                </select>
                            </div>

                            <div>
                                <a href="{{route('admin.kriteria.index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
