<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>POST</title>
</head>
<body>

	<?php if(isset($_POST['submit'])) : ?>
		<h1>Halo Selamat Datang <?= $_POST["nama"]; ?></h1>
	<?php endif; ?>

	<form action="latihan3.php" method="POST">
		<label>Masukan Nama : </label>
		<input type="text" name="nama" value="">
		<br>
		<button type="submit" name="submit">Kirim</button>
	</form>

</body>
</html>