        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h3>Tambah Data Admin</h3>

          <div class="row">
              <div class="col-lg-12">
                  <div class="card shadow">
                      <div class="card-body">
                      <form action="<?= base_url('master/add_admin'); ?>" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama','<small class="text-danger">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input type="text" name="telp" class="form-control" value="<?= set_value('telp'); ?>">
                                        <?= form_error('telp','<small class="text-danger">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="<?= set_value('username'); ?>">
                                        <?= form_error('username','<small class="text-danger">','</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                        <?= form_error('password','<small class="text-danger">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Ulangi Password</label>
                                        <input type="password" name="repassword" class="form-control">
                                        <?= form_error('repassword','<small class="text-danger">','</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control">
                                            <option value="1">Admin</option>
                                        </select>
                                        <?= form_error('level','<small class="text-danger">','</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url('master/admin'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
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
