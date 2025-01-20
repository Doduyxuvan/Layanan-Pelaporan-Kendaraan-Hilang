<?php
// Pastikan session_start() hanya dipanggil sekali di aplikasi Anda
session_start();

// Include connection and config
include("connection.php");
include_once("config1.php");
include "check_access.php"; // Pastikan ini hanya di-include sekali di seluruh aplikasi Anda
checkAccess('admin'); // Pastikan hanya admin yang bisa mengakses halaman ini

// Initialize search variable
$search = isset($_GET['search']) ? mysqli_real_escape_string($mysqli, $_GET['search']) : '';

// Modify query based on search input
$query = "SELECT * FROM petugas";
if (!empty($search)) {
    $query .= " WHERE 
        nip LIKE '%$search%' OR 
        namapetugas LIKE '%$search%' OR 
        gender LIKE '%$search%' OR 
        alamat LIKE '%$search%' OR 
        notelp LIKE '%$search%' OR 
        status LIKE '%$search%' OR 
        jabatan LIKE '%$search%'";
}
$query .= " ORDER BY id DESC";

$result = mysqli_query($mysqli, $query);

// Debugging: Cek hasil query
if (!$result) {
    echo "<p>Query Error: " . mysqli_error($mysqli) . "</p>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            display: flex;
            align-items: center;
        gap: 10px; /* Jarak antara input text dan tombol submit */
        margin: 20px 0; /* Jarak di atas dan bawah form */
        
    
input[type="text"] {
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 300px; /* Atur lebar sesuai kebutuhan */
    box-sizing: border-box; /* Agar padding termasuk dalam lebar total */
}

input[type="submit"] {
    padding: 8px 16px;
    font-size: 14px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}}
            

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

        .table-responsive {
            margin-top: 20px;
        }

        .table thead {
            background-color: #007BFF;
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table td img {
            border-radius: 8px;
            max-width: 100px;
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
    <a href="add1.html" class="btn btn-primary mb-3">Tambah Data Baru</a>
    <h3>Data Petugas</h3>
    <!-- Form Pencarian -->
    <div class="search-container">
        <form action="" method="get">
            <input type="text" name="search" placeholder="Cari data petugas..." value="<?php echo htmlspecialchars($search); ?>">
            <input type="submit" value="Search">
        </form>
    </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
    <tr>
        <th>No</th> <!-- Tambahkan header kolom urutan -->
        <th>NIP</th>
        <th>Nama Petugas</th>
        <th>Gender</th>
        <th>Alamat</th>
        <th>No.Telepon</th>
        <th>Status</th>
        <th>Foto Profil</th>
        <th>Jabatan</th>
        <th>Action</th>
    </tr>
</thead>

                <tbody>
    <?php 
    $no = 1; // Inisialisasi nomor urut
    while ($res = mysqli_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $no++; ?></td> <!-- Kolom untuk nomor urut -->
            <td><?php echo $res['nip']; ?></td>
            <td><?php echo $res['namapetugas']; ?></td>
            <td><?php echo $res['gender']; ?></td>
            <td><?php echo $res['alamat']; ?></td>
            <td><?php echo $res['notelp']; ?></td>
            <td><?php echo $res['status']; ?></td>
            <td><img src='image/<?php echo $res['gambar']; ?>' /></td>
            <td><?php echo $res['jabatan']; ?></td>
            <td>
                <a href="edit1.php?id=<?php echo $res['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete1.php?id=<?php echo $res['id']; ?>" class="btn btn-danger btn-sm" onClick="return confirm('Kamu yakin untuk delete ini?')">Delete</a>
            </td>
        </tr>
    <?php } ?>
</tbody>

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12e61p6R6U5bt6FVg8GJABVZx9oCZGoL/5z0EODwxM4f9OF1" crossorigin="anonymous"></script>
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
