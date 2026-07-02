<?php
include "koneksi.php";

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM program WHERE id='$id'");

header("Location: edit_program.php");
?>