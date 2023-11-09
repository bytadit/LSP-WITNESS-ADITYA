{{--Modal untuk mengubah data mahasiswa berdasarkan id--}}
<div class="modal fade" id="myEdit{{$mahasiswa->id}}" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
{{--            Judul Modal--}}
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Mahasiswa</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
{{--            Badan Modal--}}
            <div class="modal-body">
{{--                Membuat form untuk mengubah data dengan method post--}}
                <form method="POST" action="{{route('mahasiswa.update', ['mahasiswa' => $mahasiswa->id])}}" id="form_edit">
                    @csrf
{{--                    define method put untuk mengubah data--}}
                    @method('put')
{{--                    Ubah Data NIM--}}
                    <div class="form-group">
                        <label>NIM</label>
                        <input readonly type="text" value="{{$mahasiswa->nim}}" name="nim" class="non-table form-control
                        @error('nim')
                            is-invalid
                        @enderror" required>
                    </div>
{{--                    Validasi Data--}}
                    @error('nim')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
{{--                    Ubah Data Nama--}}
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="{{$mahasiswa->nama}}" class="non-table form-control
                        @error('nama')
                            is-invalid
                        @enderror" required>
                    </div>
                    @error('nama')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
{{--                    Ubah Data Alamat--}}
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" value="{{$mahasiswa->alamat}}" name="alamat" class="non-table form-control
                        @error('alamat')
                            is-invalid
                        @enderror" required>
                    </div>
                    @error('alamat')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
{{--                    Ubah Data Tanggal Lahir--}}
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" value="{{$mahasiswa->tgl_lahir}}" name="tgl_lahir" class="non-table form-control
                        @error('tgl_lahir')
                            is-invalid
                        @enderror" required>
                    </div>
                    @error('tgl_lahir')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
{{--                    Ubah Data Gender--}}
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-select" id="gender" required>
                            <option value="1" {{$mahasiswa->gender == 1 ? 'selected': ''}}>Pria</option>
                            <option value="2" {{$mahasiswa->gender == 2 ? 'selected': ''}}>Wanita</option>
                        </select>
                    </div>
                    @error('gender')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                @enderror
            </div>
{{--            Bagian bawah modal/footer--}}
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
