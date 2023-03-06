        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Buat Laporan</h1>

          <div class="row">
              <div class="col-lg-12">
                  <div class="card shadow">
                      <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                   <th>Buat laporan</th>
                                   <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Buat Laporan Admin</td>
                                    <td><a href="<?= base_url('generate/gen_admin'); ?>" target="_blank" class="btn btn-info"><i class="fa fa-download"></i> Laporan Admin</a></td>
                                </tr>
                                <tr>
                                    <td>Buat Laporan Petugas</td>
                                    <td><a href="<?= base_url('generate/gen_petugas'); ?>" target="_blank" class="btn btn-info"><i class="fa fa-download"></i> Laporan Petugas</a></td>
                                </tr>
                                <tr>
                                    <td>Buat laporan Masyarakat</td>
                                    <td><a href="<?= base_url('generate/gen_masyarakat'); ?>" target="_blank" class="btn btn-info"><i class="fa fa-download"></i> Laporan Masyarakat</a></td>
                                </tr>
                                <tr>
                                    <td>Buat laporan Pengaduan</td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-filter"></i> Laporan Pengaduan</button></td>
                                </tr>
                            </tbody>
                        </table>
                      </div>
                  </div>
              </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generate Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="<?= base_url('generate/gen_pengaduan'); ?>" method="post" target="_blank">
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Dari Tanggal</label>
                    <input type="date" name="tglAwal" class="form-control" value="<?= date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input type="date" name="tglAkhir" class="form-control" value="<?= date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control">
                        <option value="">Semua</option>
                        <option value="1">Proses</option>
                        <option value="2">Selesai</option>
                      </select>
                </div>
              </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Laporan</button>
      </div>
        </form>
    </div>
  </div>
</div>