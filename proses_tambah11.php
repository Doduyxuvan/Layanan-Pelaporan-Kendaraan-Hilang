<?php
session_start();

// Pastikan user telah login
if (!isset($_SESSION['iduser'])) {
    echo "<script>window.location='login.php';</script>";
    exit();
}

// Include file koneksi database
include '+koneksi.php'; // Sesuaikan dengan nama file koneksi Anda

// Tangkap data dari form
$nomor_sim = $_POST['nosim'];
$nama_pelapor = $_POST['nape'];
$tanggal_lahir = $_POST['tala'];
$tempat_lahir = $_POST['tela'];
$alamat = $_POST['alamat'];
$nomor_telepon = $_POST['notel'];
$gender = $_POST['gender'];
$pekerjaan = $_POST['pekerjaan'];
$kewarganegaraan = $_POST['kewar'];

// Query untuk menyimpan data ke dalam tabel
$sql = "INSERT INTO pelapor (nosim, nape, tala, tela, alamat, notel, gender, pekerjaan, kewar) 
        VALUES (:nosim, :nape, :tala, :tela, :alamat, :notel, :gender, :pekerjaan, :kewar)";

try {
    $stmt = $con->prepare($sql);

    // Bind parameter
    $stmt->bindParam(':nosim', $nomor_sim);
    $stmt->bindParam(':nape', $nama_pelapor);
    $stmt->bindParam(':tala', $tanggal_lahir);
    $stmt->bindParam(':tela', $tempat_lahir);
    $stmt->bindParam(':alamat', $alamat);
    $stmt->bindParam(':notel', $nomor_telepon);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':pekerjaan', $pekerjaan);
    $stmt->bindParam(':kewar', $kewarganegaraan);

    $stmt->execute();
    echo "<script>alert('Data berhasil disimpan!');window.location='pelapor.php';</script>";
} catch (PDOException $e) {
    echo "<script>alert('Gagal menyimpan data: " . $e->getMessage() . "');window.location='pelapor.php';</script>";
}
?>
