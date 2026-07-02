<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";
$data = mysqli_query($koneksi,"SELECT * FROM testimoni");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Testimoni</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h3 class="mb-3">Data Testimoni</h3>

<!-- BUTTON TAMBAH -->
<a href="tambah_testimoni.php" class="btn btn-primary mb-3">
  + Tambah Testimoni
</a>

<!-- LIST TESTIMONI -->
<div class="row g-3">

<?php while($t = mysqli_fetch_assoc($data)) { ?>

<div class="col-md-4 col-sm-6">
  <div class="card shadow-sm border-0 h-100">

    <!-- FOTO -->
    <img src="assets/img/<?= $t['foto'] ?>" 
         class="card-img-top"
         style="height:220px; object-fit:cover;">

    <div class="card-body text-center">

      <!-- NAMA -->
      <h5 class="card-title mb-1"><?= $t['nama'] ?></h5>

      <!-- PESAN -->
      <p class="card-text text-muted">
        "<?= $t['pesan'] ?>"
      </p>

    </div>

    <!-- ACTION -->
    <div class="card-footer bg-white border-0 text-center">

      <a href="hapus_testimoni.php?id=<?= $t['id'] ?>" 
         class="btn btn-danger btn-sm">
         Hapus
      </a>

    </div>

  </div>
</div>

<?php } ?>

</div>

</div>

</body>
</html>