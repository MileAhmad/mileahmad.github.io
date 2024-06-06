<?php 

	require "service/database.php";
	session_start();

	$login_massage = "";

	if (isset($_SESSION['is_login'])) {
		header("location: dashboard.php");
	}


	if(isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM users WHERE
		username = '$username'
		AND password = '$password'
		";

		$result = $condb -> query ($sql);

		if ($result -> num_rows > 0) {
			$data = $result -> fetch_assoc();
			$_SESSION['username'] = $data["username"];
			$_SESSION['nama_rq'] = $data["nama_rq"];
			$_SESSION['akses'] = $data["hak_akses"];
			$_SESSION["is_login"] = true;
			
			header("location: dashboard.php");

		}else {
			$login_massage = "akun tidak terdaftar";
		}
		$condb -> close();
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TASBI</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="loginpage">
		<div class="ahlan">
			<h1>أَهْلًا وَسَهْلًا</h1>
			<h2>TASBI</h2>
			<h3>Tabungan Santri bina Prestasi</h3>
		</div>

		<div class="klogin">
			<h3>Silahkan Login</h3> <br>
			<i> <?= $login_massage ?> </i>
				<form action="login.php" method="POST">
					<input type="text" placeholder="username" name="username"/> <br>
					<input type="password" placeholder="password" name="password"/> <br>
					<button type="submit" name="login">LOGIN</button>
				</form>
				
		</div>
	</div>
		
		

	<?php require "footer.html" ?>
</body>
</html>