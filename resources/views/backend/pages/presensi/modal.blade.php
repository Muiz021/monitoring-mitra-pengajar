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
                                        style="padding:5px; border:1px solid; background:#ccc;">Gambar yang Anda ambil akan
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
