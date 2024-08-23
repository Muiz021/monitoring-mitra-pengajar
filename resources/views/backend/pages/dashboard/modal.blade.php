@if (Auth::user()->roles == 'admin')
    {{-- presensi --}}
    @foreach ($presensi as $point)
        @isset($point->id)
            <div class="modal fade" id="presensi-modal-{{ $point->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Presensi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('mitra.presensi.update', $point->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 d-flex flex-column justify-content-center">
                                        <!-- Webcam element -->
                                        <div id="my_camera_{{ $point->id }}"></div>
                                        <!-- Button to take snapshot -->
                                        <input type="button" class="btn btn-primary my-3 w-50 mx-auto" value="Ambil Foto"
                                            onClick="take_snapshot('{{ $point->id }}')">
                                        <!-- Display the snapshot -->
                                        <div id="results_{{ $point->id }}" class="text-center"
                                            style="padding:5px; border:1px solid; background:#ccc;">Gambar yang Anda ambil
                                            akan
                                            muncul di sini...</div>
                                        <!-- Hidden input to store the captured image -->
                                        <input type="hidden" name="image" class="image-tag">
                                        <!-- Hidden input to store the ID -->
                                        <input type="hidden" name="id" value="{{ $point->id }}">
                                        <!-- Submit button -->
                                        <button class="btn btn-success mt-3 w-50 mx-auto">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endisset
    @endforeach
    {{-- end presensi --}}

    {{-- show presensi --}}
    @foreach ($presensi as $item)
        @isset($item->id)
            <div class="modal fade" id="show-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Presensi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Gambar</label>
                                        <img src="{{ asset(Str::replace(url('/') . '/images/presensi/', '', '/images/presensi/' . $item->gambar)) }}"
                                            width="100%" alt="">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">status</label>
                                        <input type="text" class="form-control" value="{{ $item->status }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    @endforeach
    {{-- end show presensi --}}
@elseif(Auth::user()->roles == 'mitra')
    {{-- presensi --}}
    @foreach ($presensi as $point)
        @isset($point->id)
            <div class="modal fade" id="presensi-modal-{{ $point->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Presensi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('mitra.presensi.update', $point->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 d-flex flex-column justify-content-center">
                                        <!-- Webcam element -->
                                        <div id="my_camera_{{ $point->id }}"></div>
                                        <!-- Button to take snapshot -->
                                        <input type="button" class="btn btn-primary my-3 w-50 mx-auto" value="Ambil Foto"
                                            onClick="take_snapshot('{{ $point->id }}')">
                                        <!-- Display the snapshot -->
                                        <div id="results_{{ $point->id }}" class="text-center"
                                            style="padding:5px; border:1px solid; background:#ccc;">Gambar yang Anda ambil
                                            akan
                                            muncul di sini...</div>
                                        <!-- Hidden input to store the captured image -->
                                        <input type="hidden" name="image" class="image-tag">
                                        <!-- Hidden input to store the ID -->
                                        <input type="hidden" name="id" value="{{ $point->id }}">
                                        <!-- Submit button -->
                                        <button class="btn btn-success mt-3 w-50 mx-auto">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endisset
    @endforeach
    {{-- end presensi --}}

    {{-- show presensi --}}
    @foreach ($presensi as $item)
        @isset($item->id)
            <div class="modal fade" id="show-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Presensi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Gambar</label>
                                        <img src="{{ asset(Str::replace(url('/') . '/images/presensi/', '', '/images/presensi/' . $item->gambar)) }}"
                                            width="100%" alt="">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">status</label>
                                        <input type="text" class="form-control" value="{{ $item->status }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    @endforeach
    {{-- end show presensi --}}

    {{-- profil mitra --}}
    <div class="modal fade" id="profil-{{ Auth::user()->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ Auth::user()->mitra->gambar != null ? asset(Str::replace(url('/') . '/images/profil/', '', '/images/profil/' . Auth::user()->mitra->gambar)) : asset('backend/assets/img/avatars/1.png') }}"
                            alt="user-avatar" class="d-block rounded" height="100" width="100"
                            id="uploadedAvatar">


                        <div class="button-wrapper">
                            <button class="btn btn-outline-primary align-items-center" type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#profil-update-{{ Auth::user()->id }}"><span>Perbarui Profil</span>
                            </button>
                            <p class="text-muted mb-0">Maksimal size gambar 800KB</p>
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">username</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->username }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">nama</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->mitra->nama }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">nomor ponsel</label>
                                <input type="text" class="form-control"
                                    value="{{ Auth::user()->mitra->nomor_ponsel }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">jenis kelamin</label>
                                <input type="text" class="form-control"
                                    value="{{ Auth::user()->mitra->jenis_kelamin }}" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div>
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" cols="30" rows="10" placeholder="masukan alamat" readonly>{{ Auth::user()->mitra->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end profil mitra --}}

    <div class="modal fade" id="profil-update-{{ Auth::user()->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ Auth::user()->mitra->gambar != null ? asset(Str::replace(url('/') . '/images/profil/', '', '/images/profil/' . Auth::user()->mitra->gambar)) : asset('backend/assets/img/avatars/1.png') }}"
                            alt="user-avatar" class="d-block rounded" height="100" width="100"
                            id="uploadedAvatar">
                    </div>
                </div>
                <hr class="my-0">
                <form action="{{ route('mitra.update.profil', Auth::user()->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="{{ Auth::user()->username }}">
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i
                                                class="bx bx-hide"></i></span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">nama</label>
                                    <input type="text" class="form-control" name="nama"
                                        value="{{ Auth::user()->mitra->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">nomor ponsel</label>
                                    <input type="text" class="form-control" name="nomor_ponsel"
                                        value="{{ Auth::user()->mitra->nomor_ponsel }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">jenis kelamin</label>
                                    <select class="form-select" aria-label="Multiple select example"
                                        name="jenis_kelamin">
                                        <option value="{{ Auth::user()->mitra->jenis_kelamin }}"
                                            {{ Auth::user()->mitra->jenis_kelamin == 'pria' ? 'selected' : '' }}>Pria
                                        </option>
                                        <option value="{{ Auth::user()->mitra->jenis_kelamin }}"
                                            {{ Auth::user()->mitra->jenis_kelamin == 'wanita' ? 'selected' : '' }}>
                                            Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Gambar</label>
                                 <input type="file" class="form-control" name="gambar">
                                </div>
                                <div>
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" cols="30" rows="10" placeholder="masukan alamat" required>{{ Auth::user()->mitra->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-outline-primary"
                            data-bs-dismiss="modal">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@else
    {{-- profil pegawai --}}
    <div class="modal fade" id="profil-{{ Auth::user()->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ Auth::user()->pegawai->gambar != null ? asset(Str::replace(url('/') . '/images/profil/', '', '/images/profil/' . Auth::user()->pegawai->gambar)) : asset('backend/assets/img/avatars/1.png') }}"
                            alt="user-avatar" class="d-block rounded" height="100" width="100"
                            id="uploadedAvatar">


                        <div class="button-wrapper">
                            <button class="btn btn-outline-primary align-items-center" type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#profil-update-{{ Auth::user()->id }}"><span>Perbarui Profil</span>
                            </button>
                            <p class="text-muted mb-0">Maksimal size gambar 800KB</p>
                        </div>
                    </div>
                </div>
                <hr class="my-0">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">username</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->username }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">nama</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->pegawai->nama }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">nomor ponsel</label>
                                <input type="text" class="form-control"
                                    value="{{ Auth::user()->pegawai->nomor_ponsel }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">jenis kelamin</label>
                                <input type="text" class="form-control"
                                    value="{{ Auth::user()->pegawai->jenis_kelamin }}" readonly>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div>
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" cols="30" rows="10" placeholder="masukan alamat" readonly>{{ Auth::user()->pegawai->alamat }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end profil pegawai --}}

    <div class="modal fade" id="profil-update-{{ Auth::user()->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ Auth::user()->pegawai->gambar != null ? asset(Str::replace(url('/') . '/images/profil/', '', '/images/profil/' . Auth::user()->pegawai->gambar)) : asset('backend/assets/img/avatars/1.png') }}"
                            alt="user-avatar" class="d-block rounded" height="100" width="100"
                            id="uploadedAvatar">
                    </div>
                </div>
                <hr class="my-0">
                <form action="{{ route('pegawai.update_profil', Auth::user()->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="{{ Auth::user()->username }}">
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i
                                                class="bx bx-hide"></i></span>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">nama</label>
                                    <input type="text" class="form-control" name="nama"
                                        value="{{ Auth::user()->pegawai->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">nomor ponsel</label>
                                    <input type="text" class="form-control" name="nomor_ponsel"
                                        value="{{ Auth::user()->pegawai->nomor_ponsel }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">jenis kelamin</label>
                                    <select class="form-select" aria-label="Multiple select example"
                                        name="jenis_kelamin">
                                        <option value="{{ Auth::user()->pegawai->jenis_kelamin }}"
                                            {{ Auth::user()->pegawai->jenis_kelamin == 'pria' ? 'selected' : '' }}>Pria
                                        </option>
                                        <option value="{{ Auth::user()->pegawai->jenis_kelamin }}"
                                            {{ Auth::user()->pegawai->jenis_kelamin == 'wanita' ? 'selected' : '' }}>
                                            Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Gambar</label>
                                 <input type="file" class="form-control" name="gambar">
                                </div>
                                <div>
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" cols="30" rows="10" placeholder="masukan alamat" required>{{ Auth::user()->pegawai->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-outline-primary"
                            data-bs-dismiss="modal">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
