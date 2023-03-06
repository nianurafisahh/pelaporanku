<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Error 404 | Page not Found</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('asset/sbadmin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?= base_url('asset/sbadmin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" style="background : #000000;">
        <!-- Begin Page Content -->
        <div class="container-fluid" style="margin-top : 100px;">
          <!-- 404 Error Text -->
          <div class="text-center">
            <div class="error mx-auto text-white" data-text="404">404</div>
            <p class="lead text-white mb-5">Page Not Found</p>
            <p class="text-white mb-0">Halaman yang anda cari mungkin sudah di hapus atau di ubah</p>
            <?php if($this->session->userdata('nik')): ?>
            <a href="<?= base_url('user'); ?>">&larr; Back to Dashboard</a>
            <?php elseif($this->session->userdata('level')): ?>
            <a href="<?= base_url('admin'); ?>">&larr; Back to Dashboard</a>
            <?php endif; ?>
          </div>
        </div>

  <!-- End of Page Wrapper -->

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('asset/sbadmin/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('asset/sbadmin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('asset/sbadmin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('asset/sbadmin/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
