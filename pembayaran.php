
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Sendiri -->
    <link rel="stylesheet" href="assets/css/main.css">
<title>Pendaftaran - SMART BIMBEL EDUCATION</title>


</head>

<body class="index-page">

<!-- TOP HEADER -->
<div class="top-header">
    <h2>SMART BIMBEL EDUCATION</h2>
</div>

<!-- NAVBAR -->
<header class="main-navbar">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
    <img src="assets/img/logo.jpeg"
     alt="Logo"
     class="logo-navbar me-2">
    <div>
        <span class="fw-bold">SMART BIMBEL</span>
    </div>
</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto fs-5">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Tentang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#index.php">Program</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Galeri</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Kontak</a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-warning ms-2" href="pembayaran.php">
                        Bayar Sekarang
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

if(isset($_POST['submit'])){

    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $paket  = $_POST['paket'];
    $kontak = $_POST['kontak'];
    $metode = $_POST['metode'];

    $ext = pathinfo($_FILES['bukti']['name'], PATHINFO_EXTENSION);
    $bukti = time().rand(100,999).".".$ext;

    $tmp = $_FILES['bukti']['tmp_name'];

    $folder = "uploads/";

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    move_uploaded_file($tmp, $folder.$bukti);

    $sql = "
INSERT INTO pembayaran
(nama,alamat,paket,kontak,metode,bukti)
VALUES
('$nama','$alamat','$paket','$kontak','$metode','$bukti')
";

$query = mysqli_query($koneksi,$sql);

if($query){

    echo "
    <script>
    alert('Pembayaran berhasil dikirim. Bukti pembayaran akan dicek admin.');
    window.location='pembayaran.php';
    </script>
    ";

}else{

    echo "Gagal : ".mysqli_error($koneksi);

}
}
?>



<div class="container">

    <div class="judul-pembayaran">
        Form Pembayaran Smart Bimbel Education
    </div>

    <h2>Form Pembayaran</h2>

    <form method="POST" enctype="multipart/form-data">

        <input type="text" name="nama" placeholder="Masukkan Nama" class="input-box" required>

        
        <input type="text" name="alamat" placeholder="Masukkan Alamat" class="input-box" required>
        <select name="paket" class="input-box" required>
    <option value="">Pilih Paket</option>
    <option value="SD">SD</option>
    <option value="SMP">SMP</option>
    <option value="SMA">SMA</option>
    <option value="Gap Year">Gap Year</option>
</select>
        <input type="text" name="kontak" placeholder="Masukkan Kontak" class="input-box" required>

        <select name="metode" id="metode" class="input-box" required>
            <option value="">Pilih Metode</option>
            <option>QRIS</option>  
        </select>
        <div class="qris-box" id="qrisBox"
style="display:none;text-align:center;margin-bottom:15px;">

    <h4>Scan QRIS Berikut</h4>

    <img src="assets/img/qr.jpeg"
         width="250"
         alt="QRIS">

    <p>Silakan scan QRIS sebelum menyimpan pembayaran.</p>

    <input type="file"
           name="bukti"
           class="input-box"
           accept="image/*"
           required>

</div>

        <button type="submit" name="submit" class="btn-submit">
    Bayar Sekarang
</button>
    </form>

</div>

<script>
document.addEventListener("DOMContentLoaded", function(){

    const metode = document.getElementById("metode");
    const qrisBox = document.getElementById("qrisBox");

    metode.addEventListener("change", function(){

        if(this.value === "QRIS"){
            qrisBox.style.display = "block";
        }else{
            qrisBox.style.display = "none";
        }

    });

});
</script>
</body>
</html>


