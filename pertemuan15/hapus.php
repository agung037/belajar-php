<?php 

session_start();

// cek apakah user sudah login atau belum
// jika belum lempar ke login.php
if(!isset($_SESSION["login"]))
{
	header("Location: login.php");
	exit;
}

require 'functions.php';

$id = $_GET['id'];

if( hapus($id) > 0)
{
	echo "
	<script>
	    alert('gata berhasil dihapus');
	    document.location.href = 'index.php';
	</script>

    ";
}
else
{
	echo "
	<script>
	    alert('gata berhasil dihapus');
	    document.location.href = 'index.php';
	</script>

    ";
}

?>