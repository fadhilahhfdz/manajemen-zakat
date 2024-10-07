<div class="modal fade" id="tambah-penerima-zakat">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Penerima Zakat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/penerima-zakat/create" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="zakat_diterima">Zakat Yang Diterima:</label>
                            <div class="input-group">
                                <input type="text" id="zakat_diterima" name="zakat_diterima" class="form-control">
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
                                <textarea name="alamat" cols="5" rows="3" class="form-control" required></textarea>
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
