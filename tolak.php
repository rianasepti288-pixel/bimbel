<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,
"UPDATE pembayaran
SET status='ditolak'
WHERE id='$id'");

header("Location: pembayaran_admin.php");
exit;
?>