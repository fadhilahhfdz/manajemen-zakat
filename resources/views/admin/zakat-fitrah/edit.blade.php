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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Edit Data Zakat Fitrah
                                </h3>
                            </div>
                            <!-- end card header -->
                            <div class="card-body">
                                <form action="/admin/zakat-fitrah/edit/{{ $zakatFitrah->id }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nama">Nama:</label>
                                                <input type="text" name="nama" class="form-control"
                                                    value="{{ $zakatFitrah->nama }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="jumlah_jiwa">Jumlah Jiwa:</label>
                                                <input type="number" id="jumlah_jiwa" name="jumlah_jiwa"
                                                    class="form-control" value="{{ $zakatFitrah->jumlah_jiwa }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="zakat">Zakat Yang Dibayarkan:</label>
                                            <div class="input-group">
                                                <input type="text" id="zakat" name="zakat" class="form-control"
                                                    value="{{ $zakatFitrah->zakat }}" readonly>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="">liter(ℓ)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat:</label>
                                                <textarea name="alamat" cols="5" rows="3" class="form-control" required>{{ $zakatFitrah->alamat }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/admin/zakat-fitrah" class="btn btn-sm btn-outline-secondary"><i
                                            class="fas fa-caret-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-sm btn-primary"><i
                                            class="fab fa-telegram-plane"></i> Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('script')
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
