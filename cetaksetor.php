<?php 

	require "service/database.php";

	$nostr = $_GET["no_transaksi"];

	$nstr = query("SELECT * FROM setoran WHERE no_transaksi = $nostr") [0];


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak penyetoran</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="contain">
		<div class="cetak">
			<h1 align="center">Cetak Bukti Setoran Tabungan</h1> <br><br>
			<div class="tabelctk">
				<table>
				<tr>
					<td>Nama</td>
					<td>: <?= $nstr['nama_santri'] ?></td>
				</tr>
				<tr>
					<td>NIK</td>
					<td>: <?= $nstr['nik'] ?></td>
				</tr>
				<tr>
					<td>No. Transaksi</td>
					<td>: <?= $nstr['no_transaksi'] ?></td>
				</tr>
				<tr>
					<td>Tgl. Setor</td>
					<td>: <?= $nstr['tgl_transaksi'] ?></td>
				</tr>
				<tr>
					<td colspan="2"></td>
				</tr>
				<tr>
					<th align="center"> Uraian </th>
					<th align="center"> Jumlah Setor </th>
				</tr>
				<tr>
					<td align="center"><?= $nstr['uraian'] ?></td>
					<td align="center"><?= $nstr['jml_setor'] ?></td>
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