<?php
include "koneksi.php";

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$tombol = $_POST['tombol'];

$data = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM hero LIMIT 1"));
$gambar = $data['gambar'];

if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0){

    $namaFile = time().'_'.basename($_FILES['gambar']['name']);
    $tmp = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp,"assets/img/".$namaFile);

    $gambar = $namaFile;
}

mysqli_query($koneksi,"
UPDATE hero SET
judul='$judul',
deskripsi='$deskripsi',
tombol='$tombol',
gambar='$gambar'
WHERE id=1
");

header("Location: edit_hero.php?success=1");
exit;