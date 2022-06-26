<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Qurban</h1>
    <?= $this->session->flashdata('message'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        <?php date_default_timezone_set("Asia/Jakarta"); ?>
                        Data Qurban 
                        <!-- <?= date('Y-m-d H:i:s P'); ?> -->
                    </h4>
                </div>
                <div class="col-auto">
                    <a class="btn btn-sm btn-primary btn-icon-split"  data-toggle="modal" data-target="#exampleModalCenter">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Add Kelompok
                        </span>
                    </a>
                </div>
            </div>            
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Form Add Shohibul</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= site_url('qurban/add'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Jenis</span>
                                </div>
                                <select name="status" id="status" class="custom-select">
                                    <option value="" selected>Pilih Kelompok / Pribadi ?</option>
                                    <option value="Kelompok">Kelompok</option>
                                    <option value="Pribadi">Pribadi</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nama</span>
                                </div>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Kelompok</th>
                            <th>Shohibul</th>
                            <th>Penyembelihan</th>
                            <th>Pengeletan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($qurban) :
                            foreach ($qurban as $q) :
                        ?>
                        <tr>
                            <td scope="row"><?= $no++; ?></td>
                            <td><?= $q['qurban_status'] . ' ' . $q['qurban_nomor']; ?></td>
                            <td><?= $q['qurban_shohibul']; ?></td>
                            <td>
                            <?php if($q['qurban_sembelih'] == null) { 
                                echo 'Belum';
                            } else {
                                echo date_format(new DateTime($q['qurban_sembelih']), 'H:i:s');
                            }; ?>
                            </td>
                            <td>
                            <?php if($q['qurban_pengeletan'] == null) { 
                                echo 'Belum';
                            } else {
                                echo $q['qurban_pengeletan'];
                            }; ?>
                            </td>
                            <td>
                                <div class="form-button-action">
                                    <a data-toggle="modal" data-target="#editQurban<?= $q['qurban_id'] ?>" title="" class="btn btn-link btn-warning" data-original-title="Edit <?= $q['qurban_status'] ?>">
                                        <i class="fa fa-fw text-success fa-edit"></i>
                                    </a>
                                    <div class="modal fade" id="editQurban<?= $q['qurban_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <div class="card shadow-sm border-bottom-primary">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Shohibul</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= site_url('qurban/edit/') . $q['qurban_id']; ?>" method="POST">
                                                                <div class="row form-group">
                                                                    <label class="col-md-3 text-md-right" for="status">Jenis Status</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group">
                                                                            <select name="status" id="status" class="custom-select">
                                                                                <option value="Kelompok" <?php if($q['qurban_status'] =='Kelompok') { echo 'selected'; } ?>>Kelompok</option>
                                                                                <option value="Pribadi" <?php if($q['qurban_status'] == 'Pribadi') { echo 'selected'; } ?>>Pribadi</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <label class="col-md-3 text-md-right" for="nomor">Nomor</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group">
                                                                            <input type="number" min=0 name="nomor" value="<?= $q['qurban_nomor']; ?>" class="form-control" placeholder="Nomor" aria-label="Nomor" aria-describedby="basic-addon1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <label class="col-md-3 text-md-right" for="nama">Nama</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="nama" value="<?= $q['qurban_shohibul']; ?>" class="form-control" placeholder="Nama" aria-label="Nama" aria-describedby="basic-addon1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-9 offset-md-3">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a data-toggle="modal" data-target="#UpdateStatusPenyembelihan<?= $q['qurban_id'] ?>" title="" class="btn btn-link btn-success" data-original-title="Update <?= $q['qurban_status'] ?>">
                                        <i class="fa fa-fw text-danger fa-edit"></i>
                                    </a>
                                    <div class="modal fade" id="UpdateStatusPenyembelihan<?= $q['qurban_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <div class="card shadow-sm border-bottom-primary">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Form Update Status Penyembelihan Qurban</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= site_url('qurban/updatesembelih/') . $q['qurban_id']; ?>" method="POST">
                                                                <div class="text-center">
                                                                    <h5><b><?= $q['qurban_status'] . ' ' . $q['qurban_nomor'] . ' - ' . $q['qurban_shohibul']; ?></b></h5>
                                                                </div>
                                                                <hr>
                                                                <div class="row form-group">
                                                                    <label class="col-md-6 text-md-right" for="tanggal">Status Penyembelihan Qurban</label>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group mb-3">
                                                                            <select class="custom-select" name="sembelih" id="inputGroupSelectPenyembelihan">
                                                                                <option value="0" <?php if ($q['qurban_sembelih'] == null) { echo 'selected'; } ?>>Belum Selesai</option>
                                                                                <option value="1" <?php if ($q['qurban_sembelih'] != null) { echo 'selected'; } ?>>Sudah Selesai</option>
                                                                            </select>
                                                                        </div>
                                                                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-9 offset-md-3">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a data-toggle="modal" data-target="#UpdateStatusPengeletan<?= $q['qurban_id'] ?>" title="" class="btn btn-link btn-success" data-original-title="Update <?= $q['qurban_status'] ?>">
                                        <i class="fa fa-fw text-danger fa-edit"></i>
                                    </a>
                                    <div class="modal fade" id="UpdateStatusPengeletan<?= $q['qurban_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <div class="card shadow-sm border-bottom-primary">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Form Update Status Pengeletan Qurban</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= site_url('qurban/updatepengeletan/') . $q['qurban_id']; ?>" method="POST">
                                                                <div class="text-center">
                                                                    <h5><b><?= $q['qurban_status'] . ' ' . $q['qurban_nomor'] . ' - ' . $q['qurban_shohibul']; ?></b></h5>
                                                                </div>
                                                                <hr>
                                                                <div class="row form-group">
                                                                    <label class="col-md-6 text-md-right" for="tanggal">Status Pengeletan Qurban</label>
                                                                    <div class="col-md-6">
                                                                        <div class="input-group mb-3">
                                                                            <select class="custom-select" name="pengeletan" id="inputGroupSelectPengeletan">
                                                                                <option value="0" <?php if ($q['qurban_pengeletan'] == null) { echo 'selected'; } ?>>Belum Selesai</option>
                                                                                <option value="1" <?php if ($q['qurban_pengeletan'] != null) { echo 'selected'; } ?>>Sudah Selesai</option>
                                                                            </select>
                                                                        </div>
                                                                        <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <div class="col-md-9 offset-md-3">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a onclick="return confirm('Yakin ingin hapus?')"  href="<?= base_url('qurban/delete/') . $q['qurban_id'] ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove <?= $q['qurban_status']; ?>">
                                        <i class="fa fa-fw text-warning fa-times"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php
                            endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->