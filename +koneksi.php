<?php 
// koneksi dengan PDO extension

$host = 'localhost';
$db = 'curanmor';
$user = 'root';
$pass = '';

try {
    // Membuat koneksi dengan PDO
    $con = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Mengatur mode error sebagai Exception
} catch(PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
