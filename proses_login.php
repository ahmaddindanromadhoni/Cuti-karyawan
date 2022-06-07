<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$nik = $_POST['nik'];
$password = $_POST['password'];

// menyeleksi data admin dengan nik dan password yang sesuai
$data = mysqli_query($koneksi,"SELECT * FROM employee WHERE nik='$nik' AND password='$password'");
// menghitung jumlah data yang ditemukan
if(mysqli_num_rows($data) > 0){
	$d = mysqli_fetch_object($data);
	$_SESSION['status_login'] = true;
	$_SESSION['a_global'] = $d;
	$_SESSION['user'] = $d->nik;
	echo'<script>window.location="User/index.php?login=success"</script>';
}else{
	header("location:index.php?login=gagal");
}
?>