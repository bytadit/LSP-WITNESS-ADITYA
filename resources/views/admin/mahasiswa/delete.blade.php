<!-- Modal untuk menghapus data mahasiswa -->
<div class="modal fade" id="myDelete{{$mahasiswa->id}}" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
{{--            membuat form dengan method post untuk menghapus data berdasarkan id--}}
            <form method="post" action="{{route('mahasiswa.destroy', ['mahasiswa' => $mahasiswa->id])}}" id="form-delete">
                @csrf
{{--                define method delete untuk menghapus data--}}
                @method('delete')
                <div class="modal-body" style="height: 100px; display: flex; align-items: center; justify-content: center;">
                    <h5 class="text-center">Apakah Anda yakin ingin menghapus data mahasiswa?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yakin</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
