<?php
include "koneksi.php";

// Tambah Data
if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $nohp = $_POST['nohp'];

    mysqli_query($conn,"INSERT INTO karyawan(nama,jabatan,nohp)
    VALUES('$nama','$jabatan','$nohp')");

    header("Location:index.php");
}

// Hapus Data
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];

    mysqli_query($conn,"DELETE FROM karyawan WHERE id='$id'");

    header("Location:index.php");
}

$data = mysqli_query($conn,"SELECT * FROM karyawan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Karyawan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h3>Daftar Karyawan</h3>

</div>

<div class="card-body">

<form method="POST">

<input type="text" name="nama" class="form-control mb-2" placeholder="Nama Karyawan" required>

<input type="text" name="jabatan" class="form-control mb-2" placeholder="Jabatan" required>

<input type="text" name="nohp" class="form-control mb-3" placeholder="No HP" required>

<button class="btn btn-success" name="tambah">
Tambah
</button>

</form>

<hr>

<table class="table table-bordered table-hover">

<tr class="table-primary">

<th>ID</th>
<th>Nama</th>
<th>Jabatan</th>
<th>No HP</th>
<th>Aksi</th>

</tr>

<?php while($d=mysqli_fetch_assoc($data)){ ?>

<tr>

<td><?= $d['id']; ?></td>

<td><?= $d['nama']; ?></td>

<td><?= $d['jabatan']; ?></td>

<td><?= $d['nohp']; ?></td>

<td>

<a href="?hapus=<?= $d['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</div>

</div>

</body>
</html>