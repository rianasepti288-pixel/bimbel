<?php
include "koneksi.php";

$nama = $_POST['nama'];
$pesan = $_POST['pesan'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

move_uploaded_file($tmp,"assets/img/".$foto);

mysqli_query($koneksi,"INSERT INTO testimoni (nama,pesan,foto)
VALUES ('$nama','$pesan','$foto')");

header("Location: edit_testimoni.php");
?>