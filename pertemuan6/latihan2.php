<?php 

$mahasiswa = [
				[
					"nama" => "Sandhika Galih",
					"nrp" => "87323",
					"email" => "asd@Galih.com",
					"jurusan" => "Teknik Kimia",
					"gambar" => "dika.jpg"
				],			
				[
					"nama" => "Lukman Sardi",
					"nrp" => "44234",
					"email" => "Lukman@Galih.com",
					"jurusan" => "Teknik Kimia",
					"gambar" => "mila.jpg"
				],			
				[
					"nama" => "Nasirov",
					"nrp" => "235672",
					"email" => "Suryana@Galih.com",
					"jurusan" => "Teknik Geologi",
					"gambar" => "marco.jpg"
				],
			 ];
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Daftar Mahasiswa</title>
</head>
<body>

	<h1>Daftar Mahasiswa</h1>

	<?php foreach($mahasiswa as $m) : ?>

		<ul>
			<li>
				<img src="<?php echo $m["gambar"] ?>">
			</li>
			<li>Nama : <?php echo $m["nama"] ?></li>
			<li>Nrp : <?php echo $m["nrp"] ?></li>
			<li>Email : <?php echo $m["email"] ?></li>
			<li>Jurusan : <?php echo $m["jurusan"] ?></li>
		</ul>

	<?php endforeach ?>


</body>
</html>