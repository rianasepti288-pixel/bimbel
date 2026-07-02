<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Testimoni</title>

    <!-- kalau pakai bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">
    <h3>Tambah Testimoni</h3>

    <form method="POST" action="simpan_testimoni.php" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pesan</label>
            <textarea name="pesan" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="edit_testimoni.php" class="btn btn-secondary">
            Kembali
        </a>

    </form>
</div>

</body>
</html>