<?php

include 'koneksi.php';

$nama   = $_POST['nama'];
$kelas  = $_POST['kelas'];
$alamat = $_POST['alamat'];
$nohp   = $_POST['nohp'];
$paket  = $_POST['paket'];

$sql = "
INSERT INTO pendaftaran
(nama,kelas,alamat,nohp,paket)
VALUES
('$nama','$kelas','$alamat','$nohp','$paket')
";

$query = mysqli_query($koneksi,$sql);

if($query){

    echo "
    <script>
    alert('Pendaftaran Berhasil');
    window.location='pembayaran.php';
    </script>
    ";

}else{

    echo 'Gagal : '.mysqli_error($koneksi);

}

?>