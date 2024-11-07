@extends('backend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
@endpush
@section('title', 'kinerja mitra')
@section('content')
    @include('sweetalert::alert')

    @php
        use Carbon\Carbon;
    @endphp
    @if (Auth::user()->roles == 'admin' || Auth::user()->roles == 'pegawai')
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Kinerja Mitra /</span>
                index
            </h4>

            <div class="card">
                <div class="card-datatable table-responsive">
                    <table class="datatables-users table border-top text-center" id="kinerja-mitra">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama mitra</th>
                                <th>Kinerja</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sortedMitraWithScores as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['nama'] }}</td>
                                    <td>{{ $item['skor_akhir'] }}%</td>
                                    @php
                                        $total_kinerja = $item['skor_akhir'];
                                    @endphp
                                    <td>
                                        @if ($total_kinerja < 40)
                                            <span class="text-danger">Perlu peningkatan</span>
                                        @elseif ($total_kinerja >= 40 && $total_kinerja < 60)
                                            <span class="text-info">Cukup</span>
                                        @elseif ($total_kinerja >= 60 && $total_kinerja < 80)
                                            <span class="text-primary">Baik</span>
                                        @elseif ($total_kinerja >= 80 && $total_kinerja <= 100)
                                            <span class="text-success">Sangat Baik</span>
                                        @endif
                                    </td>
{{--
                                    <td class="d-lg-flex flex-column">
                                        <button class="btn btn-primary btn-sm align-items-center" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#penilaian-kinerja-{{ $item->id }}"><span><i
                                                    class="bx bx-edit me-sm-2"></i> <span
                                                    class="d-none d-sm-inline-block">penilaian kinerja</span></span>
                                        </button>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Kegiatan /</span>
                index
            </h4>

            <div class="card">
                <div class="card-header flex-column flex-md-row">
                </div>
                <div class="card-datatable table-responsive">
                    <table class="datatables-users table border-top text-center" id="kegiatan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>kode kegiatan</th>
                                <th>lokasi</th>
                                <th>Nama</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_kegiatan }}</td>
                                    <td>{{ $item->lokasi->nama }}</td>
                                    <td>{{ Str::limit($item->nama, 20) }}</td>
                                    <td>{{ Carbon::parse($item->waktu_mulai)->isoFormat('dddd, DD MMMM YYYY [Jam] HH:mm') }}
                                    </td>
                                    <td>{{ Carbon::parse($item->waktu_selesai)->isoFormat('dddd, DD MMMM YYYY [Jam] HH:mm') }}
                                    </td>
                                    <td class="d-lg-flex flex-column">
                                        <a href="{{ route('mitra.kegiatan.show', $item->id) }}"
                                            class="btn btn-sm btn-info text-white">
                                            <span>
                                                <i class='bx bxs-info-circle me-sm-2'></i>
                                                <span class="d-none d-sm-inline-block">
                                                    detail kegiatan
                                                </span>
                                            </span>
                                        </a>

                                        {{-- <button class="btn btn-danger btn-sm align-items-center" type="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#delete-kegiatan-{{ $item->id }}"><span><i
                                                class="bx bx-trash me-sm-2"></i> <span
                                                class="d-none d-sm-inline-block">delete</span></span>
                                    </button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
    {{-- @include('backend.pages.kinerja_mitra.modal') --}}

@endsection

@push('script')
    <script src="{{ asset('backend/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#kinerja-mitra').DataTable({
                // Scroll options
                "pageLength": 10,
                scrollX: true,
            });
        });
    </script>
@endpush
