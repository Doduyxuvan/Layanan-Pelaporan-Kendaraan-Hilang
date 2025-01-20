<?php 
session_start();
if(!isset($_SESSION['iduser'])) {
	echo "<script>window.location='login.php';</script>";
}
include "+koneksi.php";

$params = [
    "id"        => $_POST['id'],
    "nosim"     => $_POST['nosim'],
    "nape"      => $_POST['nape'],
    "tala"     => $_POST['tala'],
    "tela"     => $_POST['tela'],
    "alamat"       => $_POST['alamat'],
    "notel"     => $_POST['notel'],
    "gender"  => $_POST['gender'],
    "pekerjaan"   => $_POST['pekerjaan'],
    "kewar"   => $_POST['kewar']
  ];

$sql = "UPDATE pelapor SET
            nosim = :nosim,
            nape = :nape,
            tala = :tala,
            tela = :tela,
            alamat = :alamat,
            notel = :notel,
            gender = :gender,
            pekerjaan = :pekerjaan,
            kewar = :kewar
        WHERE id = :id";
$query = $con->prepare($sql);
if($query->execute($params)) { // prepare > execute menggunakan parameter array
    echo "<script>alert('Data berhasil diedit'); window.location='pelapor.php';</script>";
} else {
    echo "<script>alert('Data gagal diedit');</script>";
}
?>