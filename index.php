<?php
	
	require "service/database.php";

	
	



	// ambil data dari tabel santri


	$santri = query( "SELECT * FROM santri WHERE
				 rq = '0' ORDER BY nama_santri ASC");

	$setoran = query("SELECT * FROM setoran GROUP BY nik");

	$penarikan = query("SELECT * FROM penarikan GROUP BY nik");


	// ambil data (fetch) santri dari query santri
	//$str = mysqli_fetch_assoc($santri);

	//tekan tombol cari
	if (isset($_POST["cari"]) ) {

	$santri = cariaja($_POST["keyword"]);
		
	}


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

			<h1>Tabungan Santri</h1>
			<br>

			<div class="cari">
				<h3>silahkan masukkan nama santri di kolom pencarian</h3>
				<form action="" method="POST">
					
					<input type="text" name="keyword" size="40" placeholder="masukkan kata pencarian" autocomplete="off">
					<button type="submit" name="cari">Cari!</button>
				</form>
			</div>

			<div class="tabel">
				<table>
					<tr>
						<th>No.</th>
						<th>NIK</th>
						<th>Nama Santri</th>
						<th>Uang Masuk</th>
						<th>Uang Keluar</th>
						<th>Total Saldo</th>
						<th>Tindakan</th>
					</tr>

					<?php $i = 1; ?>
					<?php foreach ( $santri as $str): ?>			
					<?php $nnik = $str['nik'] ?>
					<?php $setor = query( "SELECT SUM(jml_setor) FROM setoran WHERE nik ='$nnik' "); ?>
					<?php $set =  $setor[0]["SUM(jml_setor)"]?>

					<?php $tarik = query( "SELECT SUM(jml_tarik) FROM penarikan WHERE nik ='$nnik' "); ?>
					<?php $tar =  $tarik[0]["SUM(jml_tarik)"]?>

					<tr>
						<td align="center"><?= $i; ?></td>
						<td align="left"><?= $str["nik"]; ?></td>
						<td align="left"><?= $str["nama_santri"]; ?></td>

						<td align="center"><?= $set ?></td>
						<td align="center"><?= $tar ?></td>
						<td align="center"><?php echo $set - $tar ?></td>
						<td align="center">
							<a href="histori.php?nik=<?= $str["nik"]; ?>" id="detail">Detail</a>
						</td>
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