<?php

    function salam($waktu = "Datang", $nama = "admin")
    {
        return "Selamat $waktu, $nama!";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>latihan function</title>
</head>
<body>
    <h1> <?php echo salam(); ?></h1>
</body>
</html>