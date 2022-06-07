<?php
include 'sess_check.php';
$nama_hrd = $_POST['nama_hrd'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$TTL = $_POST['TTL'];
$agama = $_POST['agama'];
$no_telp = $_POST['no_telp'];
$jk_hrd = $_POST['jk_hrd'];

$sql = mysqli_query($koneksi,"INSERT INTO hrd VALUES('','$nama_hrd','$alamat','$email','$TTL','$agama','$no_telp','$jk_hrd')");
if($sql){
    echo"
    <script>
    document.location='hrd.php';
    alert('Berhasil Ditambah');
    </script>";
}else{
    echo"
    <script>
    document.location='T_data.php';
    alert('Gagal Ditambah');
    </script>";
}
?>