
<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    mysqli_query($koneksi, "INSERT INTO anggota
    (nama, kelas) VALUES ('$nama', '$kelas')");

    header("Location: anggota.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Anggota</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Tambah Anggota</h2>

<form method="POST">

<label>Nama</label>
<input type="text" name="nama" required>

<label>Kelas</label>
<input type="text" name="kelas" required>

<button type="submit" name="simpan">Simpan</button>

</form>
</div>
</body>
</html>
