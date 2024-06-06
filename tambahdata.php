<?php 
	require "service/database.php";

	session_start();

	if (isset($_POST['logout'])) {
		session_unset();
		session_destroy();
		header('location: login.php');
	}


	if (isset($_POST["submit"]) ) {
		
		//cek apakah data berhasil ditambahkan atau tidak

		if(tambah($_POST) > 0) {
			echo "
				<script>
					alert('data berhasil ditambahkan')
					document.location.href = 'datasantri.php'
				</script>
			";
		}

		if(tambah($_POST) < 0) {
			echo "
				<script>
					alert('data gagal ditambahkan')
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
	<title>Tambah Data Santri</title>
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
			<h1>Tambah Data Santri</h1>

			<div class="tambah">
				<form action="" method="POST">
					<ul>
						<li>
							<label for="nik">NIK : </label><br>
							<input type="text" name="nik" id="nik" required>
						</li>
						<li>
							<label for="nama">Nama Santri : </label><br>
							<input type="text" name="nama" id="nama" required>
						</li>
						<li>
							<label for="asal">Asal : </label><br>
							<input type="text" name="asal" id="asal" required>
						</li>
						<li>
							<label for="tgl">Tanggal Lahir : </label><br>
							<input type="date" name="tgl" id="tgl" required>
						</li>
						<li>
							<label>Jenis Kelamin : </label><br>
							<input type="radio" name="jk" value="Laki laki">Laki laki
							<input type="radio" name="jk" value="Perempuan">Perempuan
						</li>
						<li>
							<label for="rq">RQ : </label><br>
							<input type="text" name="rq" id="rq">
						</li>
						<li>
							<button type="submit" name="submit">Tambah</button>
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