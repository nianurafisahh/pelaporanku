<!DOCTYPE html>
<html>

<head>
	<title>Pengaduan Masyarakat</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('asset/bootstrap/'); ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('asset/bootstrap/'); ?>css/style.css">
	<link rel="stylesheet" href="<?= base_url('asset/sbadmin/vendor/fontawesome-free/css/all.min.css'); ?>">
	<style>
		form {
			text-align: center;
		}
	</style>
</head>

<body class="bg-light">

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="card o-hidden border-0 shadow-lg my-5">
                	<div class="card-body p-0 bg-light">
					<div class="p-5">
				<h2 class="text-center text-black">MASUK</h2>
				<h5 class="text-center text-black">Pengaduan Masyarakat</h5>
				<div class="card" style="border: none;">
					<div class="card-body bg-light">
					<?= $this->session->flashdata('message'); ?>

						<form action="<?= base_url('auth'); ?>" method="post">
							<div class="form-group bg-light">
								<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
								<input type="text" name="username" class="form-control" placeholder="Username" id="form" autocomplete="off">
							</div>

							<div class="form-group bg-light">
								<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
								<input type="password" name="password" class="form-control" placeholder="Password" id="form">
							</div>

							<button type="submit" id="btn" class="btn bg-dark text-white">Masuk</button>
							<p class="text-center">Belum punya akun, <a href="<?= base_url('auth/register'); ?>">Daftar</a> di sini</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>


	<script src="<?= base_url('asset/bootstrap/'); ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('asset/bootstrap/'); ?>js/jquery.js"></script>
</body>

</html>