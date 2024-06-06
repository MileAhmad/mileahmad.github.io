<?php 
	require "service/database.php";

	session_start();

	if (isset($_POST['logout'])) {
		session_unset();
		session_destroy();
		header('location: login.php');
	}


	//ambil data di URL
	$nik = $_GET["nik"];

	//query data santri berdasarkan nik
	$str = query("SELECT * FROM santri WHERE nik = $nik") [0];


	if (isset($_POST["submit"]) ) {
		
		//cek apakah data berhasil ditambahkan atau tidak

		if(setor($_POST) > 0) {
			echo "
				<script>
					alert('tabungan berhasil disetor')
					document.location.href = 'saldo.php'
				</script>
			";
		} else {
			echo "
				<script>
					alert('tabungan gagal disetor')
					document.location.href = 'saldo.php'
				</script>
				";
		}
		

	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Setor Tabungan Santri</title>
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
			<h1>Setor Tabungan Santri</h1>

			<div class="tambah">
				<form action="" method="POST">
					<ul>
						<li>
							<label for="tgl">Tanggal Setor : </label><br>
							<input type="date" name="tgl" id="tgl" required>
						</li>
						<li>
							<label for="nik">NIK : </label><br>
							<input type="text" name="nik" id="nik" required value="<?= $str['nik']; ?>" readonly>
						</li>
						<li>
							<label for="nama">Nama Santri : </label><br>
							<input type="text" name="nama" id="nama" required value="<?= $str['nama_santri']; ?>" readonly>
						</li>
						<li>
							<label for="uraian">Uraian</label><br>
							<input type="text" name="uraian" id="uraian" required>
						</li>
						<li>
							<label for="jmlsetor">Jumlah Setor : </label><br>
							<input type="text" name="jmlsetor" id="jmlsetor">
						</li>
						<li>
							<button type="submit" name="submit">Setorkan.!</button>
						</li>
					</ul>
				</form>
			</div>

		</div>
	</div>

	<script src="script.js"> </script>

	<?php require "footer.html" ?>
</body>
</html>