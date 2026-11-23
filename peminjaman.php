
<?php
include 'koneksi.php';

$data = mysqli_query($koneksi, "
SELECT peminjaman.*, anggota.nama, buku.judul
FROM peminjaman
JOIN anggota ON peminjaman.id_anggota=anggota.id_anggota
JOIN buku ON peminjaman.id_buku=buku.id_buku
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Peminjaman</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Data Peminjaman</h2>

<a href="tambah_peminjaman.php">Tambah Peminjaman</a>

<table>
<tr>
<th>No</th>
<th>Nama</th>
<th>Buku</th>
<th>Tanggal Pinjam</th>
<th>Status</th>
</tr>

<?php
$no = 1;
while ($row = mysqli_fetch_assoc($data)) {
?>

<tr>
<td><?= $no++; ?></td>
<td><?= htmlspecialchars($row['nama']); ?></td>
<td><?= htmlspecialchars($row['judul']); ?></td>
<td><?= $row['tanggal_pinjam']; ?></td>
<td><?= $row['status']; ?></td>
</tr>

<?php } ?>

</table>
</div>
</body>
</html>
