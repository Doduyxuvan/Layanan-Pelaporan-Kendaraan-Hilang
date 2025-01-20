<?php
session_start();
if(!isset($_SESSION['iduser'])) {
    echo "<script>window.location='login.php';</script>";
    exit();
}

include "+koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Formulir</title>
    <!-- Tambahkan link ke Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style type="text/css">
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .judul {
            background-color: #007BFF;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .judul h2, .judul h3 {
            margin: 0;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #007BFF;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #ff3333;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .nav-logo img {
            width: 50px; /* Adjust the width as needed */
            height: auto;
        }

        #main {
            transition: margin-left .5s;
            padding: 0px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 2;
        }

        .openbtn:hover {
            background-color: #0056b3;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container a {
            text-decoration: none;
        }

        .container button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .container button:hover {
            background-color: #218838;
        }

        form {
            background-color: #ECF0F1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: 20px auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input[type="text"], input[type="submit"], button {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"], button {
            background-color: #4CAF50;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #45a049;
        }

        select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            outline: none;
            cursor: pointer;
        }

        select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        select option {
            padding: 10px;
        }

        .center-image {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
        }
    </style>
    <meta charset="UTF-8">
</head>

<body>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="nav-logo">
        <img src="img/your-logo1.png" alt="Logo">
    </div>
    <a href="home.php"><i class="fas fa-home"></i> Home</a>
    <a href="petugas.php"><i class="fas fa-user"></i> Data Petugas</a>
    <a href="pelapor.php"><i class="fas fa-exclamation"></i> Data Pelapor</a>
    <a href="curanmor.php"><i class="fas fa-plus"></i> Data Curanmor</a>
    <a href="kendaraan.php"><i class="fas fa-database"></i> Data Kendaraan</a>
    <a href="form1.html"><i class="fas fa-file-alt"></i> Laporan Curanmor</a>
    <a href="form.html"><i class="fas fa-file-alt"></i> Laporan Kehilangan</a>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div id="main">
    <div class="judul">
        <span class="openbtn" onclick="openNav()">&#9776; Menu</span>
        <h2>Website Pendataan Kehilangan Kendaraan Roda Dua</h2>
        <h3>Polsek Hutaimbaru Kota Padangsidimpuan</h3>
    </div>
    <img src="img/walpaper.jpg" alt="Deskripsi gambar" width="1538" height="350" class="center-image">
    <div style="max-width: 1400px; margin: 0 auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h1 style="font-size: 2.5em; margin-bottom: 20px; color: #444;">Selamat Datang di Website Pelaporan Kehilangan Kendaraan Roda Dua</h1>
        <p style="font-size: 1.2em; margin-bottom: 20px; text-align: justify; font-weight: normal;">Kami mengerti bahwa kehilangan kendaraan adalah pengalaman yang sangat tidak menyenangkan. Di sini, kami hadir untuk membantu Anda melalui proses pelaporan dengan cara yang mudah, cepat, dan efisien. Kami berkomitmen untuk memberikan layanan terbaik dan mendukung Anda selama proses ini. Jangan ragu untuk menghubungi tim kami jika Anda membutuhkan bantuan lebih lanjut. Terima kasih telah mempercayakan kami sebagai mitra Anda dalam menangani kehilangan kendaraan. Semoga kendaraan Anda dapat segera ditemukan.</p>
    </div>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>

</body>
</html>
