<?php 
session_start();
if(!isset($_SESSION['iduser'])) {
	echo "<script>window.location='login.php';</script>";
}
include "+koneksi1.php";

$id = $_GET['id'];
$param = array(':id' => $id);

$query = $con->prepare("DELETE FROM pelapor WHERE id = :id");

if($query->execute($param)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='pelapor.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus'); window.location='pelapor.php';</script>";
}
?>