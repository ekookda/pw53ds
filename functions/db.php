<?php
// Membuat koneksi ke database
$link = new mysqli('localhost','root','R0ckmyta','pw5ds');

// Cek koneksi
if(mysqli_connect_errno()):
    echo "Gagal terhubung ke database ". mysqli_connect_error();
    exit();
endif;
?>
