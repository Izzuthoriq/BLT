<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url(); ?>assets/login/images/kalisube.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light"><b>SI-BLT | Kalisube</b></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url(); ?>assets/admin_lte/dist/img/account.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $this->session->userdata('username'); ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="<?= base_url(); ?>Dashboard/dashboard_sekretaris" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url(); ?>Admin/view_sekretaris" class="nav-link">
						<i class="nav-icon far fa-user"></i>
						<p class="text">Admin</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Petugas_lapangan/view_sekretaris'); ?>" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>Petugas Lapangan</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url(); ?>blt/view_sekretaris" class="nav-link">
						<i class="nav-icon fas fa-envelope"></i>
						<p>Data Warga</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url(); ?>Laporan/view_sekretaris" class="nav-link">
						<i class="nav-icon fas fa-file-alt"></i>
						<p>Laporan</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url(); ?>Settings/view_sekretaris" class="nav-link">
						<i class="nav-icon fas fa-cog"></i>
						<p>Settings</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>