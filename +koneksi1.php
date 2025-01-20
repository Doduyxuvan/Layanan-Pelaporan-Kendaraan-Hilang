<?php 
// koneksi dengan PDO extension

$host = 'localhost';
$db = 'curanmor';
$user = 'root';
$pass = '';

try {
    $con = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>
