<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Add Timbang
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= site_url('timbangan') ?>" class="btn btn-sm btn-danger btn-icon-split">
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
                <?= $this->session->flashdata('pesan'); ?>
                <!-- <?= form_open('', [], ['penjualan_id' => $penjualan_id, 'id_user' => $this->session->userdata('login_session')['user']]); ?> -->
                <!-- <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="penjualan_id">ID Transaksi</label>
                    <div class="col-md-4">
                        <input value="<?= $penjualan_id; ?>" type="text" readonly="readonly" class="form-control">
                        <?= form_error('penjualan_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->
                <!-- <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="tanggal">Tanggal</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" name="tanggal" id="tanggal" type="text" class="form-control date" placeholder="Tanggal Masuk...">
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="kelompok_id">Kelompok</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="kelompok_id" id="kelompok_id" class="custom-select">
                                <option value="" selected disabled>Pilih Kelompok / Seorang</option>
                                <!-- <?php foreach ($barang as $b) : ?> -->
                                    <!-- <option value="<?= $b['qurban_kelompok'] ?>"><?= $b['qurban_shohibul'] ?></option> -->
                                <!-- <?php endforeach; ?> -->
                            </select>
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary" id="plus">
                                    <!-- <a class="btn btn-primary" href="<?= site_url('timbangan/add'); ?>"> -->
                                    <i class="fa fa-plus"></i>
                                    <!-- </a> -->
                                </span>
                            </div>
                        </div>
                        <?= form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="ke">Ke</label>
                    <div class="col-md-5">
                        <input readonly="readonly" id="ke" type="number" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="volume_penjualan">Jumlah</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input value="<?= set_value('volume_penjualan'); ?>" name="volume_penjualan" id="volume_penjualan" type="number" class="form-control" placeholder="Jumlah Keluar...">
                            <div class="input-group-append">
                                <span class="input-group-text" id="satuan">Satuan</span>
                            </div>
                        </div>
                        <?= form_error('volume', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <!-- <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="total_stock">Total Stok</label>
                    <div class="col-md-5">
                        <input readonly="readonly" id="total_stock" type="number" class="form-control">
                    </div>
                </div> -->
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