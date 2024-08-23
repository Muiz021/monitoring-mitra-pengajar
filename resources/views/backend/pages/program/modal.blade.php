@php
    use Carbon\Carbon;
@endphp

<!-- create-->
<div class="modal fade" id="add-program" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah program</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route(Auth::user()->roles == 'admin' ? 'admin.program.store' : 'pegawai.kegiatan.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">
                        <div class="mb-3">
                            <label class="form-label">Nama program</label>
                            <input type="text" name="nama" class="form-control"
                                placeholder="Masukkan nama program" required>
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label">waktu mulai program</label>
                            <input type="datetime-local" name="waktu_mulai" class="form-control"
                                min="{{ Carbon::parse($kegiatan->waktu_mulai)->isoFormat('YYYY-MM-DDTHH:mm') }}"
                                max="{{ Carbon::parse($kegiatan->waktu_selesai)->isoFormat('YYYY-MM-DDTHH:mm') }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">waktu selesai program</label>
                            <input type="datetime-local" class="form-control" name="waktu_selesai"
                                min="{{ Carbon::parse($kegiatan->waktu_mulai)->isoFormat('YYYY-MM-DDTHH:mm') }}"
                                max="{{ Carbon::parse($kegiatan->waktu_selesai)->isoFormat('YYYY-MM-DDTHH:mm') }}"
                                required>
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label">mitra program</label>
                            <select class="form-select" aria-label="Multiple select example" name="mitra_id">
                                @foreach ($mitra as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end create --}}

{{-- edit --}}
@foreach ($program as $item)
    @isset($item->id)
        <div class="modal fade" id="edit-program-{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit program</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route(Auth::user()->roles == 'admin' ? 'admin.program.update' : 'pegawai.program.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label class="form-label">Nama program</label>
                                    <input type="text" name="nama" class="form-control"
                                        placeholder="Masukkan nama program" value="{{ $item->nama }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">waktu mulai program</label>
                                    <input type="datetime-local" name="waktu_mulai" class="form-control"
                                        min="{{ Carbon::parse($kegiatan->waktu_mulai)->isoFormat('YYYY-MM-DDTHH:mm') }}"
                                        max="{{ Carbon::parse($kegiatan->waktu_selesai)->isoFormat('YYYY-MM-DDTHH:mm') }}"
                                        value="{{ $item->waktu_mulai }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">waktu selesai program</label>
                                    <input type="datetime-local" name="waktu_selesai" class="form-control"
                                        min="{{ Carbon::parse($kegiatan->waktu_mulai)->isoFormat('YYYY-MM-DDTHH:mm') }}"
                                        max="{{ Carbon::parse($kegiatan->waktu_selesai)->isoFormat('YYYY-MM-DDTHH:mm') }}"
                                        value="{{ $item->waktu_selesai }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">mitra program</label>
                                    <select class="form-select" aria-label="Multiple select example" name="mitra_id">
                                        @foreach ($mitra as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $data->id == $item->mitra->id ? 'selected' : '' }}>{{ $data->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endisset
@endforeach
{{-- end edit --}}

{{-- delete --}}
@foreach ($program as $item)
    @isset($item->id)
        <div class="modal fade" id="delete-program-{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus program</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route(Auth::user()->roles == 'admin' ? 'admin.program.destroy' : 'pegawai.program.destroy', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <p>Apakah kamu ingin menghapus program <b>{{ $item->kode_program }} ?</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endisset
@endforeach
{{-- end delete --}}

{{-- show --}}
@foreach ($program as $item)
    @isset($item->id)
        <div class="modal fade" id="show-program" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Program</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Nama program</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama program"
                                    value="{{ $item->nama }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">waktu mulai program</label>
                                <input type="datetime-local" class="form-control" value="{{ $item->waktu_mulai }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">waktu selesai program</label>
                                <input type="datetime-local" name="waktu_selesai" class="form-control"
                                    value="{{ $item->waktu_selesai }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">status</label>
                                <input type="text" class="form-control" value="{{ $item->status }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endisset
@endforeach
{{-- end show --}}


{{-- terima program --}}
@foreach ($program as $item)
    @isset($item->id)
        <div class="modal fade" id="terima-modal-{{$item->id}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40%" height="40%"
                                    fill="currentColor" class="bi bi-exclamation-circle mb-3" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path
                                        d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                </svg>
                                <h1 class="mx-3 text-primary text-uppercase">Konfirmasi</h1>
                                <h4 class="text-uppercase">Apakah Anda menerima tawaran untuk mengajar dalam program
                                    <b>{{ $item->nama }} ?</b>
                                </h4>
                                <div class="d-flex justify-content-center gap-2 mt-3 mb-0">
                                    <form action="{{ route('mitra.program.update.menerima.kehadiran', $item->id) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-lg btn-outline-success">Iya</button>
                                    </form>
                                    <form action="{{ route('mitra.program.update.menolak.kehadiran', $item->id) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-lg btn-outline-danger">Tidak</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endisset
@endforeach
{{-- end terima program --}}
