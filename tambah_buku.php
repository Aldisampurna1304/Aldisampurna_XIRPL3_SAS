
<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO buku
    (judul, penulis, stok)
    VALUES ('$judul', '$penulis', '$stok')";

    mysqli_query($koneksi, $query);

    header("Location:buku.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Buku</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Tambah Buku</h2>

<form method="POST">

<label>Judul Buku</label>
<input type="text" name="judul" required>

<label>Penulis</label>
<input type="text" name="penulis" required>

<label>Stok</label>
<input type="number" name="stok" required>

<button type="submit" name="simpan">Simpan</button>

</form>

</div>
</body>
</html>
