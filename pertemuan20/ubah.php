<?php

require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id 
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");


// cek apakah submit sudah dipencet
if (isset($_POST["submit"])) {
    // cek apakah data berhasil diubah
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "data gagal diubah";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>

    <h1>Ubah data mahasiswa</h1>

    <form action="" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $mhs[0]["id"]; ?>">
        
        <input type="hidden" name="gambarLama" value="<?= $mhs[0]["gambar"]; ?>">

        <ul>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" value="<?= $mhs[0]["nrp"] ?>">
            </li>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" value="<?= $mhs[0]["nama"] ?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" value="<?= $mhs[0]['email'] ?> ">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs[0]['jurusan'] ?>">
            </li>
            <li>
                
                <label for="gambar">Gambar : </label> <br>
                <img src="img/<?= $mhs[0]['gambar'] ?>" width="70"><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>

    </form>

</body>

</html>