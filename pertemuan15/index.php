<?php 

session_start();

// cek apakah user sudah login atau belum
// jika belum lempar ke login.php
if(!isset($_SESSION["login"]))
{
	header("Location: login.php");
	exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

$user_input = "";

// jika tombol cari ditekan
if (isset($_POST["cari"]))
{
	$mahasiswa = cari($_POST["keyword"]);
	$user_input = $_POST["keyword"];
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Admin</title>
</head>
<body>

	<a href=logout.php>logout</a>

	<h1>Daftar Mahasiswa</h1>

	<a href="tambah.php">Tambah data mahasiswa</a>
	<br>
	<br>

	<form action="" method="POST">
		
		<input type="text" name="keyword" size="40" autofocus placeholder="keyword pencarian" autocomplete="off"
		value="<?= $user_input ?>"
		>
		<button type="submit" name="cari">Cari</button>

	</form>
	<br>

	<table border="1" cellpadding="10" cellspacing="0">
		
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>

	<?php $i = 1 ?>
	<?php foreach ($mahasiswa as $row) : ?>
		<tr>
			<td><?= $i ?></td>
			<td>
				<a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a>
				|
				<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="
				return confirm('apakah anda yakin ?');
				">hapus</a>
			</td>
			<td>
				
				<img src="img/<?= $row['gambar']; ?>" width="50">
			</td>
			<td><?= $row["nrp"] ?></td>
			<td><?= $row["nama"] ?></td>
			<td><?= $row["email"] ?></td>
			<td><?= $row["jurusan"] ?></td>
		</tr>
	<?php $i++ ?>
	<?php endforeach ?>

	</table>

</body>
</html>