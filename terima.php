<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,
"UPDATE pembayaran
SET status='diterima'
WHERE id='$id'");

header("Location: pembayaran_admin.php");
exit;
?>