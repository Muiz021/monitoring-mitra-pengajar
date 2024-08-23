@extends('backend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush
@section('title', 'pegawai')
@section('content')
@include('sweetalert::alert')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Pegawai /</span>
            index
        </h4>
        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="text-end pt-3 pt-md-0">
                    <a href="{{ route('admin.pegawai.create') }}" class="btn btn-primary">
                        <span><i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">Tambah
                                Pegawai</span></span>
                    </a>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top text-center" id="tabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>nomor ponsel</th>
                            <th>jenis kelamin</th>
                            <th>alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Str::limit($item->pegawai->nama, 20) }}</td>
                                <td>{{$item->pegawai->nomor_ponsel}}</td>
                                <td>{{$item->pegawai->jenis_kelamin}}</td>
                                <td>{{ Str::limit($item->pegawai->alamat, 30) }}</td>
                                <td class="d-lg-flex justify-content-center">
                                    <a href="{{route('admin.pegawai.show',$item->id)}}" class="btn btn-sm btn-info text-white">
                                        <span>
                                            <i class='bx bxs-show me-sm-2'></i>
                                            <span class="d-none d-sm-inline-block">
                                                Show
                                            </span>
                                        </span>
                                    </a>
                                    <a href="{{route('admin.pegawai.edit',$item->id)}}" class="btn btn-sm btn-success text-white mx-1">
                                        <span>
                                            <i class="bx bx-edit me-sm-2"></i>
                                            <span class="d-none d-sm-inline-block">
                                                edit
                                            </span>
                                        </span>
                                    </a>

                                    <button class="btn btn-danger btn-sm align-items-center" type="button"
                                        data-bs-toggle="modal" data-bs-target="#delete-lokasi-{{ $item->id }}"><span><i
                                                class="bx bx-trash me-sm-2"></i> <span
                                                class="d-none d-sm-inline-block">Delete</span></span>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- @include('backend.pages.lokasi.modal') --}}
@endsection

@push('script')
    <script src="{{ asset('backend/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabel').DataTable({
                // Scroll options
                "pageLength": 10,
                scrollX: true,
            });
        });
    </script>
@endpush
