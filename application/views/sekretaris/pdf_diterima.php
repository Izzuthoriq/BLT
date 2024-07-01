<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pemerintah Desa Kalisube</title>
	<title>Laporan BLT Diterima</title>
	<style>
		/* Tambahkan CSS styling sesuai kebutuhan */
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 20px;
		}

		.header {
			text-align: center;
			margin-bottom: 20px;
		}

		.header img {
			width: 150px;
			/* Sesuaikan ukuran logo sesuai keinginan */
			position: absolute;
			top: 15px;
			left: 40px;
			width: 100px;
			/* Atur lebar logo sesuai kebutuhan */
			height: auto;
			/* Biarkan tinggi sesuai proporsi */
			z-index: 1;
			/* Menetapkan urutan tumpukan untuk logo */
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 20px;
		}

		th,
		td {
			border: 1px solid black;
			padding: 8px;
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
		}
	</style>
</head>

<body>
	<div class="header">
		<img src="<?= base_url('assets/kalisube.png'); ?>" alt="Logo Desa Kalisube">
		<h2>Pemerintah Desa Kalisube</h2>
		<h2>Data BLT Diterima</h2>
	</div>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>NIK BLT</th>
				<th>KK</th>
				<th>RT/RW</th>
				<th>Alasan Verifikasi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($blt_diterima as $index => $blt) : ?>
				<tr>
					<td><?= $index + 1 ?></td>
					<td><?= $blt['nama'] ?></td>
					<td><?= $blt['nik'] ?></td>
					<td><?= $blt['kk'] ?></td>
					<td><?= $blt['rt'] ?></td>
					<td><?= $blt['alasan_verifikasi'] ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>

</html>