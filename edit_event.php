<?php
include "koneksi.php";

// JIKA FORM DIKIRIM (UPDATE)
if(isset($_POST['update'])){

    $id = $_POST['id'];
    $nama = $_POST['nama_event'];
    $tanggal = $_POST['tanggal'];
    $deskripsi = $_POST['deskripsi'];

    // kalau ada foto baru
    if(isset($_FILES['foto']) && $_FILES['foto']['name'] != ''){

        $namaFile = time()."_".$_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        move_uploaded_file($tmp, "assets/img/".$namaFile);

        mysqli_query($koneksi,"
            UPDATE event SET
            nama_event='$nama',
            tanggal='$tanggal',
            deskripsi='$deskripsi',
            foto='$namaFile'
            WHERE id='$id'
        ");

    } else {

        mysqli_query($koneksi,"
            UPDATE event SET
            nama_event='$nama',
            tanggal='$tanggal',
            deskripsi='$deskripsi'
            WHERE id='$id'
        ");
    }

    header("Location: edit_event.php");
    exit;
}

// ambil data
$event = mysqli_query($koneksi,"SELECT * FROM event ORDER BY id DESC");
?>
<?php while($e = mysqli_fetch_assoc($event)) { ?>

<form method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $e['id'] ?>">

    <input type="text" name="nama_event" value="<?= $e['nama_event'] ?>">

    <input type="date" name="tanggal" value="<?= $e['tanggal'] ?>">

    <textarea name="deskripsi"><?= $e['deskripsi'] ?></textarea>

    <img src="assets/img/<?= $e['foto'] ?>" width="100">

    <input type="file" name="foto">

    <button type="submit" name="update">Update</button>

</form>

<hr>

<?php } ?>