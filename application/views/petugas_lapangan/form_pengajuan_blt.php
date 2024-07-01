<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("petugas_lapangan/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

	<?php if ($this->session->flashdata('input')) { ?>
		<script>
			swal({
				title: "Success!",
				text: "Data Berhasil Ditambahkan!",
				icon: "success"
			});
		</script>
	<?php } ?>

	<?php if ($this->session->flashdata('eror_input')) { ?>
		<script>
			swal({
				title: "Erorr!",
				text: "Data Gagal Ditambahkan!",
				icon: "error"
			});
		</script>
	<?php } ?>

	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<img class="animation__shake" src="<?= base_url(); ?>assets/admin_lte/dist/img/Loading.png" alt="AdminLTELogo" height="60" width="60">
		</div>

		<!-- Navbar -->
		<?php $this->load->view("petugas_lapangan/components/navbar.php") ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view("petugas_lapangan/components/sidebar.php") ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Form Input Data Warga</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Input Data</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">

					<form action="<?= base_url(); ?>Form_blt/proses_blt" method="POST" enctype="multipart/form-data">
						<input type="text" value="<?= $this->session->userdata('id_user') ?>" name="id_user" hidden>
						<label style="font-size: 20px;">Biodata</label>
						<div class="form-group">
							<label for="nama">Nama Kepala Keluarga</label>
							<textarea class="form-control" id="nama" rows="1" name="nama" required></textarea>
						</div>
						<div class="form-group">
							<label for="nik">NIK (Nomor Induk Kependudukan)</label>
							<input type="text" class="form-control" id="nik" aria-describedby="nik" name="nik" pattern="[0-9]{16}" title="Harap masukkan 16 digit angka" required>
						</div>
						<div class="form-group">
							<label for="kk"> No KK (Kartu Keluarga)</label>
							<input type="text" class="form-control" id="kk" aria-describedby="kk" name="kk" pattern="[0-9]{16}" title="Harap masukkan 16 digit angka" required>
						</div>
						<div class="form-group">
							<label for="rt">RT/RW</label>
							<input type="text" class="form-control" id="rt" aria-describedby="rt" name="rt" required>
						</div>
						<div class="form-group">
							<label for="norek"> No Rekening</label>
							<input type="text" class="form-control" id="norek" aria-describedby="norek" name="norek" pattern="[0-9]{16}" title="Harap masukkan angka" required>

						</div>
						<hr>
						<label style="font-size: 20px;">Kriteria</label>
						<div class="form-group">
							<label for="sakit">Apakah terdapat anggota keluarga yang mengidap sakit kronis atau menahun?</label>
							<select class="form-control" id="sakit" name="sakit" required>
								<option value="" disabled selected>Pilih satu</option>
								<option value="Ya">Ya</option>
								<option value="Tidak">Tidak</option>
							</select>
						</div>
						<div class="form-group">
							<label for="disabilitas">Apakah terdapat anggota keluarga disabilitas?</label>
							<select class="form-control" id="disabilitas" name="disabilitas" required>
								<option value="" disabled selected>Pilih satu</option>
								<option value="Ya">Ya</option>
								<option value="Tidak">Tidak</option>
							</select>
						</div>
						<div class="form-group">
							<label for="pendapatan">Apakah tidak mempunyai pendapatan/memenuhi kebutuhan dasar?</label>
							<select class="form-control" id="pendapatan" name="pendapatan" required>
								<option value="" disabled selected>Pilih satu</option>
								<option value="Ya">Ya</option>
								<option value="Tidak">Tidak</option>
							</select>
						</div>
						<div class="form-group">
							<label for="dinding">Mempunyai dinding rumah terbuat dari bambu/kayu dengan kualitas tidak baik/rendah?</label>
							<select class="form-control" id="dinding" name="dinding" required>
								<option value="" disabled selected>Pilih satu</option>
								<option value="Ya">Ya</option>
								<option value="Tidak">Tidak</option>
							</select>
						</div>
						<div class="form-group">
							<label for="lantai">Kondisi lantai terbuat dari tanah/kayu/semen dengan kualitas tidak baik/rendah?</label>
							<select class="form-control" id="lantai" name="lantai" required>
								<option value="" disabled selected>Pilih satu</option>
								<option value="Ya">Ya</option>
								<option value="Tidak">Tidak</option>
							</select>
							<div class="form-group">
								<label for="atap">Atap terbuat dari ijuk/rumbia/seng/asbes dengan kualitas tidak baik/rendah?</label>
								<select class="form-control" id="atap" name="atap" required>
									<option value="" disabled selected>Pilih satu</option>
									<option value="Ya">Ya</option>
									<option value="Tidak">Tidak</option>
								</select>
								<div class="form-group">
									<label for="bantuan">Bukan penerima bantuan PKH, kartu sembako, kartu Prakerja, Bansos Tunai, dan program pemerintah lainnya</label>
									<select class="form-control" id="bantuan" name="bantuan" required>
										<option value="" disabled selected>Pilih satu</option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak</option>
									</select>
								</div>
								<div class="form-group">
									<label for="latitude">Latitude</label>
									<input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" readonly>
								</div>
								<div class="form-group">
									<label for="longitude">Longitude</label>
									<input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" readonly>
								</div>
								<button type="button" id="detectLocationBtn" class="btn btn-primary">Deteksi Lokasi</button>
								<hr>
								<form action="upload.php" method="post" enctype="multipart/form-data">
									<input type="file" name="foto" required>
									<button type="submit" name="submit">Upload Foto</button>
								</form>
								<hr>

								<button type="submit" class="btn btn-primary">Submit</button>
								<hr>
					</form>
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script>
			document.getElementById('detectLocationBtn').addEventListener('click', function() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(function(position) {
						var latitude = position.coords.latitude;
						var longitude = position.coords.longitude;

						// Set nilai latitude dan longitude ke input form
						document.getElementById('latitude').value = latitude;
						document.getElementById('longitude').value = longitude;

						// Optional: Tampilkan pesan sukses menggunakan SweetAlert
						Swal.fire({
							icon: 'success',
							title: 'Lokasi Anda berhasil dideteksi!',
							text: 'Latitude: ' + latitude + ', Longitude: ' + longitude,
							showConfirmButton: false,
							timer: 2000
						});
					}, function(error) {
						// Handle error jika terjadi masalah dalam deteksi lokasi
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Terjadi kesalahan dalam mendeteksi lokasi Anda!'
						});
					});
				} else {
					// Handle jika browser tidak mendukung Geolocation API
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Browser Anda tidak mendukung Geolocation API!'
					});
				}
			});
		</script>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<?php $this->load->view("petugas_lapangan/components/js.php") ?>
</body>

</html>