<?php
include "koneksi.php";

if(!isset($_FILES['foto']) || empty($_FILES['foto']['name'][0])){
    echo "<script>
    alert('Tidak ada file yang dipilih!');
    window.location='edit_tentang.php';
    </script>";
    exit;
}

$files = $_FILES['foto'];
$jumlah = count($files['name']);

for ($i = 0; $i < $jumlah; $i++) {

    if($files['name'][$i] != ''){

        $namaFile = time() . "_" . $files['name'][$i];
        $tmp = $files['tmp_name'][$i];

        move_uploaded_file($tmp, "assets/img/" . $namaFile);

        mysqli_query($koneksi, "INSERT INTO tentang_foto (foto) VALUES ('$namaFile')");
    }
}

echo "<script>
alert('Upload berhasil');
window.location='edit_tentang.php';
</script>";
?>