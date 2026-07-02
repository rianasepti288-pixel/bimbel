<?php
include "koneksi.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$paket = $_POST['paket'];
$kontak = $_POST['kontak'];
$jk = $_POST['jenis_kelamin'];
$uang = $_POST['uang_pendaftaran'];

mysqli_query($koneksi,"
INSERT INTO pembayaran 
(nama, alamat, paket, kontak, jenis_kelamin, uang_pendaftaran, status, created_at)
VALUES
('$nama','$alamat','$paket','$kontak','$jk','$uang','menunggu',NOW())
");

header("Location: pembayaran_admin.php");
?>