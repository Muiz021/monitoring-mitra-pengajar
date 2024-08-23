@extends('backend.base')

@section('title', 'dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang {{ Auth::user()->roles }}</h5>
                                {{-- <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
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
            </div>

            {{-- total --}}
            <div class="col-md-6 col-xl-4">
                <div class="card bg-warning text-white mb-3">
                    <div class="card-header">Jumlah Lokasi</div>
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
                            <h3 class="text-white" style="font-size: 72px">{{ $lokasi }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
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
                            <h3 class="text-white" style="font-size: 72px">{{ $kegiatan }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
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
                            <h3 class="text-white" style="font-size: 72px">{{ $program }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end total --}}

            {{-- chart --}}
            <div class="col-12 my-3">
                <div class="card">
                    <div class="card-body">
                        {!! $kinerjaMitraChart->container() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {!! $userChart->container() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {!! $programChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
        {{-- end xchart --}}

    </div>
    </div>
@endsection
@push('script')
    {{-- chart --}}
    <script src="{{ $kinerjaMitraChart->cdn() }}"></script>

    {{ $kinerjaMitraChart->script() }}

    <script src="{{ $userChart->cdn() }}"></script>

    {{ $userChart->script() }}

    <script src="{{ $programChart->cdn() }}"></script>

    {{ $programChart->script() }}
    {{-- end chart --}}
@endpush
