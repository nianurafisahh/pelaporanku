        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h3>Tambah Laporan Pengaduan</h3>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-body">
                        <?= form_open_multipart('laporan/add_laporan'); ?>
                            <div class="form-group row">
                                <label class="col-sm-2">Isi laporan</label>
                                <div class="col-sm-10">
                                <?= form_error('isi','<small class="text-danger">','</small>'); ?>
                                    <textarea name="isi" rows="8" class="form-control"><?= set_value('isi'); ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2">Tambahkan Foto <small>(Max size 500kb)</small></label>
                                <div class="col-sm-10">
                               
                                    <input type="file" class="form-control" name="foto" required="required">
                                </div>
                            </div>

                            <a href="<?= base_url('laporan'); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>

                            <button type="submit" class="btn btn-info"><i class="fa fa-paper-plane"></i> Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
