<?php
session_start();
if (!isset($_SESSION['iduser'])) {
    echo "<script>window.location='login.php';</script>";
    exit();
}

include "+koneksi.php";
include "check_access.php"; // Include file check_access.php
checkAccess('admin'); // Pastikan hanya admin yang bisa mengakses halaman ini

?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Kendaraan | Web Pendataan</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    .judul h2,
    .judul h3 {
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

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #007BFF;
        color: white;
    }

    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .table tr:hover {
        background-color: #ddd;
    }

    input[type="text"],
    input[type="submit"],
    button {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"],
    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover,
    button:hover {
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
        <div>
        <a href="form_tambah1.php" style="text-decoration: none;">
            <button style="padding: 4px 8px; font-size: 14px; width: 120px;">
            + Tambah Data Baru
            </button>
        </a>
    </div>

        <h3>Data Pelapor</h3>
        <form action="#" method="get">
            <input type="text" name="search" placeholder="Cari data kendaraan...">
            <input type="submit" value="Search" style="padding: 6px 12px; font-size: 14px; width: auto;">
        </form>

        <div style="overflow: auto;">
            <table class="table">
                <tr>
                    <th>No.</th>
                    <th>Nomor SIM</th>
                    <th>Nama Pelapor</th>
                    <th>Tanggal Lahir</th>
                    <th>Tempat Lahir</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Gender</th>
                    <th>Pekerjaan</th>
                    <th>Kewarganegaraan</th>
                    <th>Opsi</th>        
                </tr>
                <?php 
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $sql = "SELECT * FROM pelapor";
                if (!empty($search)) {
                    $sql .= " WHERE jenis LIKE :search OR merk LIKE :search OR warna LIKE :search OR tahun LIKE :search OR bbm LIKE :search OR nopol LIKE :search OR norangka LIKE :search OR nomesin LIKE :search OR pemilik LIKE :search OR alamat LIKE :search";
                }
                $stmt = $con->prepare($sql);
                if (!empty($search)) {
                    $stmt->bindValue(':search', '%' . $search . '%');
                }
                $stmt->execute();
                
                $nomor = 1;
                while($data = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td align="center"><?php echo $nomor++; ?>.</td>
                        <td><?php echo htmlspecialchars($data['nosim']); ?></td>
                        <td><?php echo htmlspecialchars($data['nape']); ?></td>
                        <td><?php echo htmlspecialchars($data['tala']); ?></td>
                        <td><?php echo htmlspecialchars($data['tela']); ?></td>
                        <td><?php echo htmlspecialchars($data['alamat']); ?></td>
                        <td><?php echo htmlspecialchars($data['notel']); ?></td>
                        <td><?php echo htmlspecialchars($data['gender']); ?></td>
                        <td><?php echo htmlspecialchars($data['pekerjaan']); ?></td>
                        <td><?php echo htmlspecialchars($data['kewar']); ?></td>
                        <td>
                            <a href="form_edit1.php?id=<?php echo $data['id']; ?>"><i class="fas fa-edit"></i></a>
                            <a href="proses_hapus1.php?id=<?php echo $data['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php
                } ?>
            </table>
        </div>
    </div>

    <script>
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                link.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    link.style.transform = 'scale(1)';
                }, 200);
            });
        });
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
