@extends('backend.base')

@section('title', 'kusioner')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Kusioner /</span>
            create
        </h4>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">

                    <div class="card-body">
                        <form
                            action="{{ route('pelajar.kusioner.store') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf

                            @foreach ($pertanyaan as $item)
                            <div class="mb-3">
                                <label class="form-label">{{$loop->iteration}}. {{$item->question}}</label>
                                <div>
                                    @php
                                        $labels = [
                                            1 => 'Sangat Tidak Setuju',
                                            2 => 'Tidak Setuju',
                                            3 => 'Netral',
                                            4 => 'Setuju',
                                            5 => 'Sangat Setuju'
                                        ];
                                    @endphp
                                    @for ($i = 5; $i >= 1; $i--)
                                        <div>
                                            <label>
                                                <input type="radio" name="skor[{{$loop->index}}]" value="{{ $i }}" {{ old('ratings.' . $loop->index) == $i ? 'checked' : '' }}>
                                                {{ $labels[$i] }}
                                            </label>
                                        </div>
                                    @endfor

                                    <input type="hidden" name="question_id[{{$loop->index}}]" value="{{ $item->id }}">
                                    <input type="hidden" name="mitra_id" value="{{ $program->mitra_id }}">
                                    <input type="hidden" name="program_id" value="{{ $program->id  }}">
                                    <input type="hidden" name="pelajar_id" value="{{ Auth::user()->pelajar->id  }}">

                                </div>
                            </div>
                        @endforeach


                            <div>
                                <a href="{{ route('admin.kriteria.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
