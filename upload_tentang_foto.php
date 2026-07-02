<?php
include "koneksi.php";

$files = $_FILES['foto'];
$jumlah = count($files['name']);

for ($i = 0; $i < $jumlah; $i++) {

    $namaFile = time() . "_" . $files['name'][$i];
    $tmp = $files['tmp_name'][$i];

    move_uploaded_file($tmp, "assets/img/" . $namaFile);

    mysqli_query($koneksi, "INSERT INTO tentang_foto (foto) VALUES ('$namaFile')");
}

echo "<script>
alert('Upload berhasil');
window.location='edit_tentang.php';
</script>";
?>