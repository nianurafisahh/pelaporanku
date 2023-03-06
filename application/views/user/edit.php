        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="<?= base_url('user/edit'); ?>" method="post">
                                <div class="form-group row">
                                    <label class="col-sm-2">Nama</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nama" class="form-control" value="<?= $pengguna['nama']; ?>">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2">Username</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="username" class="form-control" readonly value="<?= $pengguna['username']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2">No Telp</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="telp" class="form-control" readonly value="<?= $pengguna['no_telp']; ?>">
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="<?= base_url('user/edit_telp'); ?>" class="btn btn-info btn-sm mt-1"><i class="fa fa-edit"></i> Edit No telp</a>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                <a href="<?= base_url('user/edit_password'); ?>" class="btn btn-dark"><i class="fa fa-key"></i> Edit Password</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>