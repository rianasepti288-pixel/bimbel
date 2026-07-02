<?php
include "koneksi.php";

$nama = $_POST['nama_program'];
$deskripsi = $_POST['deskripsi'];

$namaFile = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

move_uploaded_file($tmp, "assets/img/".$namaFile);

mysqli_query($koneksi,"
INSERT INTO program (nama_program, deskripsi, gambar)
VALUES ('$nama','$deskripsi','$namaFile')
");

header("Location: edit_program.php");
?>