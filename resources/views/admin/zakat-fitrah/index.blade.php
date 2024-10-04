@extends('admin.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Zakat Fitrah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Zakat Fitrah</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Zakat Fitrah</h3>

                                <div class="card-tools">
                                    <div class="card-header-form">
                                        <a href="/admin/zakat-fitrah/print" class="btn btn-sm btn-danger"><i class="fas fa-print"></i> Print</a>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#tambah-zakat-fitrah">
                                            <i class="fas fa-plus"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-2">
                                <table class="table table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Jumlah Jiwa</th>
                                            <th>Zakat(liter)</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($zakatFitrah as $item)
                                            <tr>
                                                <td style="width: 3%">{{ $loop->iteration }}</td>
                                                <td style="width: 20%">{{ $item->nama }}</td>
                                                <td style="width: 25%">{{ $item->alamat }}</td>
                                                <td>{{ $item->jumlah_jiwa }}</td>
                                                <td>{{ $item->zakat }} liter</td>
                                                <td>
                                                    <a href="/admin/zakat-fitrah/edit/{{ $item->id }}"
                                                        class="btn btn-sm btn-warning text-white"><i
                                                            class="fas fa-edit"></i> Edit</a>
                                                    <a href="/admin/zakat-fitrah/delete/{{ $item->id }}"
                                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    @include('admin.zakat-fitrah.create')
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        })
    </script>

    <script>
        $(document).ready(function() {
            document.getElementById('jumlah_jiwa').addEventListener('input', function() {
                let jumlahJiwa = this.value;
                let zakat = jumlahJiwa * 3.5; // 3.5 liter per jiwa
                document.getElementById('zakat').value = zakat.toFixed(1); // Menampilkan 1 desimal
            });
        })
    </script>
@endpush
