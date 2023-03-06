        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body">
                        <table class="table table-hover">
                            <form action="<?= base_url('admin/edit'); ?>" method="post">
                                <div class="form-group row">
                                    <label class="col-md-2">Nama</label>
                                    <div class="col-md-6">
                                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $pengguna['nama']; ?>">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Username</label>
                                    <div class="col-md-6">
                                        <input type="text" name="username" id="username" class="form-control" value="<?= $pengguna['username']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">No Telp</label>
                                    <div class="col-md-6">
                                        <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?= $pengguna['no_telp']; ?>" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="<?= base_url('admin/edit_telp'); ?>" class="btn btn-info"><i class="fa fa-edit"></i> Edit No Telp</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                <a href="<?= base_url('admin/edit_password'); ?>" class="btn btn-dark"><i class="fa fa-key"></i> Edit Password</a>
                            </form>
                        </div>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->