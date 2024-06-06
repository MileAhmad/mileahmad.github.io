<?php
	
	require "service/database.php";

	session_start();

	if (isset($_POST['logout'])) {
		session_unset();
		session_destroy();
		header('location: login.php');
	}


	$hakakses = $_SESSION['akses'];


	// ambil data dari tabel santri


	//ambil data di URL
	$nik = $_GET["nik"];

	//query data santri berdasarkan nik
	
	//tekan tombol cari
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
	<div class="container">
		<?php require "menu.php" ?>
		<div class="main">
			<?php require "menubutton.html" ?>

			<h1>Tarik Tabungan Santri</h1>
			<br>

			<br><span class="add">
				<a href="tarik.php?nik=<?= $nik; ?>">Tarik Tabungan</a>
			</span> <br><br>

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
						<th>Tindakan</th>
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
						<td align="center">
							<a href="cetaktrk.php?no_transaksi=<?= $nrk["no_transaksi"]; ?>" target="_blank" id="cetaktrk">CETAK</a>
						</td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>

				</table>
			</div>

		</div>
	</div>

	<script src="script.js"> </script>

	<?php require "footer.html" ?>
</body>
</html>