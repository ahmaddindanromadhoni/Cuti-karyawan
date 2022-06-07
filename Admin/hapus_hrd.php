<?php
	include 'sess_check.php';
		$id = $_GET['id_hrd'];	
		$sql = mysqli_query($koneksi, "DELETE FROM hrd WHERE id_hrd='$id'");
		header("location: hrd.php?act=delete&msg=success");
?>