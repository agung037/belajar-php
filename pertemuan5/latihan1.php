<?php 

	// elemen pada array boleh memiliki tipe data yang berbeda
	$angka = [1,4,2,5,7,2,3,6,9, 19];

 ?>



	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Latihan 2</title>
		<style type="text/css">
		.kotak{
			width: 50px;
			height: 50px;
			background-color: salmon;
			text-align: center;
			line-height: 50px;
			margin:  3px;
			float:  left;
		}
		</style>
	</head>
	<body>

		<br>


		<?php foreach($angka as $a){ ?>

			<div class="kotak"><?php echo $a ?></div>

		<?php } ?>


		<div class="clear"></div>

		<?php foreach($angka as $a) : ?>
			<div class="kotak"> <?php echo $a ?></div>
		<?php endforeach ?>

	</body>
	</html>