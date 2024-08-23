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
                        <form action="{{Auth::user()->roles == 'admin' ? route('admin.pertanyaan.store') : route('pegawai.lokasi.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="criteria_id">Pilih kriteria</label>
                                <select class="form-control" id="kriteria_id" name="kriteria_id" required>
                                    @foreach($kriteria as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="question">Pertanyaan</label>
                                <textarea class="form-control" id="question" name="question" rows="4" required></textarea>
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
