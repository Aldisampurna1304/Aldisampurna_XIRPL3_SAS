
<?php
include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM anggota");
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Anggota</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Data Anggota</h2>

<a href="tambah_anggota.php">Tambah Anggota</a>

<table>
<tr>
<th>No</th>
<th>Nama</th>
<th>Kelas</th>
<th>Aksi</th>
</tr>

<?php
$no = 1;
while ($row = mysqli_fetch_assoc($data)) {
?>

<tr>
<td><?= $no++; ?></td>
<td><?= htmlspecialchars($row['nama']); ?></td>
<td><?= htmlspecialchars($row['kelas']); ?></td>
<td>
<a href="edit_anggota.php?id=<?= $row['id_anggota']; ?>">Edit</a>

<form action="hapus_anggota.php" method="POST" style="display:inline">
<input type="hidden" name="id" value="<?= $row['id_anggota']; ?>">
<button>Hapus</button>
</form>
</td>
</tr>

<?php } ?>

</table>
</div>
</body>
</html>
