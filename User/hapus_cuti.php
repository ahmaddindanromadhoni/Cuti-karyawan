<?php
include 'sess_check.php';

$id = $_GET['no_cuti'];
$hps = mysqli_query($koneksi, "DELETE FROM cuti WHERE no_cuti='$id'");
header("location:cuti_wait.php?delete=berhasil");


?>