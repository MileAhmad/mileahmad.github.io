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
	$pengguna = query("SELECT * FROM users WHERE username = '0' ");


	$login_massage = '';


		
	if ($hakakses == "adm") {
		$pengguna = query( "SELECT * FROM users  ORDER by username ASC");
	} else {
		$login_massage = "Anda Tidak Dapat Mengakses Data";
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

			<h1>Data Pengguna</h1> <br>

			<div class="tabel">
				<table>
					<tr>
						<th>No.</th>
						<th>Username</th>
						<th>Password</th>
						<th>Nama RQ</th>
						<th>Hak Akses</th>
						<th>Tindakan</th>
					</tr>

					<?php $i = 1; ?>
					<?php  foreach ( $pengguna as $use) : ?>
					<tr>
						<td align="center"><?= $i; ?></td>
						<td align="center"><?= $use["username"]; ?></td>
						<td align="center"><?= $use["password"]; ?></td>
						<td align="center"><?= $use["nama_rq"]; ?></td>
						<td align="center"><?= $use["hak_akses"]; ?></td>
						<td align="center">
							<a href="ubahdatauser.php?id=<?= $use["id"]; ?>" id="edit">edit user</a>
						</td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>

				</table>
			</div>

			<br><h2 align="center"><?= $login_massage; ?></h2>

		</div>
	</div>

	<script src="script.js"> </script>

	<?php require "footer.html" ?>
</body>
</html>