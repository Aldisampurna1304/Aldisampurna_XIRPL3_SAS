
<?php
include 'koneksi.php';

$id = (int) $_POST['id'];

mysqli_query($koneksi,
"DELETE FROM buku WHERE id_buku=$id");

header("Location:buku.php");
header("Location:buku.php");
exit;
?>
