<?php
include 'koneksi.php';

$nik        = $_POST['nik'];
$nama_emp   = $_POST['nama_emp'];
$jk_emp   = $_POST['jk_emp'];
$tlp_emp    = $_POST['tlp_emp'];
$jabatan    = $_POST['jabatan'];
$alamat     = $_POST['alamat'];
$password   = $_POST['password'];

$reg = mysqli_query($koneksi, "INSERT INTO employee VALUES('$nik','$nama_emp','$jk_emp','$tlp_emp','$jabatan','$alamat','$password')");
if($reg){
    echo"
    <script>
    document.location.href='index.php?register=success';
    alert('Data Berhasil Ditambahkan');
    </script>
    ";
}else{
    echo"
    <script>
    document.location.href='registrasi.php?register=gagal';
    alert('Data Gagal Ditambahkan');
    </script>
    ";  
}
?>