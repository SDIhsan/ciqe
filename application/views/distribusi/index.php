<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Distribusi</h1>
    <?= $this->session->flashdata('message'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Distribusi
                    </h4>
                </div>
                <div class="col-auto">
                    <a class="btn btn-sm btn-primary btn-icon-split"  data-toggle="modal" data-target="#exampleModalCenter">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Add Distribusi
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
                        <h5 class="modal-title" id="exampleModalCenterTitle">Form Add Distribusi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= site_url('distribusi/add') ?>" method="POST">
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Keterangan</span>
                                </div>
                                <input type="text" name="ket" class="form-control" placeholder="Keterangan" aria-label="Keterangan" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon2">Jumlah</span>
                                </div>
                                <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" aria-label="Jumlah" aria-describedby="basic-addon2">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
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
                            <th>No.</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
                        <?php
                        $no = 1;
                        if ($distribusi) :
                            foreach ($distribusi as $d) :
                        ?>
                        <tr>
                            <td><?=$no++; ?></td>
                            <td><?= $d['distribusi_ket']; ?></td>
                            <td><?= $d['distribusi_jumlah']; ?></td>
                            <td>
                                <div class="form-button-action">
                                    <a data-toggle="modal" data-target="#Update<?= $d['distribusi_id'] ?>" title="" class="btn btn-link btn-success" data-original-title="Update <?= $d['distribusi_ket'] ?>">
                                        <i class="fa fa-fw text-danger fa-edit"></i>
                                    </a>
                                    <div class="modal fade" id="Update<?= $d['distribusi_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <div class="card shadow-sm border-bottom-primary">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Form Update Status Qurban</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= site_url('distribusi/update/') . $d['distribusi_id']; ?>" method="POST">
                                                                <div class="row form-group">
                                                                    <label class="col-md-3 text-md-right" for="ket">Keterangan</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group">
                                                                            <input type="text" name="ket" value="<?= $d['distribusi_ket']; ?>" class="form-control" placeholder="Keterangan" aria-label="Keterangan" aria-describedby="basic-addon1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row form-group">
                                                                    <label class="col-md-3 text-md-right" for="jumlah">Jumlah</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group">
                                                                            <input type="number" name="jumlah" min=0 value="<?= $d['distribusi_jumlah']; ?>" class="form-control" placeholder="Jumlah" aria-label="Jumlah" aria-describedby="basic-addon2">
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
                                    <a onclick="return confirm('Yakin ingin hapus?')"  href="<?= base_url('distribusi/delete/') . $d['distribusi_id'] ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove <?= $d['distribusi_ket']; ?>">
                                        <i class="fa fa-fw text-warning fa-times"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->