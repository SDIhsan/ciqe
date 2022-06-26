<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Add Qurban
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= site_url('qurban') ?>" class="btn btn-sm btn-danger btn-icon-split">
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
                    <label class="col-md-5 text-md-right" for="kelompok_id">Kelompok</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="kelompok_id" id="kelompok_id" class="custom-select">
                                <option value="" selected disabled>Pilih Kelompok / Seorang</option>
                                <!-- <?php foreach ($barang as $b) : ?> -->
                                    <!-- <option value="<?= $b['qurban_kelompok'] ?>"><?= $b['qurban_shohibul'] ?></option> -->
                                <!-- <?php endforeach; ?> -->
                            </select>
                        </div>
                        <?= form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-5 text-md-right" for="tanggal">Status Penyembelihan Qurban</label>
                    <div class="col-md-5">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelectPenyembelihan">Options</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelectPenyembelihan">
                                <option value="" selected>Belum Selesai</option>
                                <option value="1">Sudah Selesai</option>
                            </select>
                        </div>
                        <!-- <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" name="sembelih" id="sembelih" type="text" class="form-control date" placeholder="Tanggal Masuk...">
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?> -->
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-5 text-md-right" for="tanggal">Status Pengeletan Qurban</label>
                    <div class="col-md-5">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelectPengeletan">Options</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelectPengeletan">
                                <option value="" selected>Belum Selesai</option>
                                <option value="1">Sudah Selesai</option>
                            </select>
                        </div>
                        <!-- <input value="<?= set_value('tanggal', date('Y-m-d')); ?>" name="sembelih" id="sembelih" type="text" class="form-control date" placeholder="Tanggal Masuk...">
                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?> -->
                    </div>
                </div>
                <hr>
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