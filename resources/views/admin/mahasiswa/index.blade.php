{{--Halaman Index Admin untuk menampilkan CRUD Mahasiswa--}}
{{--extend layout main untuk memanggil demua kode di file main--}}
@extends('layouts.main')
{{--menambahkan kode pada section dengan nama content yang ada di file main--}}
@section('content')
    <div class="container-fluid">
        <div class="row">
            <section class="col-12 connectedSortable">
{{--                style untuk pesan yang dikirimkan di masing-masing request--}}
                @if (session('message'))
                    <div class="alert alert-success alert-icon-start alert-dismissible fade show m-3" role="alert">
                        <span class="alert-icon bg-success text-white">
                            <i class="ph-check-circle"></i>
                        </span>
                        <span class="fw-semibold">
                            {{ session('message') }}
                        </span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
{{--                tombol untuk menambahkan data baru--}}
                <button href="" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#myCreate"><i
                        class="ph-plus"></i>
                    Tambah Data +
                </button>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Mahasiswa</h3>
                    </div>
                    <div class="card-body">
{{--                        Table Data Mahasiswa beserta aksi di tiap baris datanya--}}
                        <table id="tableMhs" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <th>Gender</th>
                                <th>Usia</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mahasiswas as $mahasiswa)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$mahasiswa->nim}}</td>
                                    <td>{{$mahasiswa->nama}}</td>
                                    <td>{{$mahasiswa->alamat}}</td>
                                    <td>{{$mahasiswa->tgl_lahir}}</td>
                                    <td>
                                        @if($mahasiswa->gender == 1)
                                            Pria
                                        @elseif($mahasiswa->gender == 2)
                                            Wanita
                                        @endif
                                    </td>
                                    <td>{{$mahasiswa->usia}} Tahun</td>
{{--                                    data aksi, dimana admin dapat mengubah dan menghapus data mahasiswa--}}
                                    <td class="text-center">
                                        <div class="d-inline-flex">
                                            <button data-id="{{ $mahasiswa->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#myEdit{{$mahasiswa->id}}" class="badge bg-warning border-0 mx-1"><i
                                                    class="ph-pencil"></i>Ubah</button>
                                            <button data-id="{{ $mahasiswa->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#myDelete{{$mahasiswa->id}}" class="badge bg-danger border-0 mx-1"><i
                                                    class="ph-trash"></i>Hapus</button>
                                        </div>
                                    </td>
                                </tr>
{{--                                include modal edit dan delete yang memiliki id unik berdasarkan id mahasiswa--}}
                                @include('admin.mahasiswa.edit')
                                @include('admin.mahasiswa.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
{{--            include modal untuk create data mahasiswa--}}
            @include('admin.mahasiswa.create')
        </div>
        </div>
{{--    define script untuk datatable dengan id tableMhs--}}
        <script>
            $(function () {
                $("#tableMhs").DataTable({
                    "responsive": true,
                    "ordering": true,
                    "lengthChange": true,
                    "autoWidth": true,
                    // define attribute untuk mengurutkan table berdasarkan kolom ke 2 (nim) secara descending
                    "order": [[ 1, 'desc' ]],
                    // define attribute untuk menonaktifkan pencarian untuk kolom selain kolom NIM
                    "columnDefs": [
                        { "targets": [1,3,4,5,6], "searchable": false }
                    ],
                    "language": {
                        searchPlaceholder: "Cari Nama"
                    }
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
    </div>
@endsection
