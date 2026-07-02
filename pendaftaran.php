
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
         width="200"
         class="me-2">

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
                    <a class="nav-link" href="index.html">Kontak</a>
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

   

</header>

<!-- BANNER -->
<div class="banner-daftar">
    <img src="assets/img/test.jpeg" alt="Banner">

    <div class="banner-text">
        <h1>Pendaftaran Siswa Baru</h1>
        <h2>Bergabung Bersama Smart Bimbel Education</h2>
    </div>
</div>

<!-- FORM -->
<div class="container-pendaftaran">

    <h2>FORM PENDAFTARAN</h2>

    <p class="subjudul">
        Silakan lengkapi data berikut untuk bergabung bersama Smart Bimbel Education.
    </p>

    <form action="simpan_pendaftaran.php" method="POST">

        <input type="text"
               name="nama"
               placeholder="Nama Lengkap"
               class="input-box"
               required>

        <input type="text"
               name="kelas"
               placeholder="Contoh: Kelas 6 SD / Kelas 9 SMP"
               class="input-box"
               required>

        <textarea name="alamat"
                  placeholder="Alamat Lengkap"
                  rows="4"
                  class="input-box"
                  required></textarea>

        <input type="text"
               name="nohp"
               placeholder="Nomor WhatsApp"
               class="input-box"
               required>

        <select name="paket"
                class="input-box"
                required>
            <option value="">Pilih Paket</option>
            <option>SD</option>
            <option>SMP</option>
            <option>SMA</option>
            <option>Gap Year</option>
        </select>

        <button type="submit" class="btn-submit">
            Daftar Sekarang
        </button>

    </form>

</div>

</body>
</html>
