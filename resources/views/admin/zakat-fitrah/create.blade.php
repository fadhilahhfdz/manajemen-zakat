<div class="modal fade" id="tambah-zakat-fitrah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Zakat Fitrah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/zakat-fitrah/create" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah_jiwa">Jumlah Jiwa:</label>
                                <input type="number" id="jumlah_jiwa" name="jumlah_jiwa" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea name="alamat" cols="5" rows="3" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="zakat">Zakat Yang Dibayarkan:</label>
                            <div class="input-group">
                                <input type="text" id="zakat" name="zakat" class="form-control" readonly>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="">liter(ℓ)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
