<?php 

require 'functions.php';

//nyalakan session
session_start();

// cek apakah ada cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key']))
{
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie(user yg telah di encrypt) dan username versi plain text di db
    if($key === hash('sha256', $row['username']))
    {
        // jika sama maka buat session login
        $_SESSION['login'] = true;
    }


}

// jika user sudah memiliki session login
// redirect ke home
if(isset($_SESSION["login"]))
{
    header("Location: index.php");
    exit;
}


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

                // jika berhasil set session
                $_SESSION["login"] = true;

                header("Location: index.php");

                // apakah remember me di checklist
                if(isset($_POST['remember']))
                {
                    // buat cookie
                    setcookie('id', $row['id'], time() + 60);
                    setcookie('key', hash('sha256', $row['username']));
                }

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

<h1>Halaman Login</h1>
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
                <input type='checkbox' name='remember' id='remember'>
                <label for='remember'>remember me : </label>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>

    </form>

</body>
</html>