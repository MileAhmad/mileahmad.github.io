
<div class="menu">
	<div class="header">
			<span><?= $_SESSION['nama_rq']  ?></span>
			<i><?= $_SESSION['akses']  ?></i>
			<img src="logo/02logo.png" alt="">
	</div>
	
	<div class="listmenu">
		<ul>
		<li><a href="dashboard.php">
			<i class='fas fa-qrcode'></i><span>Dashboard</span>
		</a></li>
		
		<li><a href="masterdata.php">
			<i class='fas fa-city'></i><span>Master Data</span>
		</a></li>

		<li><a href="datasantri.php">
			<i class='fas fa-address-book'></i><span>Data Santri</span>
		</a></li>

		<li><a href="saldo.php">
			<i class='fas fa-money-check-alt'></i><span>Tabungan Santri</span>
		</a></li>

		<!-- <li><a href="#">
			<i class='fas fa-money-check-alt'></i><span>Laporan</span>
		</a></li> -->

	</ul>
	</div>	
	
	<div class="blogout">
		<form action="dashboard.php" method="POST">
			<button type="submit" name="logout">LOG OUT</button>
		</form>
	</div>	
</div>


