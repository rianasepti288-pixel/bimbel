<?php
include "koneksi.php";


$hero = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM hero LIMIT 1"));
$tentang = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM tentang LIMIT 1"));

$program = mysqli_query($koneksi,"SELECT * FROM program");
$event   = mysqli_query($koneksi,"SELECT * FROM event ORDER BY tanggal ASC");
$tutor   = mysqli_query($koneksi,"SELECT * FROM tutor");
$testimoni = mysqli_query($koneksi,"SELECT * FROM testimoni");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- CSS -->
<link rel="stylesheet" href="assets/css/main.css">


    <title>Smart Bimbel</title>
</head>
<body>

<!-- Navbar -->
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
                    <a class="nav-link" href="#home">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tentang">Tentang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#program">Program</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#event">Event</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#tutor">Tutor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                  
                <li class="nav-item">
                    <a class="btn btn-warning ms-2" href="pendaftaran.php">
                        Daftar Sekarang
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
        


<!-- HERO -->
<section class="hero">
    <img src="assets/img/<?= $hero['gambar'] ?>" class="hero-bg">

    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1><?= $hero['judul'] ?></h1>
        <p><?= $hero['deskripsi'] ?></p>
    </div>
</section>
<!-- tentang -->
<section class="tentang">

  <div class="tentang-text">
    <h2><?= $tentang['judul'] ?></h2>
    <h4><?= $tentang['deskripsi'] ?></h4>

    <img src="assets/img/<?= $tentang['gambar'] ?>" alt="">

    <div class="tentang-gallery">
        <?php
        $fotoQuery = mysqli_query($koneksi, "SELECT * FROM tentang_foto");

        if($fotoQuery && mysqli_num_rows($fotoQuery) > 0){
            while($f = mysqli_fetch_assoc($fotoQuery)){
        ?>
                <img src="assets/img/<?= $f['foto'] ?>">
        <?php
            }
        } else {
            echo "Belum ada foto gallery";
        }
        ?>
    </div>
</div>

</section>

  
<!-- TESTIMONI SECTION -->

<section id="testimoni" class="py-5">
<div class="container">

<h2 class="text-center mb-5">Testimoni</h2>

<div class="row g-4">

<?php while($t = mysqli_fetch_assoc($testimoni)) { ?>

<div class="col-md-4">
    <div class="card shadow border-0 h-100">

    <img src="assets/img/<?= $t['foto'] ?>" class="card-img-top">

    <div class="card-body text-center">

        <h4><?= $t['nama'] ?></h4>

        <div class="text-warning fs-4">★★★★★</div>

        <p>"<?= $t['pesan'] ?>"</p>

    </div>

</div>

</div>

<?php } ?>

</div>

</div>
</section>


    
<!-- Program -->
<section id="program" class="py-5">
<div class="container">

<h2 class="text-center mb-4">Program Kami</h2>

<div class="row g-4">

<?php while($p = mysqli_fetch_assoc($program)) { ?>

<div class="col-md-4">
  <div class="card h-100">
    <img src="assets/img/<?= $p['gambar'] ?>" class="card-img-top" style="height:200px; object-fit:cover;">
    <div class="card-body">
      <h5><?= $p['nama_program'] ?></h5>
      <p><?= $p['deskripsi'] ?></p>
    </div>
  </div>
</div>

<?php } ?>

</div>

</div>
</section>
<!-- event -->
<section id="event" class="py-5 bg-light">
<div class="container">

<h2 class="text-center mb-4">Event</h2>

<div class="row g-4">

<?php while($e = mysqli_fetch_assoc($event)) { ?>

<div class="col-md-4">

  <div class="card h-100 shadow-sm">

    <?php if(!empty($e['foto'])) { ?>
      <img src="assets/img/<?= $e['foto'] ?>" >
        
    <?php } ?>

    <div class="card-body">

      <h5 class="fw-bold"><?= $e['nama_event'] ?></h5>

      <small class="text-muted d-block mb-2">
        <?= date('d M Y', strtotime($e['tanggal'])) ?>
      </small>

      <p class="mb-0"><?= $e['deskripsi'] ?></p>

    </div>

  </div>

</div>

<?php } ?>

</div>

</div>
</section>

<!-- ==========================
     KEUNGGULAN KAMI
========================== -->
<section class="keunggulan py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Keunggulan Kami</h2>
            <p class="text-muted">
                Smart Bimbel Education berkomitmen memberikan layanan pembelajaran
                terbaik untuk membantu siswa meraih prestasi.
            </p>
        </div>

        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card keunggulan-card h-100 text-center p-4">
                    <i class="bi bi-person-workspace icon"></i>
                    <h5 class="mt-3">Pengajar Profesional</h5>
                    <p>
                        Dibimbing oleh tentor yang berpengalaman dan kompeten
                        sehingga proses belajar menjadi lebih efektif.
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card keunggulan-card h-100 text-center p-4">
                    <i class="bi bi-journal-bookmark-fill icon"></i>
                    <h5 class="mt-3">Materi Lengkap</h5>
                    <p>
                        Materi sesuai kurikulum terbaru dan dilengkapi latihan
                        soal yang mudah dipahami.
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card keunggulan-card h-100 text-center p-4">
                    <i class="bi bi-clipboard2-check-fill icon"></i>
                    <h5 class="mt-3">Evaluasi Berkala</h5>
                    <p>
                        Evaluasi dan latihan soal dilakukan secara rutin untuk
                        memantau perkembangan belajar siswa.
                    </p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-4">
                <div class="card keunggulan-card h-100 text-center p-4">
                    <i class="bi bi-laptop icon"></i>
                    <h5 class="mt-3">Pendaftaran Online</h5>
                    <p>
                        Pendaftaran dapat dilakukan secara online dengan proses
                        yang cepat, mudah, dan praktis.
                    </p>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-4">
                <div class="card keunggulan-card h-100 text-center p-4">
                    <i class="bi bi-people-fill icon"></i>
                    <h5 class="mt-3">Pendampingan Belajar</h5>
                    <p>
                        Siswa memperoleh bimbingan dan konsultasi selama proses
                        pembelajaran berlangsung.
                    </p>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-4">
                <div class="card keunggulan-card h-100 text-center p-4">
                    <i class="bi bi-trophy-fill icon"></i>
                    <h5 class="mt-3">Berorientasi Prestasi</h5>
                    <p>
                        Membantu siswa meningkatkan prestasi akademik dan siap
                        menghadapi berbagai ujian.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- tutor -->
<section id="tutor" class="py-5">

<div class="container">
<h2 class="text-center mb-4">Tutor Kami</h2>

<div class="row g-4">

<?php while($t = mysqli_fetch_assoc($tutor)) { ?>

<div class="col-md-4 text-center">

  <div class="card p-3 shadow-sm">

    <img src="assets/img/<?= $t['foto'] ?>">
        
       
    <h5 class="mt-3"><?= $t['nama'] ?></h5>
    <p class="text-muted"><?= $t['mapel'] ?></p>

  </div>

</div>

<?php } ?>

</div>

</div>

</section>


<!-- Kontak -->
<section id="kontak" class="py-5">
<div class="container">

<h2 class="text-center mb-4">Hubungi Kami</h2>

<p>
WA : 08123456789 <br>
Email : smartbimbel@gmail.com
</p>

<form>
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Nama">
    </div>

    <div class="mb-3">
        <input type="email" class="form-control" placeholder="Email">
    </div>

    <div class="mb-3">
        <textarea class="form-control" rows="4" placeholder="Pesan"></textarea>
    </div>

    <button class="btn btn-primary">Kirim Pesan</button>
</form>

</div>
</section>

<!-- Footer -->
<footer class="text-center">
    <p class="mb-0">
        © 2026 Smart Bimbel Education. All Rights Reserved.
    </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
