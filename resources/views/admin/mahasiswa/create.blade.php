<!-- Modal untuk Input Data Mahasiswa -->
<div class="modal fade" id="myCreate" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
{{--            judul modal--}}
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Mahasiswa</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" required></button>
            </div>
{{--            badan modal--}}
            <div class="modal-body">
{{--                membuat form dengan method post untuk mengirimkan data pada serve--}}
                <form method="post" enctype="multipart/form-data" action="{{route('mahasiswa.store')}}">
                    @csrf
{{--                    input untuk NIM--}}
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="text" name="nim" class="non-table form-control
{{--                        memberikan style validasi--}}
                        @error('nim')
                            is-invalid
                        @enderror" required>
                    </div>
{{--                    memberikan style validasi--}}
                    @error('nim')
                        <p class="invalid-feedback d-block">{{ $message }}</p>
                    @enderror
{{--                    Input Untuk Nama--}}
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="non-table form-control
                        @error('nama')
                            is-invalid
                        @enderror" required>
                    </div>
                    @error('nama')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                @enderror
{{--                    Input Untuk Alamat--}}
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="non-table form-control
                        @error('alamat')
                            is-invalid
                        @enderror" required>
                    </div>
                    @error('alamat')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                @enderror
{{--                    Input Untuk Tanggal Lahir--}}
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="non-table form-control
                        @error('tgl_lahir')
                            is-invalid
                        @enderror" required>
                    </div>
                    @error('tgl_lahir')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                @enderror
{{--                    Input Untuk Gender--}}
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-select" id="gender" required>
                            <option value="" selected disabled>Pilih Gender</option>
                            <option value="1">Pria</option>
                            <option value="2">Wanita</option>
                        </select>
                    </div>
                    @error('gender')
                    <p class="invalid-feedback d-block">{{ $message }}</p>
                @enderror
            </div>
{{--            Bagian footer modal untuk tombol simpan--}}
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <section>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </section>
            </div>
            </form>
        </div>
    </div>
</div>
