<?php
	// memulai session
	session_start();
	// membaca nilai variabel session 
	$chk_sess = $_SESSION['manager'];
	// memanggil file koneksi
	include("../koneksi.php");
	include("../library.php");
	// mengambil data pengguna dari tabel pengguna
	$sql_sess = "SELECT * FROM admin WHERE id_adm='". $chk_sess ."'";
	$ress_sess = mysqli_query($koneksi, $sql_sess);
	$row_sess = mysqli_fetch_array($ress_sess);
	// menyimpan id_pengguna yang sedang login
	$manager = $row_sess['id_adm'];
	$mnager_name = $row_sess['nama_adm'];
	// mengarahkan ke halaman login.php apabila session belum terdaftar
	if(! isset($chk_sess)) {
		header("location: login.php?login=false");
	}
?>