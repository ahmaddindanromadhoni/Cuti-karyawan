<?php
	// memulai session
	session_start();
	// membaca nilai variabel session 
	$chk_sess = $_SESSION['user'];
	// memanggil file koneksi
	include("../koneksi.php");
	include("../library.php");
	// mengambil data pengguna dari tabel pengguna
	$sql_sess = "SELECT * FROM employee WHERE nik='". $chk_sess ."'";
	$ress_sess = mysqli_query($koneksi, $sql_sess);
	$p = mysqli_fetch_array($ress_sess);
	// menyimpan id_pengguna yang sedang login
	$nik = $p['nik'];
	$nama_emp = $p['nama_emp'];
	// mengarahkan ke halaman login.php apabila session belum terdaftar
	if(! isset($chk_sess)) {
		header("location: ../index.php?login=false");
	}
?>