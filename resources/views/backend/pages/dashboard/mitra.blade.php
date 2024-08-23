@extends('backend.base')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
@endpush

@section('title', 'dashboard')
@section('content')
    @include('sweetalert::alert')
    @php
        use Carbon\Carbon;
    @endphp

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            {{-- profile --}}
            <div class="col-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary mb-md-0 mb-lg-3">Selamat Datang <span
                                        class="text-capitalize">{{ Auth::user()->mitra->nama }}</span> </h5>

                                {{-- <button class="btn btn-sm btn-outline-primary align-items-center" type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#profil-{{ Auth::user()->id }}"><span>Profil</span>
                                </button> --}}
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('backend/assets/img/illustrations/man-with-laptop-light.png') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
                @include('backend.pages.dashboard.modal')
            </div>
            {{-- end profile --}}

            {{-- total kegiatan dan total program --}}
            <div class="col-md-6 col-xl-6">
                <div class="card bg-success text-white mb-3">
                    <div class="card-header">Jumlah Kegiatan</div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24"
                                style="fill: #fff;transform: ;msFilter:;">
                                <path
                                    d="M20 6c0-2.168-3.663-4-8-4S4 3.832 4 6v2c0 2.168 3.663 4 8 4s8-1.832 8-4V6zm-8 13c-4.337 0-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3c0 2.168-3.663 4-8 4z">
                                </path>
                                <path d="M20 10c0 2.168-3.663 4-8 4s-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3z">
                                </path>
                            </svg>
                            <h3 class="text-white" style="font-size: 72px">{{ $kegiatan->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="card bg-primary text-white mb-3">
                    <div class="card-header">Jumlah Program</div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24"
                                style="fill: #fff;transform: ;msFilter:;">
                                <path
                                    d="M20 6c0-2.168-3.663-4-8-4S4 3.832 4 6v2c0 2.168 3.663 4 8 4s8-1.832 8-4V6zm-8 13c-4.337 0-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3c0 2.168-3.663 4-8 4z">
                                </path>
                                <path d="M20 10c0 2.168-3.663 4-8 4s-8-1.832-8-4v3c0 2.168 3.663 4 8 4s8-1.832 8-4v-3z">
                                </path>
                            </svg>
                            <h3 class="text-white" style="font-size: 72px">{{ $program->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end total kegiatan dan total program --}}


            {{-- chart program per kegiatan --}}
            <div class="col-12 mb-4 order-0">
                <div class="card">
                    <div class="card-body">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
            {{-- end chart program per kegiatan --}}
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('backend/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>





    {{-- chart --}}
    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
    {{-- end chart --}}
@endpush
