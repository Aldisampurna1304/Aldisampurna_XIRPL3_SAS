
<?php
include 'koneksi.php';

$anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
$buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE stok > 0");

if (isset($_POST['simpan'])) {

    $id_anggota = (int) $_POST['id_anggota'];
    $id_buku = (int) $_POST['id_buku'];
    $tanggal = $_POST['tanggal_pinjam'];

    mysqli_begin_transaction($koneksi);

    $cek = mysqli_query($koneksi,
    "SELECT stok FROM buku WHERE id_buku=$id_buku FOR UPDATE");

    $hasil = mysqli_fetch_assoc($cek);

    if ($hasil && $hasil['stok'] > 0) {

        mysqli_query($koneksi, "INSERT INTO peminjaman
        (id_anggota, id_buku, tanggal_pinjam)
        VALUES ($id_anggota, $id_buku, '$tanggal')");

        mysqli_query($koneksi,
        "UPDATE buku SET stok=stok-1 WHERE id_buku=$id_buku");

        mysqli_commit($koneksi);

        header("Location: peminjaman.php");
        exit;

    } else {
        mysqli_rollback($koneksi);
        $error = "Stok buku tidak tersedia";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Peminjaman</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Tambah Peminjaman</h2>

<?php if(isset($error)) echo $error; ?>

<form method="POST">

<label>Anggota</label>
<select name="id_anggota" required>
<option value="">Pilih Anggota</option>
<?php while($a=mysqli_fetch_assoc($anggota)) { ?>
<option value="<?= $a['id_anggota']; ?>">
<?= htmlspecialchars($a['nama']); ?>
</option>
<?php } ?>
</select>

<label>Buku</label>
<select name="id_buku" required>
<option value="">Pilih Buku</option>
<?php while($b=mysqli_fetch_assoc($buku)) { ?>
<option value="<?= $b['id_buku']; ?>">
<?= htmlspecialchars($b['judul']); ?>
</option>
<?php } ?>
</select>

<label>Tanggal Pinjam</label>
<input type="date" name="tanggal_pinjam"
value="<?= date('Y-m-d'); ?>" required>

<button type="submit" name="simpan">Simpan</button>

</form>
</div>
</body>
</html>
