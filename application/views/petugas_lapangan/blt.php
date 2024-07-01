<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("petugas_lapangan/components/header.php") ?>
	<style>
		.img-thumbnail {
			width: 90px;
			height: 110px;
			object-fit: cover;
			/* Ini untuk memastikan gambar tetap proporsional */
		}
	</style>
</head>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<?php if ($this->session->flashdata('hapus')) : ?>
		<script>
			swal({
				title: "Success!",
				text: "Data Berhasil Dihapus!",
				icon: "success"
			});
		</script>
	<?php endif; ?>

	<?php if ($this->session->flashdata('eror_hapus')) : ?>
		<script>
			swal({
				title: "Error!",
				text: "Data Gagal Dihapus!",
				icon: "error"
			});
		</script>
	<?php endif; ?>

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
							<h1 class="m-0">Data Warga</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Data Warga</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Data Warga</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Kepala Keluarga</th>
												<th>NIK</th>
												<th>NO KK</th>
												<th>RT/RW</th>
												<th>Status Penerima</th>
												<th>Keterangan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
											foreach ($blt as $i) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $i['nama'] ?></td>
													<td><?= $i['nik'] ?></td>
													<td><?= $i['kk'] ?></td>
													<td><?= $i['rt'] ?></td>
													<td>
														<div class="table-responsive">
															<div class="table table-striped table-hover">
																<?php if ($i['id_status_blt'] == 1) : ?>
																	<a href="#" class="btn btn-info">Menunggu Konfirmasi</a>
																<?php elseif ($i['id_status_blt'] == 2) : ?>
																	<a href="#" class="btn btn-success">Status Warga Diterima</a>
																<?php else : ?>
																	<a href="#" class="btn btn-danger">Status Warga Ditolak</a>
																<?php endif; ?>
															</div>
														</div>
													</td>
													<td>
														<?php if (empty($i['alasan_verifikasi'])) : ?>
															<a href="#" class="btn btn-danger">Belum Ada</a>
														<?php else : ?>
															<?= $i['alasan_verifikasi'] ?>
														<?php endif; ?>
													</td>
													<td>
														<div class="table-responsive">
															<div class="table table-striped table-hover">
																<a href="#" data-toggle="modal" data-target="#tinjau<?= $i['id_blt'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
																<a href="#" data-toggle="modal" data-target="#hapus<?= $i['id_blt'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
															</div>
														</div>
													</td>
												</tr>

												<!-- Modal Tinjau Data blt -->
												<div class="modal fade" id="tinjau<?= $i['id_blt'] ?>" tabindex="-1" aria-labelledby="tinjauModalLabel" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="tinjauModalLabel">Tinjau Data Warga</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form>
																	<div class="form-group row">
																		<label for="nama" class="col-sm-2 col-form-label">Nama Kepala Keluarga</label>
																		<div class="col-sm-10">
																			<input type="text" readonly class="form-control" id="nama" value="<?= $i['nama'] ?>">
																		</div>
																	</div>
																	<div class="form-group row">
																		<label for="nik" class="col-sm-2 col-form-label">NIK</label>
																		<div class="col-sm-10">
																			<input type="text" readonly class="form-control" id="nik" value="<?= $i['nik'] ?>">
																		</div>
																	</div>
																	<div class="form-group row">
																		<label for="kk" class="col-sm-2 col-form-label">KK</label>
																		<div class="col-sm-10">
																			<input type="text" readonly class="form-control" id="kk" value="<?= $i['kk'] ?>">
																		</div>
																	</div>
																	<div class="form-group row">
																		<label for="rt" class="col-sm-2 col-form-label">rt</label>
																		<div class="col-sm-10">
																			<input type="text" readonly class="form-control" id="rt" value="<?= $i['rt'] ?>">
																		</div>
																	</div>
																	<div class="form-group row">
																		<label for="norek" class="col-sm-2 col-form-label">NO REKENING</label>
																		<div class="col-sm-10">
																			<input type="text" readonly class="form-control" id="norek" value="<?= $i['norek'] ?>">
																		</div>
																	</div>
																	<div class="form-group row">
																		<label for="sakit" class="col-sm-2 col-form-label">Apakah memiliki anggota keluarga yang mengidap sakit kronis atau menahun?</label>
																		<div class="col-sm-10">
																			<input type="text" readonly class="form-control" id="sakit" value="<?= $i['sakit'] ?>">
																		</div>
																	</div>
																	<div class="form-group row">
																		<label for="disabilitas" class="col-sm-2 col-form-label">Apakah terdapat anggota keluarga disabilitas?</label>
																		<div class="col-sm-10">
																			<input type="text" readonly class="form-control" id="disabilitas" value="<?= $i['disabilitas'] ?>">
																		</div>
																	</div>
																	<div class="form-group row">
																		<label for="pendapatan" class="col-sm-2 col-form-label">Apakah tidak mempunyai pendapatan/ memenuhi kebutuhan dasar?</label>
																		<div class="col-sm-10">
																			<input type="text" readonly class="form-control" id="pendapatan" value="<?= $i['pendapatan'] ?>">
																		</div>
																	</div>
																	<div class="form-group row">
																		<label for="dinding" class="col-sm-2 col-form-label">Mempunyai dinding rumah terbuat dari bambu/ kayu dengan kualitas tidak baik/rendah?</label>
																		<div class="col-sm-10">
																			<input type="text" readonly class="form-control" id="dinding" value="<?= $i['dinding'] ?>">
																		</div>
																	</div>
																	<div class="form-group row">
																		<label for="lantai" class="col-sm-2 col-form-label">Kodisi lantai terbuat dari tanah/ kayu/ semen dengan kualitas tidak baik/ rendah?</label>
																		<div class="col-sm-10">
																			<input type="text" readonly class="form-control" id="lantai" value="<?= $i['lantai'] ?>">
																		</div>
																	</div>
																	<div class="form-group row">
																		<label for="atap" class="col-sm-2 col-form-label">Atap terbuat dari ijuk/ rumbia/ seng/ asbes dengan kualitas tidak baik/ rendah? </label>
																		<div class="col-sm-10">
																			<input type="text" readonly class="form-control" id="atap" value="<?= $i['atap'] ?>">
																		</div>
																	</div>
																	<div class="form-group row">
																		<label for="foto" class="col-sm-2 col-form-label">Foto Rumah</label>
																		<div class="col-sm-10">
																			<img src="<?= base_url('assets/foto/') . $i['foto'] ?>" class="img-thumbnail">
																		</div>
																	</div>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
															</div>
														</div>
													</div>
												</div>

												<!-- Modal Hapus Data blt -->
												<div class="modal fade" id="hapus<?= $i['id_blt'] ?>" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="hapusModalLabel">Hapus Data blt</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<form action="<?= base_url('blt/hapus_blt') ?>" method="post" enctype="multipart/form-data">
																	<input type="hidden" name="id_blt" value="<?= $i['id_blt'] ?>">
																	<input type="hidden" name="id_user" value="<?= $i['id_user'] ?>">
																	<p>Apakah kamu yakin ingin menghapus data ini?</p>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
																		<button type="submit" class="btn btn-success">Ya</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
					</div>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

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