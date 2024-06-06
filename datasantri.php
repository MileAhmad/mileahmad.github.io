<?php
	
	require "service/database.php";

	session_start();

	if (isset($_POST['logout'])) {
		session_unset();
		session_destroy();
		header('location: login.php');
	}


	$koderq = $_SESSION['username'];

	$hakakses = $_SESSION['akses'];


	// ambil data dari tabel santri


	$santri = query( "SELECT * FROM santri WHERE
				 rq = '$koderq' 
				 ORDER by nama_santri ASC");


		
	if ($hakakses == "adm") {
		$santri = query( "SELECT * FROM santri  ORDER by nama_santri ASC");
	}

	// ambil data (fetch) santri dari query santri
	//$str = mysqli_fetch_assoc($santri);

	//tekan tombol cari
	if (isset($_POST["cari"]) ) {
		if ($hakakses == "adm") {
			$santri = cariadm($_POST["keyword"]);
		} else {
			$santri = cariopr($_POST["keyword"]);
		}
		
	}

	$condb -> close();
 ?> 


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Santri</title>
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

			<h1>Data Santri</h1>

			<br><span class="add">
				<a href="tambahdata.php">Tambah Data Santri</a>
			</span> <br><br>

			<div class="cari">
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
						<th>Asal</th>
						<th>Tanggal lahir</th>
						<th>Jenis Kelamin</th>
						<th>RQ</th>
						<th>Tindakan</th>
					</tr>

					<?php $i = 1; ?>
					<?php  foreach ( $santri as $str) : ?>
					<tr>
						<td align="center"><?= $i; ?></td>
						<td align="left"><?= $str["nik"]; ?></td>
						<td align="left"><?= $str["nama_santri"]; ?></td>
						<td align="center"><?= $str["asal"]; ?></td>
						<td align="center"><?= $str["tgl_lahir"]; ?></td>
						<td align="center"><?= $str["jk"]; ?></td>
						<td align="center"><?= $str["rq"]; ?></td>
						<td align="center">
							<a href="ubahdata.php?id=<?= $str["id"]; ?>" id="edit">edit</a> |
							<a href="hapus.php?id=<?= $str["id"]; ?>" onclick=" return confirm ('yakin ingin menghapus data..?') " id="hapus">hapus</a>
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