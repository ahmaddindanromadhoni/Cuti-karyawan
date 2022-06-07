<?php
include 'sess_check.php';

$no=$_POST['no_cuti'];
$aksi=$_POST['aksi'];
$reject=$_POST['reject'];
$stt = "";

if($aksi=="2"){
	$stt="Rejected";
	$sql = "UPDATE cuti SET
			stt_cuti='". $stt ."',
			ket_reject='". $reject ."'
			WHERE no_cuti='". $no ."'";
		$ress = mysqli_query($koneksi, $sql);
		header("location: app_cuti.php?act=update&msg=success");
	
}else{
	$stt="Approved";
	$sql = "UPDATE cuti SET
			stt_cuti='". $stt ."'
			WHERE no_cuti='". $no ."'";
		$ress = mysqli_query($koneksi, $sql);
		header("location: app_cuti.php?act=update&msg=success");
	
}
?>