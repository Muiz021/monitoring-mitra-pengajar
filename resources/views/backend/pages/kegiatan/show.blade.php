@extends('backend.base')
@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush

@section('title', 'kegiatan')
@section('content')
    @include('sweetalert::alert')
    @php
        use Carbon\Carbon;
    @endphp
    @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'pegawai')
        <div class="container-xxl container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Kegiatan /</span>
                {{ $kegiatan->id }}/show
            </h4>
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama kegiatan"
                                    value="{{ $kegiatan->nama }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lokasi Kegiatan</label>
                                <input type="text" class="form-control" value="{{ $kegiatan->lokasi->nama }}" readonly>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route(Auth::user()->roles == 'admin' ? 'admin.kegiatan.index' : 'pegawai.kegiatan.index') }}"
                                class="btn btn-secondary">kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Program /</span>
                index
            </h4>
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card">
                        <div class="card-header flex-column flex-md-row">
                            <div class="text-end pt-3 pt-md-0">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#add-program"
                                    class="btn btn-primary">
                                    <span><i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">Tambah
                                            Program</span></span>
                                </button>
                                </button>
                            </div>
                        </div>
                        <div class="card-datatable table-responsive">
                            <table class="datatables-users table border-top text-center" id="tabel">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>kode program</th>
                                        <th>nama program</th>
                                        <th>mitra</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($program as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_program }}</td>
                                            <td>{{ Str::limit($item->nama, 20) }}</td>
                                            <td>{{ Str::limit($item->mitra->nama, 20) }}</td>
                                            <td class="d-flex justify-content-center">
                                                <button class="btn btn-primary btn-sm align-items-center mx-2"
                                                    type="button" data-bs-toggle="modal"
                                                    data-bs-target="#edit-program-{{ $item->id }}"><span> <i
                                                            class="bx bx-edit me-sm-2"></i><span
                                                            class="d-none d-sm-inline-block">edit</span></span>
                                                </button>
                                                <button class="btn btn-danger btn-sm align-items-center" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#delete-program-{{ $item->id }}"><span><i
                                                            class="bx bx-trash me-sm-2"></i> <span
                                                            class="d-none d-sm-inline-block">delete</span></span>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                @include('backend.pages.program.modal')
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-xxl container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Kegiatan /</span>
                {{ $kegiatan->id }}/show
            </h4>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <h5 class="card-header flex-column flex-md-row">
                            Kegiatan
                        </h5>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Nama Kegiatan</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama kegiatan"
                                    value="{{ $kegiatan->nama }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lokasi Kegiatan</label>
                                <input type="text" class="form-control" value="{{ $kegiatan->lokasi->nama }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="card">
                        <h5 class="card-header flex-column flex-md-row">
                            Program
                        </h5>
                        <div class="card-datatable table-responsive">
                            <table class="datatables-users table border-top text-center" id="kegiatan">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>kode Program</th>
                                        <th>Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($program as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_program }}</td>
                                            <td>{{ Str::limit($item->nama, 20) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{-- @include('backend.pages.program.modal') --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('script')
    <script src="{{ asset('backend/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#kegiatan').DataTable({
                // Scroll options
                "pageLength": 10,
                scrollX: true,
            });
        });
    </script>
@endpush
