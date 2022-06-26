<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Add Distribusi
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= site_url('distribusi') ?>" class="btn btn-sm btn-danger btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="ket">Keterangan</label>
                    <div class="col-md-5">
                        <input value="" name="ket" id="ket" type="text" class="form-control" placeholder="Keterangan...">
                        <?= form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="jumlah">Jumlah</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input value="" name="jumlah" id="jumlah" type="number" class="form-control" placeholder="Jumlah...">
                        </div>
                        <?= form_error('volume', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col offset-md-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>