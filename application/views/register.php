<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>WEB-blt | UPTB</title>

	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/favicon.ico" />

	<!-- Font Icon -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/register/fonts/material-icon/css/material-design-iconic-font.min.css">

	<!-- Main css -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/register/css/style.css">

	<!-- Sweetalert -->
	<script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

	<?php if ($this->session->flashdata('password_err')) { ?>
		<script>
			swal({
				title: "Error Password!",
				text: "Ketik Ulang Password!",
				icon: "error"
			});
		</script>
	<?php } ?>

	<div class="main">

		<section class="signup">
			<!-- <img src="images/signup-bg.jpg" alt=""> -->
			<div class="container">
				<div class="signup-content">
					<form method="POST" id="signup-form" class="signup-form" action="<?= base_url(); ?>Register/proses">
						<h2 class="form-title">Lupa Password</h2>

						<div class="form-group">
							<input type="email" class="form-input" name="email" id="email" placeholder="Your Email" required />
						</div>
						<div class="form-group">
							<input type="submit" name="submit" id="submit" class="form-submit" value="Kirim link reset password" />
						</div>
					</form>
					<p class="loginhere">
						Sudah ingat ? <a href="<?= base_url(); ?>Login/index" class="loginhere-link">Login di sini</a>
					</p>
				</div>
			</div>
		</section>

	</div>

	<!-- JS -->
	<script src="<?= base_url(); ?>assets/register/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/register/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>