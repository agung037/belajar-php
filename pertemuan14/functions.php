<?php 

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel mahasiswa / query
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

if(!$result)
{
	echo mysqli_error($conn);
}


function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];

	while ( $row = mysqli_fetch_assoc($result))
	{
		$rows[] = $row;
	}

	return $rows;
}


function tambah($data)
{
	global $conn;

    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    
	// upload gambar
	$gambar = upload();
	if ( !$gambar )
	{
		return false;
	}

    $query = "INSERT INTO mahasiswa
             VALUES 
             ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}



function upload()
{
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang di upload
	// error 4 artinya tidak ada gambar yang di upload
	if($error === 4)
	{
		echo "<script> alert('pilih gambar terlebih dahulu') </script>";
		return false;
	}

	// cek apakah yang di upload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if(!in_array($ekstensiGambar, $ekstensiGambarValid))
	{
		echo "<script> alert('yang anda upload bukan gambar') </script>";
		return false;
	}

	// cek jika ukuran terlalu besar
	if ( $ukuranFile > 2000000)
	{
		echo "<script> alert('ukuran gambar terlalu besar') </script>";
		return false;
	}

	// lolos pengecekan, gambar siap di upload
	// generate gambar baru 
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
	{
		return $namaFileBaru;
	}
}


function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

	return mysqli_affected_rows($conn);
}


function ubah($data)
{
	global $conn;

	$id = $data["id"];
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
	$gambarLama = htmlspecialchars($data['gambarLama']);

	// cek apakah user pilih gambar baru atau tidak
	if($_FILES['gambar']['error'] === 4)
	{
		$gambar = $gambarLama;
	} else {

		$gambar = upload();
	}

    $query = "UPDATE mahasiswa SET 
    		nrp = '$nrp',
    		nama = '$nama',
    		email = '$email',
    		jurusan = '$jurusan',
    		gambar = '$gambar' WHERE id = $id
    		";
    

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


function cari($keyword)
{
	$query = "SELECT * FROM mahasiswa
				WHERE 
				nama LIKE '%$keyword%' OR 
				nrp LIKE '%$keyword%' OR
				email LIKE '%$keyword%' OR
				jurusan LIKE '%$keyword%'

	";

	return query($query);
}


function registrasi($data)
{
	global $conn;

	// membersihkan username dari slash dan huruf besar
	$username = strtolower(stripslashes($data["username"]));

	// cara memasitkan data masuk dengan aman ke mysqli
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek apakah user sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if(mysqli_fetch_assoc($result))
	{
		echo "
			<script>
				alert('username sudah ada');
			</script>
		";
		return false;
	}

	// cek konfirmasi passowrd
	if($password !== $password2)
	{
		echo "
				<script>
					alert('konfirmasi password tidak sesuai!');
				</script>
			";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");


	return mysqli_affected_rows($conn);
}



?>

