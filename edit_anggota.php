
<?php
include 'koneksi.php';

$id = (int) $_GET['id'];

$data = mysqli_query($koneksi,
"SELECT * FROM anggota WHERE id_anggota=$id");

$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    mysqli_query($koneksi, "UPDATE anggota SET
    nama='$nama',
    kelas='$kelas'
    WHERE id_anggota=$id");

    header("Location: anggota.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Anggota</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Edit Anggota</h2>

<form method="POST">

<label>Nama</label>
<input type="text" name="nama"
value="<?= htmlspecialchars($row['nama']); ?>">

<label>Kelas</label>
<input type="text" name="kelas"
value="<?= htmlspecialchars($row['kelas']); ?>">

<button type="submit" name="update">Update</button>

</form>
</div>
</body>
</html>
