<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$data = mysqli_query($koneksi,"SELECT * FROM landing_page WHERE id=1");
$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Kelola Landing Page</title>

<link rel="stylesheet" href="assets/css/admin.css">

</head>
<body>

<div class="container">

<div class="card">

<h2>Kelola Landing Page</h2>
<?php
if(isset($_GET['status']) && $_GET['status']=="sukses"){
?>
<div class="alert-success">
    Data Landing Page berhasil diperbarui.
</div>
<?php } ?>

<form action="update_landing.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $d['id']; ?>">

<label>Judul Website</label>

<input
type="text"
name="judul"
value="<?= $d['judul']; ?>"
required>

<label>Sub Judul</label>

<textarea
name="subjudul"
rows="3"
required><?= $d['subjudul']; ?></textarea>

<label>Tentang Kami</label>

<textarea
name="tentang"
rows="5"
required><?= $d['tentang']; ?></textarea>

<label>Program Bimbel</label>

<textarea
name="program"
rows="5"
required><?= $d['program']; ?></textarea>

<label>Kontak</label>

<textarea
name="kontak"
rows="3"
required><?= $d['kontak']; ?></textarea>

<label>Banner Saat Ini</label>

<br><br>

<img src="assets/img/<?= $d['gambar']; ?>" width="250">

<br><br>

<label>Ganti Banner</label>

<input
type="file"
name="gambar">

<br><br>

<button type="submit" class="btn">
Simpan Perubahan
</button>

<a href="admin.php" class="btn logout">
Kembali
</a>

</form>

</div>

</div>

</body>
</html>