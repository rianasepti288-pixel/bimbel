<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$data = mysqli_query($koneksi,"SELECT * FROM pembayaran ORDER BY created_at DESC");

// LAPORAN BULANAN
$laporan = mysqli_query($koneksi,"
SELECT MONTH(created_at) as bulan,
COUNT(*) as total,
SUM(uang_pendaftaran) as total_uang
FROM pembayaran
GROUP BY MONTH(created_at)
");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard Pembayaran</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="assets/css/admin.css">
</head>
<div class="admin-header">

<div>
<h2>Dashboard Pembayaran</h2>
<p>Kelola seluruh data pembayaran siswa</p>
</div>

<div class="d-flex gap-2">
<a href="admin.php" class="admin-btn">
🏠 Dashboard
</a>

<a href="logout.php" class="admin-btn logout">
🚪 Logout
</a>
</div>

</div>
---

<!-- 📈 LAPORAN BULANAN -->
<div class="admin-card">
<h3>📅 Laporan Bulanan</h3>

<table class="admin-table">
<tr>
    <th>Bulan</th>
    <th>Total Pendaftar</th>
    <th>Total Uang</th>
</tr>

<?php while($l=mysqli_fetch_assoc($laporan)){ ?>

<tr>
    <td><?= $l['bulan']; ?></td>
    <td><?= $l['total']; ?></td>
    <td>Rp <?= number_format($l['total_uang']); ?></td>
</tr>

<?php } ?>

</table>
</div>

---

<!-- ➕ TAMBAH PENDAFTAR -->
<div class="admin-card">
<h3>➕ Tambah Pendaftar</h3>

<form method="POST" action="tambah_pendaftar.php" class="admin-form">

<div class="row">

<div class="col-md-6">
<input type="text" name="nama" placeholder="Nama" required>
</div>

<div class="col-md-6">
<input type="text" name="alamat" placeholder="Alamat" required>
</div>

<div class="col-md-6">
<input type="text" name="paket" placeholder="Paket" required>
</div>

<div class="col-md-6">
<input type="text" name="kontak" placeholder="Kontak" required>
</div>

<div class="col-md-6">
<select name="jenis_kelamin">
<option>Jenis Kelamin</option>
<option>Laki-laki</option>
<option>Perempuan</option>
</select>
</div>

<div class="col-md-6">
<input type="number" name="uang_pendaftaran" placeholder="Uang Pendaftaran">
</div>

</div>

<button class="btn-simpan">
Tambah Pendaftar
</button>

</form>
</div>

---

<!-- 📋 DATA PEMBAYARAN -->
<div class="admin-card">
<h3>📋 Data Pembayaran</h3>

<table class="admin-table">

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>JK</th>
    <th>Paket</th>
    <th>Uang</th>
    <th>Status</th>
    <th>Bukti</th>
    <th>Aksi</th>
    <th>Tanggal</th>
</tr>

<?php while($d=mysqli_fetch_assoc($data)){ ?>

<tr>
    <td><?= $d['id']; ?></td>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['jenis_kelamin']; ?></td>
    <td><?= $d['paket']; ?></td>
    <td>Rp <?= number_format($d['uang_pendaftaran']); ?></td>

    <td>
        <?php if($d['status']=="menunggu"){ ?>
            <span class="status-menunggu">Menunggu</span>
        <?php } elseif($d['status']=="diterima"){ ?>
            <span class="status-terima">Diterima</span>
        <?php } else { ?>
            <span class="status-tolak">Ditolak</span>
        <?php } ?>
    </td>

    <td>
        <a href="uploads/<?= $d['bukti']; ?>" target="_blank">
            <img src="uploads/<?= $d['bukti']; ?>" width="80">
        </a>
    </td>

    <td>
       <a href="terima.php?id=<?= $d['id']; ?>" class="btn-terima">
<i class="bi bi-check-lg"></i>
</a>

<a href="tolak.php?id=<?= $d['id']; ?>" class="btn-tolak">
<i class="bi bi-x-lg"></i>
</a>

<a href="hapus.php?id=<?= $d['id']; ?>" class="btn-hapus"
onclick="return confirm('Hapus data?')">
<i class="bi bi-trash"></i>
</a>
    </td>

    <td><?= $d['created_at']; ?></td>
</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>