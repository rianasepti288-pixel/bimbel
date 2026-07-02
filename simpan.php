<?php

include "koneksi.php";

$nama    = $_POST['name'];
$email   = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$query = mysqli_query($koneksi,"
INSERT INTO pesan
(nama,email,subject,message)
VALUES
('$nama','$email','$subject','$message')
");

if($query){
    echo "
    <script>
        alert('Pesan berhasil dikirim');
        window.location.href='contact.html';
    </script>";
}else{
    echo "
    <script>
        alert('Pesan gagal dikirim');
        history.back();
    </script>";
}
?>