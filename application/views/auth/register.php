<!DOCTYPE html>
<html>

<head>
	<title>Pengaduan Masyarakat</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('asset/bootstrap/'); ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('asset/bootstrap/'); ?>css/stylee.css">
</head>

<body class="bg-light">

	<div class="container">
	<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="card o-hidden border-0 shadow-lg my-5">
                	<div class="card-body p-0 bg-light">
					<div class="p-5">
				<h2 class="text-center text-black">DAFTAR</h2>
				<h5 class="text-center text-black">Pengaduan Masyarakat</h5>
				<div class="card" style="border: none;">
					<div class="card-body bg-light">
					<?= $this->session->flashdata('message'); ?>

						<form action="<?= base_url('auth/register'); ?>" method="post">

							<div class="form-group bg-light">
								<?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
								<input type="text" name="nik" class="form-control" placeholder="NIK" id="form" autocomplete="off" value="<?= set_value('nik'); ?>">
							</div>
							<div class="row">
								<div class="form-group col-sm-6 bg-light">
									<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
									<input type="text" name="nama" class="form-control" placeholder="Nama" id="form" autocomplete="off" value="<?= set_value('nama'); ?>">
								</div>

								<div class="form-group col-sm-6 bg-light">
									<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
									<input type="text" name="username" class="form-control" placeholder="Username" id="form" autocomplete="off" value="<?= set_value('username'); ?>">
								</div>
							</div>

							<div class="form-group bg-light">
								<?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
								<input type="text" name="telp" class="form-control" placeholder="No Telp" id="form" autocomplete="off" value="<?= set_value('telp'); ?>">
							</div>

							<div class="row">
								<div class="form-group col-sm-6 bg-light">
									<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
									<input type="password" name="password" class="form-control" placeholder="Password" id="form" autocomplete="off">
								</div>

								<div class="form-group col-sm-6 bg-light">
									<?= form_error('repassword', '<small class="text-danger">', '</small>'); ?>
									<input type="password" name="repassword" class="form-control" placeholder="Ulangi Password" id="form" autocomplete="off">
								</div>
							</div>

							<button type="submit" id="btn" class="btn bg-dark text-white">Daftar</button>
							<p class="text-center">Sudah punya akun, <a href="<?= base_url('auth'); ?>">Masuk</a> di sini</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div>

	<script src="<?= base_url('asset/bootstrap/'); ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('asset/bootstrap/'); ?>js/jquery.js"></script>
	<script src="<?= base_url('asset/bootstrap/'); ?>js/popper.min.js"></script>
</body>

</html>