        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h3>Laporan Pengaduan</h3>

          <a href="<?= base_url('laporan/add_laporan'); ?>" class="btn btn-dark"><i class="fa fa-plus"></i> Tambah Laporan pengaduan</a>
          <?php if (empty($laporan)) : ?>
            <div class="alert alert-warning mt-3">
              Belum Ada Laporan Yang Anda Kirim
            </div>
          <?php endif; ?>

          <div class="row">
            <?php foreach ($laporan as $l) : ?>
              <div class="col-lg-3">
                <div class="card shadow my-2">
                  <img src="<?= base_url('asset/upload/') . $l->foto; ?>">
                  <div class="card-body">
                    <p><?= $l->isi_laporan; ?></p>
                    <small class="text-muted"><?php date_default_timezone_set('Asia/Jakarta');
                                              echo date('D,d M Y H:i:s', $l->id_pengaduan); ?></small>
                    <?php if ($l->status_diterima != null) : ?>
                        <div class="row justify-content-between align-items-center mt-3 mr-4">
                        <?php if ($l->status_diterima == "diterima") : ?>
                          <span class="badge badge-success badge-pill py-2 px-3 ml-3">
                            Diterima
                          </span>
                        <?php else : ?>
                          <span class="badge badge-danger badge-pill py-2 px-3 ml-3">
                            Ditolak
                          </span>
                          <?php endif; ?>
                          <? else: ?>
                            <div class="row justify-content-end align-items-center mt-2 ml-3"> </div>
                      <?php endif; ?>
                      <a href="<?= base_url('laporan/detail/') . md5($l->id_pengaduan); ?>" class="btn btn-info btn-sm"><i class="fa fa-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->