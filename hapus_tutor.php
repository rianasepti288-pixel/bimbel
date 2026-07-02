<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM tutor WHERE id='$id'");

header("Location: edit_tutor.php");
?>