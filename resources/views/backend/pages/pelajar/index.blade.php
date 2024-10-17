@extends('backend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush
@section('title', 'pelajar')
@section('content')
@include('sweetalert::alert')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Pelajar /</span>
            index
        </h4>

        <div class="card">

            <div class="card-datatable table-responsive mt-3">
                <table class="datatables-users table border-top text-center" id="kegiatan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelajar as $item)
                            <tr>
                                {{-- {{dd($item->pelajar->nama)}} --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->pelajar->nama }}</td>
                                <td>@if ($item->pelajar->status == true)
                                    <span class="text-success">konfirmasi</span>
                                    @else
                                    <span class="text-warning">belum konfirmasi</span>
                                @endif</td>

                                <td class="d-lg-flex justify-content-center">

                                    <a href="{{ route(Auth::user()->roles == 'admin' ? 'admin.pelajar.show':'pegawai.mitra.show', $item->id) }}" class="btn btn-sm btn-info text-white">
                                        <span>
                                            <i class='bx bxs-show me-sm-2'></i>
                                            <span class="d-none d-sm-inline-block">
                                                show
                                            </span>
                                        </span>
                                    </a>
                                    <a href="{{ route(Auth::user()->roles == 'admin' ? 'admin.pelajar.edit':'pegawai.mitra.edit', $item->id) }}"
                                        class="btn btn-sm btn-success text-white mx-1 my-1 my-lg-0">
                                        <span>
                                            <i class="bx bx-edit me-sm-2"></i>
                                            <span class="d-none d-sm-inline-block">
                                                edit
                                            </span>
                                        </span>
                                    </a>
                                    <button class="btn btn-danger btn-sm align-items-center" type="button"
                                        data-bs-toggle="modal" data-bs-target="#delete-pelajar-{{ $item->id }}"><span><i
                                                class="bx bx-trash me-sm-2"></i> <span
                                                class="d-none d-sm-inline-block">delete</span></span>
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('backend.pages.pelajar.modal')
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
