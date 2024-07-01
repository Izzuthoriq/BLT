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
				text: "Status blt Berhasil Diubah!",
				icon: "success"
			});
		</script>
	<?php } ?>

	<?php if ($this->session->flashdata('eror_input')) { ?>
		<script>
			swal({
				title: "Erorr!",
				text: "Status blt Gagal Diubah!",
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
							<h1 class="m-0">Data Warga</h1>
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
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Data Calon Penerima BLT</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Kepala Keluarga</th>
												<th>NIK</th>
												<th>KK</th>
												<th>RT/RW</th>
												<th>Keterangan</th>
												<th>Status Penerima</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php

											$no = 0;
											foreach ($blt as $i) :
												$no++;
												$id_blt = $i['id_blt'];
												$id_user = $i['id_user'];
												$nama_lengkap = $i['nama_lengkap'];
												$nama = $i['nama'];
												$tgl_diajukan = $i['tgl_diajukan'];
												$kk = $i['kk'];
												$rt = $i['rt'];
												$id_status_blt = $i['id_status_blt'];
												$alasan_verifikasi = $i['alasan_verifikasi'];
												$nik = $i['nik'];

											?>
												<tr>
													<td><?= $no ?></td>
													<td><?= $nama ?></td>
													<td><?= $nik ?></td>
													<td><?= $kk ?></td>
													<td><?= $rt ?></td>
													<td><?php if ($alasan_verifikasi == NULL) { ?>
															<a href="" class="btn btn-danger">
																Belum Ada
															</a>
														<?php } else { ?>
															<?= $alasan_verifikasi ?>
														<?php } ?>
													</td>
													<td><?php if ($id_status_blt == 1) { ?>
															<div class="table-responsive">
																<div class="table table-striped table-hover ">
																	<a href="" class="btn btn-info" data-toggle="modal" data-target="#edit_data_petugas_lapangan">
																		Menunggu Konfirmasi
																	</a>
																</div>
															</div>
														<?php } elseif ($id_status_blt == 2) { ?>
															<div class="table-responsive">
																<div class="table table-striped table-hover">
																	<a href="" class="btn btn-success" data-toggle="modal" data-target="#edit_data_petugas_lapangan">
																		Status Diterima
																	</a>
																</div>

															</div>
														<?php } elseif ($id_status_blt == 3) { ?>
															<div class="table-responsive">
																<div class="table table-striped table-hover ">
																	<a href="" class="btn btn-danger" data-toggle="modal" data-target="#edit_data_petugas_lapangan">
																		Status Ditolak
																	</a>
																</div>
															</div>
														<?php } ?>
													</td>
													<td>
														<div class="table-responsive">
															<div class="table table-striped table-hover ">
																<div class="btn-container">
																	<a href="" class="btn btn-primary" data-toggle="modal" data-target="#setuju<?= $id_blt ?>">
																		<i class="fas fa-check"></i>
																	</a>
																	<a href="" data-toggle="modal" data-target="#tidak_setuju<?= $id_blt ?>" class="btn btn-danger">
																		<i class="fas fa-times"></i>
																	</a>
																</div>
																<div style="margin-bottom: 5px;"></div>

																<div class="table table-striped table-hover ">
																	<a href="#" data-toggle="modal" data-target="#tinjau<?= $i['id_blt'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>

																	</a>
																</div>
															</div>
														</div>
								</div>

								</td>

								</tr>

								<!-- Modal Setuju blt -->
								<div class="modal fade" id="setuju<?= $id_blt ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Setujui Sebagai Penerima
												</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body">
												<form action="<?php echo base_url() ?>blt/acc_blt_sekretaris/2" method="post" enctype="multipart/form-data">
													<div class="row">
														<div class="col-md-12">
															<input type="hidden" name="id_blt" value="<?php echo $id_blt ?>" />
															<input type="hidden" name="id_user" value="<?php echo $id_user ?>" />
															<p>Apakah kamu yakin ingin menyetujui sebagai penerima BLT
																?</i></b></p>
															<div class="form-group">
																<label for="exampleFormControlTextarea1">Keterangan</label>
																<textarea class="form-control" id="alasan_verifikasi" name="alasan_verifikasi" rows="3"></textarea>
															</div>

														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
														<button type="submit" class="btn btn-success ripple save-category">Ya</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
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

								</tr>

								<!-- Modal Tidak Setuju blt -->
								<div class="modal fade" id="tidak_setuju<?= $id_blt ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Tolak Data
													blt
												</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>

											<div class="modal-body">
												<form action="<?php echo base_url() ?>blt/acc_blt_sekretaris/3" method="post" enctype="multipart/form-data">
													<div class="row">
														<div class="col-md-12">
															<input type="hidden" name="id_blt" value="<?php echo $id_blt ?>" />
															<input type="hidden" name="id_user" value="<?php echo $id_user ?>" />

															<p>Apakah kamu yakin ingin memutuskan warga
																ini sebagai bukan penerima BLT?</i></b></p>
															<div class="form-group">
																<label for="exampleFormControlTextarea1">Keterangan</label>
																<textarea class="form-control" id="alasan_verifikasi" name="alasan_verifikasi" rows="3"></textarea>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
														<button type="submit" class="btn btn-success ripple save-category">Ya</button>
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
					<!-- /.col -->
				</div>

		</div><!-- /.container-fluid -->
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

	<?php $this->load->view("sekretaris/components/js.php") ?>
</body>

</html>