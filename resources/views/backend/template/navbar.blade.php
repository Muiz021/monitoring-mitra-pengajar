<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        {{-- <div class="navbar-nav align-items-center">
    <div class="nav-item d-flex align-items-center">
      <i class="bx bx-search fs-4 lh-0"></i>
      <input
        type="text"
        class="form-control border-0 shadow-none"
        placeholder="Search..."
        aria-label="Search..."
      />
    </div>
  </div> --}}
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        @if (Auth::user()->roles == 'admin')
                            <img src="{{ asset('backend/assets/img/avatars/1.png') }}" alt
                                class="w-px-40 h-auto rounded-circle" />
                        @elseif(Auth::user()->roles == 'pegawai')
                            <img src="{{ Auth::user()->pegawai->gambar != null ? asset(Str::replace(url('/') . '/images/profil/', '', '/images/profil/' . Auth::user()->pegawai->gambar)) : asset('backend/assets/img/avatars/1.png') }}"
                                alt class="w-px-40 h-auto rounded-circle" />
                        @elseif (Auth::user()->roles == 'pelajar')
                            <img src="{{ asset('backend/assets/img/avatars/1.png') }}" alt
                                class="w-px-40 h-auto rounded-circle" />
                        @else
                            <img src="{{ Auth::user()->mitra->gambar != null ? asset(Str::replace(url('/') . '/images/profil/', '', '/images/profil/' . Auth::user()->mitra->gambar)) : asset('backend/assets/img/avatars/1.png') }}"
                                alt class="w-px-40 h-auto rounded-circle" />
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item"
                            href="
                        @if (Auth::user()->roles == 'admin') {{ route('admin.dashboard') }}
                        @elseif (Auth::user()->roles == 'pegawai')
                        {{ route('pegawai.dashboard') }}
                        @else
                        {{ route('mitra.dashboard') }} @endif
                        ">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        @if (Auth::user()->roles == 'admin')
                                            <img src="{{ asset('backend/assets/img/avatars/1.png') }}" alt
                                                class="w-px-40 h-auto rounded-circle" />
                                        @elseif(Auth::user()->roles == 'pegawai')
                                            <img src="{{ Auth::user()->pegawai->gambar != null ? asset(Str::replace(url('/') . '/images/profil/', '', '/images/profil/' . Auth::user()->pegawai->gambar)) : asset('backend/assets/img/avatars/1.png') }}"
                                                alt class="w-px-40 h-auto rounded-circle" />
                                        @elseif (Auth::user()->roles == 'pelajar')
                                            <img src="{{ asset('backend/assets/img/avatars/1.png') }}" alt
                                                class="w-px-40 h-auto rounded-circle" />
                                        @else
                                            <img src="{{ Auth::user()->mitra->gambar != null ? asset(Str::replace(url('/') . '/images/profil/', '', '/images/profil/' . Auth::user()->mitra->gambar)) : asset('backend/assets/img/avatars/1.png') }}"
                                                alt class="w-px-40 h-auto rounded-circle" />
                                        @endif
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">
                                        @if (Auth::user()->roles == 'admin')
                                            <span class="text-capitalize">
                                                {{ Auth::user()->username }}
                                            </span>
                                        @elseif (Auth::user()->roles == 'pegawai')
                                            <span class="text-capitalize">
                                                {{ Auth::user()->pegawai->nama }}
                                            </span>
                                        @elseif (Auth::user()->roles == 'pelajar')
                                            <span class="text-capitalize">
                                                {{ Auth::user()->pelajar->nama }}
                                            </span>
                                        @else
                                            <span class="text-capitalize">
                                                {{ Auth::user()->mitra->nama }}
                                            </span>
                                        @endif
                                    </span>
                                    <small class="text-muted">{{ Auth::user()->roles }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    @if (Auth::user()->roles != 'pelajar')
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                            <a class="dropdown-item"
                                href="
                            @if (Auth::user()->roles == 'admin') {{ route('admin.dashboard') }}
                            @elseif (Auth::user()->roles == 'pegawai')
                            {{ route('pegawai.dashboard') }}
                            @else
                            {{ route('mitra.dashboard') }} @endif
                            ">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">My Profile</span>
                            </a>
                    </li>
                        @endif
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
