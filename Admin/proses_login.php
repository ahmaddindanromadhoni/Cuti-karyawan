<?php
// memulai session
session_start();
// memanggil file koneksi
include '../koneksi.php';

// mengecek apakah tombol login sudah di tekan atau belum
if(isset($_POST['login'])) {
	// mengecek apakah username dan password sudah di isi atau belum
	if(empty($_POST['user_adm']) || empty($_POST['pass_adm'])) {
		// mengarahkan ke halaman login.php
		header("location: login.php?err=empty");
	}
	else {
		// membaca nilai variabel username dan password
		$username = $_POST['user_adm'];
		$password = $_POST['pass_adm'];
		$hak_akses = $_POST['hak_akses'];
		// mencegah sql injection
		$username = htmlentities(trim(strip_tags($username)));
		$password = htmlentities(trim(strip_tags($password)));
			// memeriksa username di tabel admin

			if($hak_akses=="manager"){		
				$aks = "manager";
				$sql = "SELECT * FROM admin WHERE hak_akses='".$aks."' AND user_adm='". $username ."' AND pass_adm='". $password ."'";
				$ress = mysqli_query($koneksi, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika username di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['manager'] = strtolower($dataku['id_adm']);
					// mengarahkan ke halaman indeks.php
					header("location: index.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}else{			
				$aks = "hrd";
				$sql = "SELECT * FROM admin WHERE hak_akses='".$aks."' AND user_adm='". $username ."' AND pass_adm='". $password ."'";
				$ress = mysqli_query($koneksi, $sql);
				$rows = mysqli_num_rows($ress);
				$dataku = mysqli_fetch_array($ress);
				// mendaftarkan session jika username di temukan
				if($rows == 1) {
					// membuat variabel session
					$_SESSION['hrd'] = strtolower($dataku['id_adm']);
					// mengarahkan ke halaman indeks.php
					header("location: ../Petugas/index.php?login=success");
				}else{
					header("location: login.php?err=not_found");
				}
			}
        }
    }
    ?>