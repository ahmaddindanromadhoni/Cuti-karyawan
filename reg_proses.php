<?php
include 'koneksi.php';
$nik = $_POST['nik'];
$nama_emp = $_POST['nama_emp'];
$jk_emp = $_POST['jk_emp'];
$jabatan = $_POST['jabatan'];
$telp_emp = $_POST['telp_emp'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];

$sql = mysqli_query($koneksi,"INSERT INTO employee VALUES('$nik','$nama_emp','$jk_emp','$jabatan','$telp_emp','$alamat','$password')");
if($sql){
    echo"
    <script>
    document.location='index.php';
    alert('Berhasil Registrasi');
    </script>";
}else{
    echo"
    <script>
    document.location='registrasi.php';
    alert('Gagal Registrasi');
    </script>";
}
?>