@extends('backend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush
@section('title', 'kriteria')
@section('content')
@include('sweetalert::alert')

@php
use App\Models\Kriteria;
    $total_kriteria = Kriteria::sum('weight');
@endphp
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Kriteria /</span>
            index
        </h4>
        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="text-end pt-3 pt-md-0">
                    @if ($total_kriteria == 100)
                    @else
                    <a href="{{ route(Auth::user()->roles == 'admin' ? 'admin.kriteria.create' : 'pegawai.lokasi.create') }}" class="btn btn-primary">
                        <span><i class="bx bx-plus me-sm-2"></i><span class="d-none d-sm-inline-block">Tambah
                                Kriteria</span></span>
                    </a>
                    @endif
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top text-center" id="kriteria">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Bobot</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriteria as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Str::limit($item->name, 20) }}</td>
                                <td>{{ Str::limit($item->weight, 30) }}</td>
                                <td>@if ($item->is_benefit == 1)
                                    <span>Benefit</span>
                                    @else
                                    <span>Cost</span>
                                @endif</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{route(Auth::user()->roles == 'admin' ? 'admin.kriteria.edit' : 'pegawai.lokasi.edit',$item->id)}}" class="btn btn-sm btn-success text-white mx-1">
                                        <span>
                                            <i class="bx bx-edit me-sm-2"></i>
                                            <span class="d-none d-sm-inline-block">
                                                edit
                                            </span>
                                        </span>
                                    </a>

                                    <button class="btn btn-danger btn-sm align-items-center" type="button"
                                        data-bs-toggle="modal" data-bs-target="#delete-kriteria-{{ $item->id }}"><span><i
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
    @include('backend.pages.kriteria.modal')
@endsection

@push('script')
    <script src="{{ asset('backend/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#kriteria').DataTable({
                // Scroll options
                "pageLength": 10,
                scrollX: true,
            });
        });
    </script>
@endpush
