
<?php
include 'koneksi.php';

$id = (int) $_POST['id'];

mysqli_query($koneksi,
"DELETE FROM anggota WHERE id_anggota=$id");

header("Location: anggota.php");
exit;
?>
