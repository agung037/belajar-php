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
 	<title></title>
 </head>
 <body>
 	<h1>Daftar Mahasiswa</h1>

	<?php foreach ( $mahasiswa as $m ) : ?>
		
		<li>
			<a href="latihan2.php?nama=<?= $m['nama']?>&nrp=<?= $m['nrp']?>&email=<?= $m['email'] ?>&jurusan=<?=$m['jurusan']?>&image=<?= $m["gambar"] ?>"><?= $m["nama"] ?></a>
		</li>

	<?php endforeach ?>

 </body>
 </html>

