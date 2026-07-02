<?php
include "koneksi.php";

$nama = $_POST['nama'];
$mapel = $_POST['mapel'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

move_uploaded_file($tmp, "assets/img/".$foto);

mysqli_query($koneksi,"
INSERT INTO tutor (nama, mapel, foto)
VALUES ('$nama','$mapel','$foto')
");

header("Location: edit_tutor.php");
?>