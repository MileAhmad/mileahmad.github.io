<?php 

	require "service/database.php";

	$notrk = $_GET["no_transaksi"];

	$ntrk = query("SELECT * FROM penarikan WHERE no_transaksi = $notrk") [0];


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Penarikan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="contain">
		<div class="cetak">
			<h1 align="center">Cetak Bukti Penarikan Tabungan</h1> <br><br>
			<div class="tabelctk">
				<table>
				<tr>
					<td>Nama</td>
					<td>: <?= $ntrk['nama_santri'] ?></td>
				</tr>
				<tr>
					<td>NIK</td>
					<td>: <?= $ntrk['nik'] ?></td>
				</tr>
				<tr>
					<td>No. Transaksi</td>
					<td>: <?= $ntrk['no_transaksi'] ?></td>
				</tr>
				<tr>
					<td>Tgl. Tarik</td>
					<td>: <?= $ntrk['tgl_transaksi'] ?></td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<th align="center"> Uraian </th>
					<th align="center"> Jumlah Tarik </th>
				</tr>
				<tr>
					<td align="center"><?= $ntrk['uraian'] ?></td>
					<td align="center"><?= $ntrk['jml_tarik'] ?></td>
				</tr>
			</table>
			</div>
			
		</div>
		
	</div>

	<script>
		window.print()
	</script>

</body>
</html>