<?php
	include 'sess_check.php';
		$id = $_GET['nik'];	
		$sql = mysqli_query($koneksi, "DELETE FROM employee WHERE nik='$id'");
		header("location: karyawan.php?act=delete&msg=success");
?>