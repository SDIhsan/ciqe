<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Users</h1>
    <?= $this->session->flashdata('message'); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Users
                    </h4>
                </div>
                <div class="col-auto">
                    <a class="btn btn-sm btn-primary btn-icon-split"  data-toggle="modal" data-target="#exampleModalCenter">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Add Users
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Form Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= site_url('users/add') ?>" method="POST">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Username</span>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Password</span>
                            </div>
                            <input type="password" name="pass" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Level User</span>
                            </div>
                            <select name="level" id="level" class="custom-select">
                                <option value="" selected>Pilih Level User</option>
                                <option value="Admin">Admin</option>
                                <option value="Petugas">Petugas</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
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
                            <th>Username</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if ($user) :
                            foreach ($user as $d) :
                        ?>
                        <tr>
                            <td scope="row"><?=$no++; ?></td>
                            <td><?= $d['user_name']; ?></td>
                            <td><?= $d['user_level']; ?></td>
                            <td>
                                <?php
                                if ($d['user_status'] == 1) {
                                    echo 'Aktif';
                                } else {
                                    echo 'Tidak Aktif';
                                };
                                ?>
                            </td>
                            <td>
                                <div class="form-button-action">
                                    <a data-toggle="modal" data-target="#Edit <?= $d['user_id'] ?>" title="" class="btn btn-link btn-success" data-original-title="Edit <?= $d['user_name']; ?>">
                                        <i class="fa fa-fw text-danger fa-edit"></i>
                                    </a>
                                    <div class="modal fade" id="Edit <?= $d['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <div class="card shadow-sm border-bottom-primary">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Form Update User Account</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= site_url('users/edit/') . $d['user_id']; ?>" method="POST">
                                                                <div class="row form-group">
                                                                    <label class="col-md-4 text-md-right" for="name">Username</label>
                                                                    <div class="col-md-8">
                                                                        <div class="input-group">
                                                                            <input type="text" name="name" value="<?= $d['user_name']; ?>" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                <label class="col-md-4 text-md-right" for="level">Level User</label>
                                                                    <div class="col-md-8">
                                                                        <select name="level" id="level" class="custom-select">
                                                                            <option value="Admin" <?php if ($d['user_level'] == 'Admin') { echo "selected"; }?>>Admin</option>
                                                                            <option value="Petugas" <?php if ($d['user_level'] == 'Petugas') { echo "selected"; }?>>Petugas</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <hr>
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
                                    <a data-toggle="modal" data-target="#EditStatus<?= $d['user_id'] ?>" title="Edit Status <?= $d['user_name']; ?>" class="btn btn-link btn-warning" data-original-title="Edit Status <?= $d['user_name']; ?>">
                                        <i class="fa fa-fw text-danger fa-edit"></i>
                                    </a>
                                    <div class="modal fade" id="EditStatus<?= $d['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <div class="card shadow-sm border-bottom-primary">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Status User</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= site_url('users/editstatus/') . $d['user_id']; ?>" method="POST">
                                                                <div class="input-group mb-3">
                                                                <label class="col-md-4 text-md-right" for="status">Status User</label>
                                                                    <div class="col-md-8">
                                                                        <select name="status" id="status" class="custom-select">
                                                                            <option value="0" <?php if ($d['user_status'] == '0') { echo "selected"; }?>>Tidak Aktif</option>
                                                                            <option value="1" <?php if ($d['user_status'] == '1') { echo "selected"; }?>>Aktif</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row form-group">
                                                                    <div class="col-md-10 offset-md-3">
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
                                    <a data-toggle="modal" data-target="#EditPassword<?= $d['user_id'] ?>" title="Edit Password <?= $d['user_name']; ?>" class="btn btn-link btn-info" data-original-title="Edit Password <?= $d['user_name']; ?>">
                                        <i class="fa fa-fw text-danger fa-edit"></i>
                                    </a>
                                    <div class="modal fade" id="EditPassword<?= $d['user_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="row justify-content-center">
                                                <div class="col">
                                                    <div class="card shadow-sm border-bottom-primary">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Form Password User</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= site_url('users/editpassword/') . $d['user_id']; ?>" method="POST">
                                                                <div class="row form-group">
                                                                    <label class="col-md-4 text-md-right" for="pass">Password</label>
                                                                    <div class="col-md-8">
                                                                        <div class="input-group">
                                                                            <input type="password" name="pass" class="form-control" placeholder="Masukkan Password..." aria-label="Password" aria-describedby="basic-addon1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
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
                                    <a onclick="return confirm('Yakin ingin hapus?')"  href="<?= site_url('users/delete/') . $d['user_id'] ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove <?= $d['user_name'] . ' ' . $d['user_level']; ?>">
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