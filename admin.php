<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

// DASHBOARD STATISTIK
$total = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT COUNT(*) as t FROM pembayaran"))['t'];

$uang = mysqli_fetch_assoc(mysqli_query($koneksi,"
SELECT SUM(uang_pendaftaran) as u FROM pembayaran
"))['u'];

$menunggu = mysqli_fetch_assoc(mysqli_query($koneksi,"
SELECT COUNT(*) as m FROM pembayaran WHERE status='menunggu'
"))['m'];

$diterima = mysqli_fetch_assoc(mysqli_query($koneksi,"
SELECT COUNT(*) as d FROM pembayaran WHERE status='diterima'
"))['d'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin Smart Bimbel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-primary px-4">
  <span class="navbar-brand fw-bold">Smart Bimbel Admin</span>
  <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
</nav>

<div class="container mt-4">

<!-- HERO -->
<div class="p-4 bg-white shadow-sm rounded mb-4">
  <h3>👋 Selamat Datang Admin</h3>
  <h4>Kelola pendaftar, konten website, dan laporan pembayaran.</h4>
</div>

<!-- 📊 STATISTIK -->
<div class="row g-3">

  <div class="col-md-3">
    <div class="card p-3 text-center admin-card">
      <h5>Total Pendaftar</h5>
      <h3><?= $total ?></h3>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card p-3 text-center admin-card">
      <h5>Total Uang</h5>
      <h3>Rp <?= number_format($uang) ?></h3>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card p-3 text-center admin-card">
      <h5>Menunggu</h5>
      <h3><?= $menunggu ?></h3>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card p-3 text-center admin-card">
      <h5>Diterima</h5>
      <h3><?= $diterima ?></h3>
    </div>
  </div>

</div>

<!-- MENU ADMIN -->
<div class="row mt-4 g-3">

  <div class="col-md-4">
    <a href="edit_hero.php" class="text-decoration-none">
      <div class="card admin-card p-3 text-center">
        <h5>Hero</h5>
        <p>Edit halaman utama</p>
      </div>
    </a>
  </div>
<div class="col-md-4">
    <a href="edit_tentang.php" class="text-decoration-none">
        <div class="card admin-card p-3 text-center">
            <h5>Tentang Kami</h5>
            <p>Edit profil, alamat, maps & kontak</p>
        </div>
    </a>
</div>
 <div class="col-md-4">
    <a href="edit_testimoni.php" class="text-decoration-none">
        <div class="card admin-card p-3 text-center">
            <h5>Testimoni</h5>
            <p>Edit Testimoni</p>
        </div>
    </a>
</div>
  <div class="col-md-4">
    <a href="edit_program.php" class="text-decoration-none">
      <div class="card admin-card p-3 text-center">
        <h5>Program</h5>
        <p>Kelola kelas bimbel</p>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="edit_tutor.php" class="text-decoration-none">
      <div class="card admin-card p-3 text-center">
        <h5>Tutor</h5>
        <p>Data pengajar</p>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="edit_event.php" class="text-decoration-none">
      <div class="card admin-card p-3 text-center">
        <h5>Event</h5>
        <p>Kegiatan bimbel</p>
      </div>
    </a>
  </div>

  <div class="col-md-4">
    <a href="pembayaran_admin.php" class="text-decoration-none">
      <div class="card admin-card p-3 text-center bg-success text-white">
        <h5>Pembayaran</h5>
        <p>Data transaksi</p>
      </div>
    </a>
  </div>

</div>

</div>

</body>
</html>