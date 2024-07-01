<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		/* Desain kartu disini */
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f0f0f0;
		}

		.container {
			width: 500px;
			margin: 20px auto;
			background-color: #ffeb3b;
			/* Warna kuning */
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			border: 1px solid #000;
			position: relative;
			text-align: left;
			/* Mengatur posisi teks dan elemen ke kiri */
		}

		.header {
			text-align: center;
			margin-bottom: 20px;
		}

		.header h2 {
			margin: 5px 0;
		}

		.header p {
			margin: 0;
		}

		.judul {
			font-size: 24px;
			font-weight: bold;
			text-align: center;
			margin-bottom: 10px;
		}

		.info {
			margin-bottom: 20px;
			font-size: 18px;
			position: relative;
			/* Mengatur posisi relatif untuk kontainer info */
			padding-left: 20px;
			/* Menyesuaikan padding kiri untuk memberi ruang bagi gambar */
		}

		.info p {
			margin: 10px 0;
			position: relative;
			/* Mengatur posisi relatif untuk setiap elemen teks */
		}

		.info p span {
			display: inline-block;
			width: 100px;
		}

		.logo {
			position: absolute;
			top: 20px;
			left: 20px;
			width: 70px;
			/* Atur lebar logo sesuai kebutuhan */
			height: auto;
			/* Biarkan tinggi sesuai proporsi */
			z-index: 1;
			/* Menetapkan urutan tumpukan untuk logo */
		}

		.watermark {
			position: absolute;
			top: 100px;
			/* Posisi watermark 10px dari atas */
			left: 50%;
			/* Posisi watermark di tengah horizontal */
			transform: translateX(-50%);
			/* Memindahkan watermark ke kiri sebesar 50% lebar sendiri */
			opacity: 0.3;
			width: 100px;
			/* Atur lebar watermark sesuai kebutuhan */
			height: auto;
			/* Biarkan tinggi sesuai proporsi */
			z-index: 0;
			/* Menetapkan urutan tumpukan di bawah teks */
		}

		.line {
			height: 2px;
			background-color: #000;
			margin: 20px 0;
		}
	</style>
</head>

<body>
	<div class="container">
		<img src="<?= base_url('assets/kalisube.png'); ?>" alt="Logo Desa Kalisube" class="logo">
		<img src="<?= base_url('assets/kalisube.png'); ?>" alt="Watermark" class="watermark">
		<div class="header">
			<h2>Kartu Penerima Manfaat BLT</h2>
			<p>Pemerintah Desa Kalisube</p>
		</div>
		<div class="line"></div>
		<div class="info">
			<p><span>Nama</span>: <?= $nama ?></p>
			<p><span>RT/RW</span>: <?= $rt ?></p>
			<p><span>NIK</span>: <?= $nik ?></p>
		</div>
	</div>
</body>

</html>