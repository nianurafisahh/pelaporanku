        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Edit No Telp</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="<?= base_url('admin/edit_telp'); ?>" method="post">
                                <div class="form-group row">
                                    <label class="col-sm-2">No telp</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="telp" value="<?= $pengguna['no_telp']; ?>" class="form-control">
                                        <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <a href="<?= base_url('admin/edit'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->