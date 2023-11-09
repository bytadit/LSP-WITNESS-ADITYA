<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
{{--                        breadcrumb untuk navigasi halaman--}}
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('mahasiswa.index')}}">Halaman Admin</a></li>
                            <li class="breadcrumb-item active">
                                @yield('title')
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
{{--                    styling untuk statistik data total mahasiswa, jumlah mhs pria dan jumlah mhs wanita--}}
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$mahasiswas->count()}}</h3>
                                <p>Total Mahasiswa</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{$mahasiswas->where('gender', 1)->count()}}</h3>
                                <p>Mahasiswa Pria</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$mahasiswas->where('gender', 2)->count()}}</h3>
                                <p>Mahasiswa Wanita</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Mahasiswa</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
{{--                                table untuk menampilkan data mahasiswa tanpa aksi--}}
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
                                        </tr>
                                        @include('admin.mahasiswa.edit')
                                        @include('admin.mahasiswa.delete')
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
{{--                define script menggunakan javascript untuk mengatur datatable--}}
                <script>
                    $(function () {
                        $("#tableMhs").DataTable({
                            "responsive": true,
                            "lengthChange": true,
                            "autoWidth": true,
                            "order": [[ 1, 'desc' ]]
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

                    });
                </script>
            </div>
        </section>
    </div>
</div>
@include('layouts.script')
</body>
</html>
