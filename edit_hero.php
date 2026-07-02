<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

// ambil data hero
$data = mysqli_query($koneksi,"SELECT * FROM hero LIMIT 1");
$hero = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Hero</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h3>Edit Section Home (Hero)</h3>

<div class="card p-4 mt-3">

<form method="POST" action="update_hero.php" enctype="multipart/form-data">

<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control"
    value="<?= $hero['judul'] ?>" required>
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="4" required><?= $hero['deskripsi'] ?></textarea>
</div>

<div class="mb-3">
    <label>Tombol</label>
    <input type="text" name="tombol" class="form-control"
    value="<?= $hero['tombol'] ?>" required>
</div>

<div class="mb-3">
    <label>Gambar Hero</label>

    <?php if($hero['gambar'] != ""){ ?>
        <img src="assets/img/<?= $hero['gambar'] ?>" width="250" class="d-block mb-3">
    <?php } ?>

    <input type="file" name="gambar" class="form-control">
    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
</div>

<button type="submit" class="btn btn-primary w-100">
    Simpan Perubahan
</button>

</form>


</div>

</div>

</body>
</html>