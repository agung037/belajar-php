<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Latihan array</title>
	<style type="text/css">

		.kotak{
			width: 30px;
			height: 30px;
			background-color: teal;
			text-align: center;
			color: whitesmoke;
			line-height: 30px;
			margin: 3px;
			float: left;
			transition: 0.8s;
		}

		.kotak:hover{
			transform: rotate(360deg);
			border-radius: 50%;
		}

		.clear{
			clear: both;
		}
	
	</style>
</head>
<body>

	<?php 
		$angka = [
			[1,2,3], 
			[4,5,6], 
			[7,8,9]
		];
	 ?>

	 <?php foreach($angka as $a) : ?>
	 	<?php foreach ($a as $i): ?>
	 		<div class="kotak">
	 			<?php echo $i; ?>
	 		</div>
	 	<?php endforeach ?>
	 	<div class="clear"></div>
	 <?php endforeach ?>



</body>
</html>