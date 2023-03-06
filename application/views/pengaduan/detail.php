        <?php date_default_timezone_set('Asia/Jakarta'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h3>Detail Laporan Pengaduan</h3>

          <div class="row mb-3">
            <div class="col-lg-6">
              <div class="card shadow">
                <img src="<?= base_url('asset/upload/') . $pengaduan->foto; ?>" >
                <div class="card-body">
                  <p><?= $pengaduan->isi_laporan; ?></p>
                  <hr>
                  <i class="fa fa-user"> <?= $pengaduan->nama; ?></i>
                  <br>
                  <small>NIK : <?= $pengaduan->nik; ?></small>
                  <br>
                  <small>Status : <?php if($pengaduan->status_diterima == 'ditolak'): ?>
                                        Ditolak
                                        <?php else: ?> 
                                        <?php if($pengaduan->status == 0): ?>
                                            Menunggu
                                        <?php elseif($pengaduan->status == 1): ?>
                                            Proses
                                        <?php else: ?>
                                            Selesai
                                        <?php endif; ?>
                                        <?php endif; ?></small>
                  <br>
                  <small class="text-muted"><?= date('D,d M Y H:i:s', $pengaduan->id_pengaduan); ?></small>
                  <hr>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card shadow">
                <div class="card-body">
                  <h6 class="text-center">Tanggapan</h6>
                  <hr>
                  <?php if (empty($tanggapan)) : ?>
                    <div class="alert alert-info text-center">Belum ada tanggapan</div>
                  <?php else : ?>
                    <?php foreach ($tanggapan as $t) { ?>
                      <div class="card bg-light my-2">
                        <div class="mx-2 my-2">
                          <i class="fa fa-user"> <?= $t->nama; ?></i><br>
                          <?php if ($t->id_admin == $pengguna['id_admin']) : ?>
                            <a href="<?= base_url('pengaduan/del_tanggapan/') . $t->id_pengaduan . '/' . $t->id_tanggapan; ?>" class="btn btn-danger btn-sm float-right" style="margin-top : -25px;"><i class="fa fa-trash"></i></a>
                          <?php endif; ?>
                          <!-- <hr> -->
                          <p><?= $t->tanggapan; ?></p>
                          <small class="text-muted" style="font-size: 10px;"><?= date('D,d M Y H:i:s', $t->id_tanggapan); ?></small>

                        </div>
                      </div>
                    <?php } ?>

                  <?php endif; ?>

                  <hr>
                  <form action="<?= base_url('pengaduan/add_tanggapan/') . $pengaduan->id_pengaduan; ?>" method="post">
                    <?= form_error('tanggapan', '<small class="text-danger">', '</small>'); ?>
                    <textarea name="tanggapan" rows="3" class="form-control" placeholder="Tambahkan tanggapan" required></textarea>
                    <a href="<?= base_url('pengaduan'); ?>" class="btn btn-dark btn-sm mt-2"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <button type="button" class="btn btn-success btn-sm mt-2" data-toggle="modal" data-target="#modal"><i class="fa fa-edit"></i> Edit Status</button>
                    <button type="submit" class="btn btn-primary btn-sm mt-2"><i class="fa fa-paper-plane"></i> Kirim</button>
                  </form>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->



        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Status Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?= base_url('pengaduan/edit_status'); ?>" method="post">
                <div class="modal-body">
                  <input type="hidden" name="id" value="<?= $pengaduan->id_pengaduan; ?>">
                  <div class="form-group row">
                    <label class="col-sm-3">Status Pengaduan : </label>
                    <div class="col-sm-9">
                      <select name="status" class="form-control">
                        <option value="0">Menunggu</option>
                        <option value="1">Proses</option>
                        <option value="2">Selesai</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>