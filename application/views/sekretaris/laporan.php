<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("sekretaris/components/header.php") ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<?php if ($this->session->flashdata('input')) { ?>
		<script>
			swal({
				title: "Success!",
				text: "Status Warga Berhasil Diubah!",
				icon: "success"
			});
		</script>
	<?php } ?>

	<?php if ($this->session->flashdata('eror_input')) { ?>
		<script>
			swal({
				title: "Error!",
				text: "Status Warga Gagal Diubah!",
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
		<?php $this->load->view("sekretaris/components/navbar.php") ?>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<?php $this->load->view("sekretaris/components/sidebar.php") ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Laporan Penerimaan BLT</h1>
							<hr>
							<div class="card-tools">
								<div class="d-inline-block">
									<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#exportModal">
										<i class="fas fa-file-pdf"></i> Export PDF
									</button>
								</div>
								<div class="d-inline-block">
									<button type="button" class="btn btn-success btn-lg" onclick="exportExcel()">
										<i class="fas fa-file-excel"></i> Export Excel
									</button>
								</div>
							</div>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">BLT</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<!-- Data blt petugas_lapangan Diterima -->
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Data Warga Diterima</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Kepala Keluarga</th>
												<th>NIK</th>
												<th>RT/RW</th>
												<th>Keterangan</th>
												<th>Aksi</th> <!-- Kolom untuk tautan Cetak Kartu -->
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 0;
											foreach ($blt_diterima as $i) :
												$no++;
											?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $i['nama'] ?></td>
													<td><?= $i['nik'] ?></td>
													<td><?= $i['rt'] ?></td>
													<td><?= $i['alasan_verifikasi'] ?></td>
													<td>
														<!-- Tautan untuk cetak kartu -->
														<a href="<?= base_url('laporan/cetak_kartu/' . $i['id_blt']) ?>" class="btn btn-primary" target="_blank">Cetak Kartu</a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
						<div class="col-md-6">
							<!-- Data blt petugas_lapangan Ditolak -->
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Data Warga Ditolak</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example2" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Kepala Keluarga</th>
												<th>NIK</th>
												<th>RT/RW</th>
												<th>Keterangan</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 0;
											foreach ($blt_ditolak as $i) :
												$no++;
											?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $i['nama'] ?></td>
													<td><?= $i['nik'] ?></td>
													<td><?= $i['rt'] ?></td>
													<td><?= $i['alasan_verifikasi'] ?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Modal -->
		<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exportModalLabel">Pilih Opsi Ekspor PDF</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<p>Pilih opsi untuk ekspor PDF:</p>
						<a href="<?= base_url('laporan/export_pdf?option=diterima') ?>" class="btn btn-warning"><i class="fa fa-file-pdf"></i> Data Warga Diterima</a>
						<a href="<?= base_url('laporan/export_pdf?option=ditolak') ?>" class="btn btn-danger"><i class="fa fa-file-pdf"></i> Data Warga Ditolak</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /.content-wrapper -->

		php
		Copy code
		<!-- Main Footer -->
		<footer class="main-footer">
			<div class="float-right d-none d-sm-inline">
				Pemerintah Desa Kalisube
			</div>
			<strong>Sistem Informasi BLT</strong>
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="<?= base_url(); ?>assets/admin_lte/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url(); ?>assets/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url(); ?>assets/admin_lte/dist/js/adminlte.min.js"></script>
	<script>
		function exportPDF(option) {
			if (option === 'diterima') {
				window.location.href = '<?= base_url("laporan/export_pdf_diterima") ?>';
			} else if (option === 'ditolak') {
				window.location.href = '<?= base_url("laporan/export_pdf_ditolak") ?>';
			}
		}
	</script>
	<script>
		function exportExcel() {
			// Buat permintaan AJAX untuk mengunduh file Excel
			var xhr = new XMLHttpRequest();
			xhr.open('GET', '<?= base_url("laporan/export_excel") ?>');
			xhr.responseType = 'blob'; // Tipe respons yang diharapkan adalah blob (binary large object)

			xhr.onload = function() {
				// Mengonversi blob ke URL yang dapat diunduh
				var blob = xhr.response;
				var link = document.createElement('a');
				link.href = window.URL.createObjectURL(blob);
				link.download = 'laporan.xlsx'; // Nama file saat diunduh
				link.click();
			};

			xhr.send();
		}
	</script>

</body>

</html>
```