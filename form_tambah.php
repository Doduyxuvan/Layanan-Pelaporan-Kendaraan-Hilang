<?php
session_start();
if(!isset($_SESSION['iduser'])) {
    echo "<script>window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kendaraan | Website Pendataan Roda Dua</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
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
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .judul {
            background-color: #007BFF;
            color: white;
            padding: 20px;
            text-align: center;
            border-bottom: 3px solid #0056b3;
        }
        .judul h2, .judul h3 {
            margin: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
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
            display: flex;
            flex-direction: column;
        }
        form table {
            width: 100%;
            border-collapse: collapse;
        }
        form table tr td {
            padding: 10px;
        }
        form table tr td:first-child {
            width: 30%;
            text-align: right;
            padding-right: 20px;
            font-weight: bold;
        }
        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        form textarea {
            resize: vertical;
        }
        form button {
            align-self: flex-end;
            background-color: #007BFF;
            padding: 10px 20px;
        }
        form button:hover {
            background-color: #0056b3;
        }
    </style>
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

    <div class="container">
        <a href="index.php">
            <button>&lt; Lihat Semua Data</button>
        </a>

        <h3>Input Data Kendaraan Baru</h3>
        <form action="proses_tambah.php" method="post">        
            <table>
                <tr>
                    <td>Jenis Kendaraan</td>
                    <td><input type="text" name="jenis" required></td>                    
                </tr>    
                <tr>
                    <td>Merk / Type</td>
                    <td><input type="text" name="merk" required></td>                    
                </tr>    
                <tr>
                    <td>Warna Kendaraan</td>
                    <td><input type="text" name="warna" required></td>                    
                </tr>    
                <tr>
                    <td>Tahun Pembuatan</td>
                    <td><input type="number" name="tahun" required></td>                    
                </tr>
                <tr>
                    <td>Bahan Bakar</td>
                    <td><input type="text" name="bbm" required></td>                    
                </tr>    
                <tr>
                    <td>Nomor Polisi</td>
                    <td><input type="text" name="nopol" required></td>                    
                </tr>
                <tr>
                    <td>Nomor Rangka</td>
                    <td><input type="text" name="norangka" required></td>                    
                </tr>
                <tr>
                    <td>Nomor Mesin</td>
                    <td><input type="text" name="nomesin" required></td>                    
                </tr>
                <tr>
                    <td>Pemilik</td>
                    <td><input type="text" name="pemilik" required></td>                    
                </tr>
                <tr>
                    <td>Alamat Pemilik</td>
                    <td><textarea name="alamat" required></textarea></td>                    
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">Simpan</button></td>                    
                </tr>                
            </table>
        </form>
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
