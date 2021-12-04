<?php 
	
	if(!isset($_GET["nama"]) ||
		!isset($_GET["nrp"]) ||
		!isset($_GET["email"]) ||
		!isset($_GET["jurusan"]) ||
		!isset($_GET["gambar"])
	 )
	{
		// redirect ke halaman 1 jika tidak ada data yg dikirim
		header("Location: latihan1.php");
		exit();
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detail Mahasiswa</title>
</head>
<body>
	<ul>
		<li><img src="<?= $_GET["image"] ?>"></li>
		<li><?= $_GET["nama"] ?></li>
		<li><?= $_GET["nrp"] ?></li>
		<li><?= $_GET["email"] ?></li>
		<li><?= $_GET["jurusan"] ?></li>
	</ul>
	<a href="latihan1.php">Kembali</a>
</body>
</html>