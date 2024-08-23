@foreach ($kriteria as $item)
    @isset($item->id)
        <div class="modal fade" id="delete-kriteria-{{ $item->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus kriteria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.kriteria.destroy',$item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <p>Apakah kamu ingin menghapus kriteria <b>{{ $item->name }} ?</b></p>
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
