<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan BLT Ditolak</title>
	<style>
		/* Tambahkan CSS styling sesuai kebutuhan */
		table {
			width: 100%;
			border-collapse: collapse;
		}

		th,
		td {
			border: 1px solid black;
			padding: 8px;
		}

		th {
			background-color: #f2f2f2;
		}
	</style>
</head>

<body>
	<h2>Data BLT Ditolak</h2>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>NIK BLT</th>
				<th>KK</th>
				<th>rt</th>
				<th>Alasan Penolakan</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($blt_ditolak as $index => $blt) : ?>
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