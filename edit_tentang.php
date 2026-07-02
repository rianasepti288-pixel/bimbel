<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$data = mysqli_query($koneksi,"SELECT * FROM tentang LIMIT 1");
$tentang = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Tentang</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h3>Edit Tentang Kami</h3>

<div class="card p-4">

<form method="POST" action="update_tentang.php" enctype="multipart/form-data">

  <div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control"
    value="<?= $tentang['judul'] ?>" required>
  </div>

  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="5"><?= $tentang['deskripsi'] ?></textarea>
  </div>

  <div class="mb-3">
    <label>Alamat</label>
    <textarea name="alamat" class="form-control"><?= $tentang['alamat'] ?></textarea>
  </div>

  <div class="mb-3">
    <label>Embed Google Maps</label>
    <textarea name="maps" class="form-control" rows="4"><?= $tentang['maps'] ?></textarea>
  </div>

  <div class="mb-3">
    <label>Upload Foto Gallery</label>
    <input type="file" name="foto[]" multiple class="form-control">
  </div>

  <button class="btn btn-primary w-100">Simpan Semua</button>

</form>

</div>

</div>

</div>

</body>
</html>