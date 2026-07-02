<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM event WHERE id='$id'");

header("Location: edit_event.php");
?>