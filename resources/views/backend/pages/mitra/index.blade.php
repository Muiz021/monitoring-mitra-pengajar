@extends('backend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush
@section('title', 'mitra')
@section('content')
@include('sweetalert::alert')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Mitra /</span>
            index
        </h4>

        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="text-end pt-3 pt-md-0">
                    <a href="{{ route('admin.mitra.create') }}" class="btn btn-primary">
                        <span><i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">Tambah
                                Mitra</span></span>
                    </a>
                </div>
            </div>
            <div class="card-datatable table-responsive mt-3">
                <table class="datatables-users table border-top text-center" id="kegiatan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>jenis kelamin</th>
                            <th>mata pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mitra as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->mitra->nama }}</td>
                                <td>{{ $item->mitra->jenis_kelamin }}</td>
                                <td>{{ $item->mitra->mata_pelajaran }}</td>

                                <td class="d-lg-flex justify-content-center">

                                    <a href="{{ route(Auth::user()->roles == 'admin' ? 'admin.mitra.show':'pegawai.mitra.show', $item->id) }}" class="btn btn-sm btn-info text-white">
                                        <span>
                                            <i class='bx bxs-show me-sm-2'></i>
                                            <span class="d-none d-sm-inline-block">
                                                show
                                            </span>
                                        </span>
                                    </a>
                                    <a href="{{ route(Auth::user()->roles == 'admin' ? 'admin.mitra.edit':'pegawai.mitra.edit', $item->id) }}"
                                        class="btn btn-sm btn-success text-white mx-1 my-1 my-lg-0">
                                        <span>
                                            <i class="bx bx-edit me-sm-2"></i>
                                            <span class="d-none d-sm-inline-block">
                                                edit
                                            </span>
                                        </span>
                                    </a>
                                    <button class="btn btn-danger btn-sm align-items-center" type="button"
                                        data-bs-toggle="modal" data-bs-target="#delete-mitra-{{ $item->id }}"><span><i
                                                class="bx bx-trash me-sm-2"></i> <span
                                                class="d-none d-sm-inline-block">delete</span></span>
                                    </button>

                                    {{-- @if ($item->mitra->status == 0)
                                    <a href="{{ route(Auth::user()->roles == 'admin' ? 'admin.mitra.konfirmasi':'pegawai.mitra.konfirmasi', $item->id) }}"
                                        class="btn btn-sm btn-secondary text-white mx-1 my-1 my-lg-0">
                                        <span>
                                            <i class='bx bx-check me-sm-2'></i>
                                            <span class="d-none d-sm-inline-block">
                                                konfirmasi
                                            </span>
                                        </span>
                                    </a>
                                    @endif --}}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('backend.pages.mitra.modal')
        </div>
    </div>
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
