<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$data = mysqli_query($koneksi,"SELECT * FROM program");
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Program</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h3>Edit Program</h3>

<!-- FORM TAMBAH -->
<div class="card p-3 mb-4">

<form method="POST" action="tambah_program.php" enctype="multipart/form-data">

<div class="row g-2">

  <div class="col-md-4">
    <input type="text" name="nama_program" class="form-control" placeholder="Nama Program">
  </div>

  <div class="col-md-4">
    <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi">
  </div>

  <div class="col-md-2">
    <input type="file" name="gambar" class="form-control">
  </div>

  <div class="col-md-2">
    <button class="btn btn-primary w-100">Tambah</button>
  </div>

</div>

</form>

</div>

<!-- LIST -->
<div class="row g-3">

<?php while($p = mysqli_fetch_assoc($data)) { ?>

<div class="col-md-4">
  <div class="card p-2">

    <img src="assets/img/<?= $p['gambar'] ?>" style="height:150px; object-fit:cover;">

    <h6 class="mt-2"><?= $p['nama_program'] ?></h6>
    <p><?= $p['deskripsi'] ?></p>

    <a href="hapus_program.php?id=<?= $p['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>

  </div>
</div>

<?php } ?>

</div>

</div>

</body>
</html>