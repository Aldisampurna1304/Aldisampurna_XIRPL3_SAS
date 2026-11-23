
<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Buku</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Data Buku</h2>

<a href="tambah_buku.php">Tambah Buku</a>

<table>
<tr>
<th>No</th>
<th>Judul</th>
<th>Penulis</th>
<th>Stok</th>
<th>Aksi</th>
</tr>

<?php
$no = 1;
while ($row = mysqli_fetch_assoc($data)) {
?>

<tr>
<td><?= $no++; ?></td>
<td><?= htmlspecialchars($row['judul']); ?></td>
<td><?= htmlspecialchars($row['penulis']); ?></td>
<td><?= $row['stok']; ?></td>
<td>
<a href="edit_buku.php?id=<?= $row['id_buku']; ?>">Edit</a>

<form action="hapus_buku.php" method="POST" style="display:inline">
<input type="hidden" name="id" value="<?= $row['id_buku']; ?>">
<button type="submit">Hapus</button>
</form>
</td>
</tr>

<?php } ?>

</table>
</div>
</body>
</html>
