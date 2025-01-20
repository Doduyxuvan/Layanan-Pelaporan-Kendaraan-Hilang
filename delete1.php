<?php
// INCLUDE KONEKSI KE DATABASE
include("config1.php");

// AMBIL DATA ID DI URL
$id = $_GET['id'];

// AMBIL NAMA FILE FOTO SEBELUMNYA
$data = mysqli_query($mysqli, "SELECT gambar FROM petugas WHERE id='$id'");
$dataImage = mysqli_fetch_assoc($data);
$oldImage = $dataImage['gambar'];

// DELETE GAMBAR LAMA
$link = "image/" . $oldImage;
unlink($link);

// DELETE DATA DARI TABLE
$result = mysqli_query($mysqli, "DELETE FROM petugas WHERE id=$id");

// REDIRECT KE index.php
header("Location:petugas.php");
