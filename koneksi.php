<?php
$koneksi = mysqli_connect('localhost','root','','cuti_db');
if (mysqli_connect_errno()){
    echo "Koneksi Database gagal :" . mysqli_connect_error();
}

?>