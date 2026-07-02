<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,
"DELETE FROM pembayaran
WHERE id='$id'");

header("Location: pembayaran_admin.php");
exit;
?>