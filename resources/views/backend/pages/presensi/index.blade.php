@extends('backend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush
@section('title', 'presensi')
@section('content')
    @include('sweetalert::alert')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Presensi /</span>
            index
        </h4>
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top text-center" id="tabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>program</th>
                            <th>gambar</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($presensi as $item)
                            {{-- SELEKSI WAKTU MULAI DAN WAKTU SELESAI --}}
                            @php
                                $now = \Carbon\Carbon::now();
                                $waktuMulai = \Carbon\Carbon::parse($item->program->kegiatan->waktu_mulai);
                                $waktuSelesai = \Carbon\Carbon::parse($item->program->kegiatan->waktu_selesai);
                            @endphp
                            {{-- END --}}

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Str::limit($item->program->nama, 20) }}</td>
                                <td> <img
                                        src="{{ asset(Str::replace(url('/') . '/images/presensi/', '', '/images/presensi/' . $item->gambar)) }}"
                                        width="50px" height="50px" alt=""></td>
                                <td>
                                    @if ($item->status == 'hadir')
                                        <span class="text-success">
                                            hadir
                                        </span>
                                    @elseif ($item->status == 'tidak hadir')
                                        <span class="text-danger">
                                            tidak setuju
                                        </span>
                                    @else
                                        <span class="text-secondary">
                                            kosong!
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == null)
                                        @if ($now->between($waktuMulai, $waktuSelesai))
                                            <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#presensi-modal-{{ $item->id }}"
                                                title="Presensi/presensi-modal-{{ $item->id }}">
                                                <i class='bx bxs-camera'></i>
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#presensi-modal-{{ $item->id }}"
                                                title="Presensi/presensi-modal-{{ $item->id }}" disabled>
                                                <i class='bx bxs-camera'></i>
                                            </button>
                                        @endif
                                    @else
                                        <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                                            data-bs-target="#show-modal-{{ $item->id }}" title="Detail">
                                            <i class='bx bxs-show'></i>
                                        </button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @include('backend.pages.presensi.modal')
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
            $('#tabel').DataTable({
                // Scroll options
                "pageLength": 10,
                scrollX: true,
            });
        });
    </script>
@endpush
