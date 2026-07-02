<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$data = mysqli_query($koneksi,"SELECT * FROM tutor");
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Tutor</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h3>Edit Tutor</h3>

<!-- TAMBAH -->
<div class="card p-3 mb-4">

<form method="POST" action="tambah_tutor.php" enctype="multipart/form-data">

<div class="row g-2">

  <div class="col-md-4">
    <input type="text" name="nama" class="form-control" placeholder="Nama Tutor">
  </div>

  <div class="col-md-3">
    <input type="text" name="mapel" class="form-control" placeholder="Mapel">
  </div>

  <div class="col-md-3">
    <input type="file" name="foto" class="form-control">
  </div>

  <div class="col-md-2">
    <button class="btn btn-primary w-100">Tambah</button>
  </div>

</div>

</form>

</div>

<!-- LIST -->
<div class="row g-3">

<?php while($t = mysqli_fetch_assoc($data)) { ?>

<div class="col-md-4">
  <div class="card p-3 text-center">

    <img src="assets/img/<?= $t['foto'] ?>" 
    class="rounded-circle mx-auto"
    style="width:100px;height:100px;object-fit:cover;">

    <h6 class="mt-2"><?= $t['nama'] ?></h6>
    <p class="text-muted"><?= $t['mapel'] ?></p>

    <a href="hapus_tutor.php?id=<?= $t['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>

  </div>
</div>

<?php } ?>

</div>

</div>

</body>
</html>