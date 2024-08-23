@foreach ($lokasi as $item)
    @isset($item->id)
        <div class="modal fade" id="delete-lokasi-{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus lokasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.lokasi.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <p>Apakah kamu ingin menghapus lokasi <b>{{ $item->nama }} ?</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endisset
@endforeach
