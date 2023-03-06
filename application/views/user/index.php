        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="card shadow">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img width="75%" src="<?= base_url('asset/img/profilku.jpg'); ?>" class="img-thumbnail">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <div class="form-group row">
                          <label class="col-sm-2">Nama</label>
                          <div class="col-sm-6"><?= $pengguna['nama']; ?></div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2">NIK</label>
                          <div class="col-sm-6"><?= $pengguna['nik']; ?></div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2">Username</label>
                          <div class="col-sm-6"><?= $pengguna['username']; ?></div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2">No Telp</label>
                          <div class="col-sm-6"><?= $pengguna['no_telp']; ?></div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2">Status</label>
                          <div class="col-sm-6"><?php if ($pengguna['aktif'] == 1) : ?>Aktif <?php else : ?>Nonaktif <?php endif; ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->