@extends('backend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush
@section('title', 'kusioner')
@section('content')
    @include('sweetalert::alert')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Kusioner /</span>
            program
        </h4>
        <div class="card">
            <div class="card-header flex-column flex-md-row">
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top text-center" id="kusioner">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>nama</th>
                            <th>mitra</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        // Simpan ID program yang sudah diperiksa di luar loop
                        $checkedIds = [];
                    @endphp

                    @foreach ($program as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Str::limit($item->kode_program) }}</td>
                            <td>{{ Str::limit($item->nama) }}</td>
                            <td>{{ Str::limit($item->mitra->nama) }}</td>
                            <td class="d-flex justify-content-center">
                                @php
                                    // Jika ID program sudah ada di array checkedIds, lewati
                                    if (in_array($item->id, $checkedIds)) {
                                        continue;
                                    }
                                    // Tambahkan ID program ke array checkedIds
                                    $checkedIds[] = $item->id;
                                @endphp

                                @php
                                    // Menyaring skor berdasarkan ID program yang telah diperiksa
                                    $isChecked = Auth::user()->pelajar->skor->contains('program_id', $item->id);
                                @endphp

                                @if ($isChecked)
                                    <button class="btn btn-sm btn-info text-white mx-1" disabled>
                                        <span>
                                            <i class="bx bx-edit me-sm-2"></i>
                                            <span class="d-none d-sm-inline-block">
                                                kusioner
                                            </span>
                                        </span>
                                    </button>
                                @else
                                    <a href="{{ route('pelajar.kusioner.create', $item->id) }}" class="btn btn-sm btn-success text-white mx-1">
                                        <span>
                                            <i class="bx bx-edit me-sm-2"></i>
                                            <span class="d-none d-sm-inline-block">
                                                kusioner
                                            </span>
                                        </span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
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
            $('#kusioner').DataTable({
                // Scroll options
                "pageLength": 10,
                scrollX: true,
            });
        });
    </script>
@endpush
