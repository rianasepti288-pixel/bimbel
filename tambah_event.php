<?php
include "koneksi.php";

$nama = $_POST['nama_event'];
$tanggal = $_POST['tanggal'];
$deskripsi = $_POST['deskripsi'];

// upload foto
$namaFile = time()."_".$_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

move_uploaded_file($tmp, "assets/img/".$namaFile);

// insert
mysqli_query($koneksi,"
INSERT INTO event (nama_event, tanggal, deskripsi, foto)
VALUES ('$nama','$tanggal','$deskripsi','$namaFile')
");

header("Location: edit_event.php");
exit;
?>
<form method="POST" action="tambah_event.php" enctype="multipart/form-data">

    <input type="text" name="nama_event" class="form-control" placeholder="Nama Event">

    <input type="date" name="tanggal" class="form-control">

    <textarea name="deskripsi" class="form-control"></textarea>

    <input type="file" name="foto" class="form-control">

    <button type="submit">Tambah</button>

</form>