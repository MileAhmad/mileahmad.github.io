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
	$usr = query("SELECT * FROM users WHERE id = $id") [0];
	

	if (isset($_POST["submit"]) ) {
		
		//cek apakah data berhasil diubah atau tidak

		if(ubahuser($_POST) > 0) {
			echo "
				<script>
					alert('data berhasil diubah')
					document.location.href = 'masterdata.php'
				</script>
			";
		}

		if(ubahuser($_POST) < 0) {
			echo "
				<script>
					alert('data gagal diubah')
					document.location.href = 'masterdata.php'
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
			<h1>Ubah Data Pengguna</h1>

			<div class="tambah">
				<form action="" method="POST">
					<input type="hidden" name="id" value="<?= $usr['id']; ?>">
					<ul>
						<li>
							<label for="username">Username : </label><br>
							<input type="text" name="username" id="username" required value="<?= $usr['username']; ?>">
						</li>
						<li>
							<label for="password">Password  : </label><br>
							<input type="text" name="password" id="password" required value="<?= $usr['password']; ?>">
						</li>
						<li>
							<label for="nama_rq">Nama RQ : </label><br>
							<input type="text" name="nama_rq" id="nama_rq" required value="<?= $usr['nama_rq']; ?>">
						</li>
						<li>
							<label for="hak_akses">Hak Akses : </label><br>
							<input type="text" name="hak_akses" id="hak_akses" value="<?= $usr['hak_akses']; ?>">
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