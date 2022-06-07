<?php
include 'sess_check.php';

$nik        = $_POST['nik'];
$nama_emp   = $_POST['nama_emp'];
$jabatan    = $_POST['jabatan'];
$jk_emp   = $_POST['jk_emp'];
$telp_emp    = $_POST['telp_emp'];
$password   = $_POST['password'];
$alamat     = $_POST['alamat'];

$sql = mysqli_query($koneksi, "UPDATE employee SET nama_emp='$nama_emp', jabatan='$jabatan', jk_emp='$jk_emp', telp_emp='$telp_emp', password='$password', alamat='$alamat' WHERE nik='$nik'");
if($sql){
    echo"
    <script>
    document.location.href='profil.php';
    alert('Berhasil Update Profil');
    </script>
    ";
}else{
    echo"
    <script>
    document.location.href='update_profil.php';
    alert('Gagal Update Profil');
    </script>
    ";
}

?>