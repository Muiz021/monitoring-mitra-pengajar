@php
    use Carbon\Carbon;
@endphp

{{-- penilaian kinerja mitra --}}
@foreach ($analisis_kinerja as $item)
    <div class="modal fade" id="penilaian-kinerja-{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Penilaian kinerja mitra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form
                    action="{{ route(Auth::user()->roles == 'admin' ? 'admin.kinerja-mitra.update' : 'pegawai.kinerja-mitra.update', $item->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="mb-3">
                            <small class="fs-4 fw-semibold d-block">1. Bagaimana kompetensi kerja yang dimiliki oleh mitra pengajar?</small>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="kompetensi_kerja" value="5" {{$item->kompetensi_kerja == 5 ? 'checked' : ''}}>
                                <label class="form-check-label" >Sangat bagus</label>

                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kompetensi_kerja" value="4" {{$item->kompetensi_kerja == 4 ? 'checked' : ''}}>
                                <label class="form-check-label" >Bagus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kompetensi_kerja" value="3" {{$item->kompetensi_kerja == 3 ? 'checked' : ''}}>
                                <label class="form-check-label" >Netral</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kompetensi_kerja" value="2" {{$item->kompetensi_kerja == 2 ? 'checked' : ''}}>
                                <label class="form-check-label" >Tidak bagus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kompetensi_kerja" value="1" {{$item->kompetensi_kerja == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" >Sangat tidak bagus</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small class="fs-4 fw-semibold d-block">2. Bagaimana komunikasi kerja yang dimiliki oleh mitra pengajar?</small>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="komunikasi_kerja" value="5" {{$item->komunikasi_kerja == 5 ? 'checked' : ''}}>
                                <label class="form-check-label" >Sangat bagus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="komunikasi_kerja" value="4" {{$item->komunikasi_kerja == 4 ? 'checked' : ''}}>
                                <label class="form-check-label" >Bagus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="komunikasi_kerja" value="3" {{$item->komunikasi_kerja == 3 ? 'checked' : ''}}>
                                <label class="form-check-label" >Netral</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="komunikasi_kerja" value="2" {{$item->komunikasi_kerja == 2 ? 'checked' : ''}}>
                                <label class="form-check-label" >Tidak bagus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="komunikasi_kerja" value="1" {{$item->komunikasi_kerja == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" >Sangat tidak bagus</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small class="fs-4 fw-semibold d-block">3. Bagaimana inisiatif kerja yang dimiliki oleh mitra pengajar?</small>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="inisiatif_kerja" value="5" {{$item->inisiatif_kerja == 5 ? 'checked' : ''}}>
                                <label class="form-check-label" >Sangat bagus</label>

                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inisiatif_kerja" value="4" {{$item->inisiatif_kerja == 4 ? 'checked' : ''}}>
                                <label class="form-check-label" >Bagus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inisiatif_kerja" value="3" {{$item->inisiatif_kerja == 3 ? 'checked' : ''}}>
                                <label class="form-check-label" >Netral</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inisiatif_kerja" value="2" {{$item->inisiatif_kerja == 2 ? 'checked' : ''}}>
                                <label class="form-check-label" >Tidak bagus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inisiatif_kerja" value="1" {{$item->inisiatif_kerja == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" >Sangat tidak bagus</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small class="fs-4 fw-semibold d-block">4. Bagaimana kualitas kerja yang dimiliki oleh mitra pengajar?</small>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="kualitas_kerja" value="5" {{$item->kualitas_kerja == 5 ? 'checked' : ''}}>
                                <label class="form-check-label" >Sangat bagus</label>

                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kualitas_kerja" value="4" {{$item->kualitas_kerja == 4 ? 'checked' : ''}}>
                                <label class="form-check-label" >Bagus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kualitas_kerja" value="3" {{$item->kualitas_kerja == 3 ? 'checked' : ''}}>
                                <label class="form-check-label" >Netral</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kualitas_kerja" value="2" {{$item->kualitas_kerja == 2 ? 'checked' : ''}}>
                                <label class="form-check-label" >Tidak bagus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="kualitas_kerja" value="1" {{$item->kualitas_kerja == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" >Sangat tidak bagus</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <small class="fs-4 fw-semibold d-block">5. Bagaimana sikap dan etika kerja yang dimiliki oleh mitra pengajar?</small>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="sikap_dan_etika_kerja" value="5" {{$item->sikap_dan_etika_kerja == 5 ? 'checked' : ''}}>
                                <label class="form-check-label" >Sangat bagus</label>

                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sikap_dan_etika_kerja" value="4" {{$item->sikap_dan_etika_kerja == 4 ? 'checked' : ''}}>
                                <label class="form-check-label" >Bagus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sikap_dan_etika_kerja" value="3" {{$item->sikap_dan_etika_kerja == 3 ? 'checked' : ''}}>
                                <label class="form-check-label" >Netral</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sikap_dan_etika_kerja" value="2" {{$item->sikap_dan_etika_kerja == 2 ? 'checked' : ''}}>
                                <label class="form-check-label" >Tidak bagus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sikap_dan_etika_kerja" value="1" {{$item->sikap_dan_etika_kerja == 1 ? 'checked' : ''}}>
                                <label class="form-check-label" >Sangat tidak bagus</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
{{-- end penilaian kinerja mitra --}}

