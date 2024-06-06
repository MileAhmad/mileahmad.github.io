<?php 
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database_name = "tasbi_db";

	//koneksi
	$condb = mysqli_connect($hostname, $username, $password, $database_name);

	if($condb -> connect_error){
		echo "koneksi gagal";
		die("error");
	}

	//query tabel santri
	function query($query) {
		global $condb;
		$result = mysqli_query($condb, $query);
		$rows = [];
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}

	//tambah data santri
	function tambah($data) {
		global $condb;

		$nik = htmlspecialchars($data["nik"]);
		$nama = htmlspecialchars($data["nama"]);
		$asal = htmlspecialchars($data["asal"]);
		$tgl = htmlspecialchars($data["tgl"]);
		$jk = htmlspecialchars($data["jk"]);
		$rq = htmlspecialchars($data["rq"]);


		//query insert data
		$insert = "INSERT INTO santri
					VALUES
					('','$nik','$nama','$asal','$tgl','$jk','$rq')
					";
		mysqli_query($condb, $insert);

		return mysqli_affected_rows($condb);

	}


	//query duit
	// function masuk ($msk){
	// 	global $condb;
	// 	global $nnik;
	// 	mysqli_query($condb, "SELECT SUM(jml_setor) FROM setoran GROUP BY nik WHERE nik = '$nnik'");

	// 	return mysqli_affected_rows($condb);

	// }



	//hapus data
	function hapus($id) {
		global $condb;
		mysqli_query($condb,"DELETE FROM santri WHERE id = $id");

		return mysqli_affected_rows($condb);
	}


	//editdata
	function ubah($data) {
		global $condb;

		$id = $data["id"];
		$nik = htmlspecialchars($data["nik"]);
		$nama = htmlspecialchars($data["nama"]);
		$asal = htmlspecialchars($data["asal"]);
		$tgl = htmlspecialchars($data["tgl"]);
		$jk = htmlspecialchars($data["jk"]);
		$rq = htmlspecialchars($data["rq"]);


		$ubah = "UPDATE santri SET
						nik = '$nik',
						nama_santri = '$nama',
						asal = '$asal',
						tgl_lahir = '$tgl',
						jk = '$jk',
						rq = '$rq'
						WHERE id = $id
					";

		mysqli_query($condb, $ubah);

		return mysqli_affected_rows($condb);
	}


	//ubahdtauser
	function ubahuser($user) {
		global $condb;

		$id = $user["id"];
		$username = htmlspecialchars($user["username"]);
		$password = htmlspecialchars($user["password"]);
		$namarq = htmlspecialchars($user["nama_rq"]);
		$hakses = htmlspecialchars($user["hak_akses"]);

		$ubahuser = "UPDATE users SET
						username = '$username',
						password = '$password',
						nama_rq = '$namarq',
						hak_akses = '$hakses'
						WHERE id = $id
					";

		mysqli_query($condb, $ubahuser);

		return mysqli_affected_rows($condb);
	}



	//setortabungan
	function setor($data) {
		global $condb;

		$tgl = htmlspecialchars($data["tgl"]);
		$nik = htmlspecialchars($data["nik"]);
		$nama = htmlspecialchars($data["nama"]);
		$uraian = htmlspecialchars($data["uraian"]);
		$jmlsetor = htmlspecialchars($data["jmlsetor"]);


		//query insert data
		$tabung = "INSERT INTO setoran
					-- (no_transaksi,tgl_transaksi,nik,nama_santri,uraian,jml_setor)
					VALUES
					('','$tgl','$nik','$nama','$uraian','$jmlsetor') ";

		mysqli_query($condb, $tabung);

		return mysqli_affected_rows($condb);
	}


	//tariktabungan
	function tarik($data) {
		global $condb;

		$tgl = htmlspecialchars($data["tgl"]);
		$nik = htmlspecialchars($data["nik"]);
		$nama = htmlspecialchars($data["nama"]);
		$uraian = htmlspecialchars($data["uraian"]);
		$jmltarik = htmlspecialchars($data["jmltarik"]);


		//query insert data
		$narik = "INSERT INTO penarikan
					-- (no_transaksi,tgl_transaksi,nik,nama_santri,uraian,jml_setor)
					VALUES
					('','$tgl','$nik','$nama','$uraian','$jmltarik') ";

		mysqli_query($condb, $narik);

		return mysqli_affected_rows($condb);
	}


	// function saldo($duit) {
	// 	global $condb


	// }




	//caridata
	function cariadm($keyword) {
		global $koderq;
		$cari = "SELECT * FROM santri WHERE
				nama_santri LIKE '%$keyword%' OR
				nik LIKE '%$keyword%' OR
				asal LIKE '%$keyword%' OR
				tgl_lahir LIKE '%$keyword%' OR
				jk LIKE '%$keyword%' OR
				rq = '$koderq' ORDER BY nama_santri ASC";
		return query($cari);
	}


	function cariopr($keyword) {
		global $koderq;
		$cari = "SELECT * FROM santri WHERE
				nama_santri LIKE '%$keyword%' AND
				rq = '$koderq' ORDER BY nama_santri ASC";
		return query($cari);

	}

	function cariaja($keyword) {
		global $koderq;
		$cari = "SELECT * FROM santri WHERE
				nama_santri LIKE '%$keyword%' ORDER BY nama_santri ASC";
		return query($cari);
	}







 ?>