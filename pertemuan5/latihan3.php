<?php 
$mahasiswa = [["Sandhika", "2938", "Teknik Mesin", "Agungk@kasd.com"],
				["Galih", "2938", "Teknik Kimia", "Agungk@kasd.com"],
				["Agung", "2938", "Sastra Mesin", "Agungk@kasd.com"],
				["Kurniawan", "2938", "Teknik Mesin", "Agungk@kasd.com"],
				["Purnomo", "2938", "Teknik Industri", "Agungk@kasd.com"]];
 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>Daftar Mahasiswa</title>
 </head>
 <body>
 	<h2>Daftar mahasiswa</h2>
 	<ul>
 		<?php foreach($mahasiswa[1] as $m) : ?>
 				<li><?php echo $m ?></li>
 		<?php endforeach ?>
 	</ul>
 </body>
 </html>