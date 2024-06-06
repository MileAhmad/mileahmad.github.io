<?php 
	require "service/database.php";

	session_start();

	if (isset($_POST['logout'])) {
		session_unset();
		session_destroy();
		header('location: login.php');
	}

	//ambil data di URL
	$id = $_GET["id"];

	//query data santri berdasarkan id
	$str = query("SELECT * FROM santri WHERE id = $id") [0];
	

	if (isset($_POST["submit"]) ) {
		
		//cek apakah data berhasil diubah atau tidak

		if(ubah($_POST) > 0) {
			echo "
				<script>
					alert('data berhasil diubah')
					document.location.href = 'datasantri.php'
				</script>
			";
		}

		if(ubah($_POST) < 0) {
			echo "
				<script>
					alert('data gagal diubah')
					document.location.href = 'datasantri.php'
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
	<title>Ubah Data Santri</title>
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
			<h1>Ubah Data Santri</h1>

			<div class="tambah">
				<form action="" method="POST">
					<input type="hidden" name="id" value="<?= $str['id']; ?>">
					<ul>
						<li>
							<label for="nik">NIK : </label><br>
							<input type="text" name="nik" id="nik" required value="<?= $str['nik']; ?>">
						</li>
						<li>
							<label for="nama">Nama Santri : </label><br>
							<input type="text" name="nama" id="nama" required value="<?= $str['nama_santri']; ?>">
						</li>
						<li>
							<label for="asal">Asal : </label><br>
							<input type="text" name="asal" id="asal" required value="<?= $str['asal']; ?>">
						</li>
						<li>
							<label for="tgl">Tanggal Lahir : </label><br>
							<input type="date" name="tgl" id="tgl" required value="<?= $str['tgl_lahir']; ?>">
						</li>
						<li>
							<label>Jenis Kelamin : </label><br>
							<input type="radio" name="jk"  value="Laki laki">Laki laki
							<input type="radio" name="jk"  value="Perempuan">Perempuan
							
						</li>
						<li>
							<label for="rq">RQ : </label><br>
							<input type="text" name="rq" id="rq" value="<?= $str['rq']; ?>">
						</li>
						<li>
							<button type="submit" name="submit">Ubah</button>
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