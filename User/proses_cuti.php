<?php
include 'sess_check.php';

$nik	= $_POST['nik'];
$ajuan = date('Y-m-d');
$mulai	= $_POST['mulai'];
$akhir	= $_POST['akhir'];
$ket	= $_POST['keterangan'];

$start = new DateTime($mulai);
$finish = new DateTime($akhir);
$int = $start->diff($finish);
$dur = $int->days;
$durasi = $dur+1;

$stt = "Menunggu Approval";

$id = date('dmYHis');

$jmlh = 7;
if($durasi>$jmlh){
	echo "<script type='text/javascript'>
			alert('Durasi cuti lebih banyak dari jumlah cuti tersedia!.'); 
			document.location = 'cuti.php'; 
		</script>";	
}else{
	$sql 	= "INSERT INTO cuti (no_cuti, nik, tgl_pengajuan, tgl_awal, tgl_akhir, durasi, keterangan, stt_cuti) 
				VALUES ('$id','$nik','$ajuan','$mulai','$akhir','$durasi','$ket','$stt')";
	$query 	= mysqli_query($koneksi,$sql);
	if($query){
		echo "<script type='text/javascript'>
				alert('Pengajuan cuti berhasil!'); 
				document.location = 'cuti_wait.php'; 
			</script>";

	}else {
		echo "<script type='text/javascript'>
				alert('Terjadi kesalahan, silahkan coba lagi!.'); 
				document.location = 'cuti_create.php'; 
			</script>";
	}
}
?>