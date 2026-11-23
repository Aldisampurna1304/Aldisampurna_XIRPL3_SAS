
<?php
include 'koneksi.php';

$buku = mysqli_query($koneksi, "SELECT * FROM buku");
$anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
$pinjam = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE status='Dipinjam'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Sistem Perpustakaan</h2>

<nav>
<a href="index.php">Dashboard</a>
<a href="buku.php">Data Buku</a>
<a href="anggota.php">Anggota</a>
<a href="peminjaman.php">Peminjaman</a>
</nav>

<h3>Dashboard</h3>

<p>Jumlah Buku: <?= mysqli_num_rows($buku); ?></p>
<p>Jumlah Anggota: <?= mysqli_num_rows($anggota); ?></p>
<p>Buku Dipinjam: <?= mysqli_num_rows($pinjam); ?></p>

</div>
</body>
</html>
