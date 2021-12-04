<?php 

if(isset($_POST["submit"])){
	// cek apakah username dan password benar
	$username = "admin";
	$password = "pikapika";

	if($_POST["username"] == $username && $_POST['password'] == $password)
	{
		// redirect ke hal admin
		header("Location: admin.php");
		exit;
	}
	else
	{
		$error = true;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Admin s</title>
</head>
<body>
<h1>Login Admin</h1>	
		

<?php if(isset($error)) : ?>
		<p style="color: red;">Username / password salah</p>
<?php endif ?>

<ul>

	<form action="" method="post">
		<li>
			<label for="username">Username : </label>
			<input type="text" name="username" id="username">
		</li>
		<li>
			<label for="password">Password : </label>
			<input type="password" name="password" id="password">
		</li>
		<li>
			<button type="submit" name="submit">Login</button>
		</li>
	</form>
</ul>



</body>
</html>