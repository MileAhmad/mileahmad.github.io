<?php
	
	require "service/database.php";

	//ambil data di URL
	$nik = $_GET["nik"];

	//setor
	$tabung = query("SELECT * FROM setoran WHERE
				nik = '$nik'");
	
	//narik
	$narik = query("SELECT * FROM penarikan WHERE
				nik = '$nik'");

	$condb -> close();
 ?> 


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tabungan Santri</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="kontener">
		<div class="head">
			<div class="logo">
				<img src="logo/02logo.png" alt="">
			</div>
			<div class="yayasan">
				<h2>Sistem Informasi Buku Tabungan Santri</h2>
				<h1>YAYASAN BINA PRESTASI TAHFIDZ INDONESIA</h1>
			</div>
			<div class="tloginn">
				<h1><a href="login.php">MASUK</a></h1>
			</div>
		</div>
		
		<div class="main">
		

			<h1>Histori Transaksi Santri</h1>
			<br>
			<div class="tombolbalik">
				<h3 align="center"><a href="index.php">KEMBALI</a></h3>
			</div>
			

			<br>
			<h2 align="center">Riwayat Penyetoran</h2> <br>
			<div class="tabel">

				<table>
					<tr>
						<th>No.</th>
						<th>No. Transaksi</th>
						<th>Tgl. Transaksi</th>
						<th>NIK</th>
						<th>Nama Santri</th>
						<th>Uraian</th>
						<th>Jumlah Setor</th>
					</tr>

					<?php $i = 1; ?>
					<?php  foreach ($tabung as $tbg) : ?>
					<tr>
						<td align="center"><?= $i; ?></td>
						<td align="center"><?= $tbg["no_transaksi"]; ?></td>
						<td align="center"><?= $tbg["tgl_transaksi"]; ?></td>
						<td align="center"><?= $tbg["nik"]; ?></td>
						<td align="center"><?= $tbg["nama_santri"]; ?></td>
						<td align="center"><?= $tbg["uraian"]; ?></td>
						<td align="center"><?= $tbg["jml_setor"]; ?></td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>

				</table>
			</div>
			<br> <br>	<h2 align="center">Riwayat Penarikan</h2> <br>

			<div class="tabel">
				
				<table>
					<tr>
						<th>No.</th>
						<th>No. Transaksi</th>
						<th>Tgl. Transaksi</th>
						<th>NIK</th>
						<th>Nama Santri</th>
						<th>Uraian</th>
						<th>Jumlah Tarik</th>
					</tr>

					<?php $i = 1; ?>
					<?php  foreach ($narik as $nrk) : ?>
					<tr>
						<td align="center"><?= $i; ?></td>
						<td align="center"><?= $nrk["no_transaksi"]; ?></td>
						<td align="center"><?= $nrk["tgl_transaksi"]; ?></td>
						<td align="center"><?= $nrk["nik"]; ?></td>
						<td align="center"><?= $nrk["nama_santri"]; ?></td>
						<td align="center"><?= $nrk["uraian"]; ?></td>
						<td align="center"><?= $nrk["jml_tarik"]; ?></td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>

				</table>
			</div>

		</div>
	</div>


	<?php require "footer.html" ?>
</body>
</html>