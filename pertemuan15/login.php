<?php 

require 'functions.php';

    if(isset($_POST["login"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // query username ke database
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        // cek apakah username ada di database
        if (mysqli_num_rows($result) === 1)
        {
            // dapatkan data dari db
            $row = mysqli_fetch_assoc($result);

            // verifikasi password
            if (password_verify($password, $row["password"])){
                header("Location: index.php");
                exit;
            };
            
        }

        $error = true;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>

<?php if(isset($error)) :?>
    <p style="color:red; font-style: italic">username / password salah</p>
<?php endif; ?>

    <form action="" method="POST">

        <ul>
            <li>
                <label for='username'>username : </label>
                <input type='text' name='username' id='username'>
            </li>
            <li>
                <label for='password'>Password : </label>
                <input type='password' name='password' id='password'>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>

    </form>

</body>
</html>