<?php
// INCLUDE KONEKSI KE DATABASE
include_once("config.php");

if (isset($_POST['update'])) {

    // AMBIL ID DATA
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);

    // AMBIL NAMA FILE FOTO SEBELUMNYA
    $data = mysqli_query($mysqli, "SELECT gambar FROM curanmor WHERE id='$id'");
    $dataImage = mysqli_fetch_assoc($data);
    $oldImage = $dataImage['gambar'];

    // AMBIL DATA DATA DIDALAM INPUT
    $lapor = mysqli_real_escape_string($mysqli, $_POST['lapor']);
    $tkp = mysqli_real_escape_string($mysqli, $_POST['tkp']);
    $kasus = mysqli_real_escape_string($mysqli, $_POST['kasus']);
    $filename = $_FILES['newImage']['name'];
    $pelapor = mysqli_real_escape_string($mysqli, $_POST['pelapor']);
    $tersangka = mysqli_real_escape_string($mysqli, $_POST['tersangka']);
    $keterangan = mysqli_real_escape_string($mysqli, $_POST['keterangan']);
    $uraian_singkat = mysqli_real_escape_string($mysqli, $_POST['uraian_singkat']);
  

    // CEK DATA TIDAK BOLEH KOSONG
    $errors = [];
    if (empty($lapor)) {
        $errors[] = "Kolom pelapor tidak boleh kosong.";
    }

    if (empty($tkp)) {
        $errors[] = "Kolom tkps tidak boleh kosong.";
    }

    if (empty($kasus)) {
        $errors[] = "Kolom kasus tidak boleh kosong.";
    }

    if (empty($pelapor)) {
        $errors[] = "Kolom Pelapor tidak boleh kosong.";
    }
    if (empty($tersangka)) {
        $errors[] = "Kolom Tersangka tidak boleh kosong.";
    }
    if (empty($uraian_singkat)) {
        $errors[] = "Kolom uraian singkat tidak boleh kosong.";
    }
    if (empty($keterangan)) {
        $errors[] = "Kolom keterangan tidak boleh kosong.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<font color='red'>$error</font><br/>";
        }
    } else {

        if (!empty($filename)) {
            $filetmpname = $_FILES['newImage']['tmp_name'];
            $folder = "image/";
            $oldImagePath = $folder . $oldImage;
        
            // GAMBAR LAMA DI DELETE
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath) or die("GAGAL: " . $oldImagePath . " tidak ditemukan.");
            } else {
                echo "File lama tidak ditemukan.";
            }
        
            // GAMBAR BARU DI MASUKAN KE FOLDER
            move_uploaded_file($filetmpname, $folder . $filename);
        }

        // UPDATE DATA KE DATABASE
        $updateQuery = "UPDATE curanmor SET lapor='$lapor', tkp='$tkp', kasus='$kasus', tersangka='$tersangka', keterangan='$keterangan', uraian_singkat='$uraian_singkat', pelapor='$pelapor'";
        if (!empty($filename)) {
            $updateQuery .= ", gambar='$filename'";
        }
        $updateQuery .= " WHERE id=$id";

        $result = mysqli_query($mysqli, $updateQuery);

        // REDIRECT KE HALAMAN INDEX.PHP JIKA BERHASIL
        if ($result) {
            header("Location: curanmor.php");
            exit();
        } else {
            echo "<font color='red'>Gagal mengupdate data.</font>";
        }
    }
}

// AMBIL ID DARI URL
$id = $_GET['id'];

// AMBIL DATA BERDASARKAN ID
$result = mysqli_query($mysqli, "SELECT * FROM curanmor WHERE id=$id");

// AMBIL DATA YANG AKAN DIEDIT
while ($res = mysqli_fetch_array($result)) {
    $lapor = $res['lapor'];
    $tkp = $res['tkp'];
    $kasus = $res['kasus'];
    $image = $res['gambar'];
    $pelapor = $res['pelapor'];
    $tersangka = $res['tersangka'];
    $uraian_singkat = $res['uraian_singkat'];
    $keterangan = $res['keterangan'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <!-- Tambahkan link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Tambahkan link ke Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-control-file {
            margin-top: 5px;
        }

        .form-btn {
            text-align: center;
        }

        .form-btn button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .form-btn button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
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
            max-width: 600px; /* Adjust the maximum width as needed */
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
        <h2 class="text-center mb-4">Edit Data</h2>
        <form name="form1" method="post" action="edit.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="lapor">Laporan Polisi</label>
                <input type="text" class="form-control" name="lapor" value="<?php echo $lapor; ?>">
            </div>
            <div class="form-group">
                <label for="tkp">TKP</label>
                <input type="text" class="form-control" name="tkp" value="<?php echo $tkp; ?>">
            </div>
            <div class="form-group">
                <label for="nama">Kasus</label>
                <input type="text" class="form-control" name="kasus" value="<?php echo $kasus; ?>">
            </div>
            <div class="form-group">
                <label for="pelapor">Pelapor</label>
                <input type="text" class="form-control" name="pelapor" value="<?php echo $pelapor; ?>">
            </div>            
            <div class="form-group">
                <label for="tersangka">Tersangka</label>
                <input type="text" class="form-control" name="tersangka" value="<?php echo $tersangka; ?>">
            </div>
            <div class="form-group">
                <label for="tersangka">Uraian Singkat</label>
                <input type="text" class="form-control" name="uraian_singkat" value="<?php echo $uraian_singkat; ?>">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="<?php echo $keterangan; ?>">
            </div>
            <div class="form-group">
                <label for="gambar">Gambar</label><br>
                <img width="80" src="image/<?php echo $image; ?>" alt="Gambar saat ini"><br>
                <input type="file" class="form-control-file" name="newImage">
            </div>

            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <div class="form-btn">
                    <button type="submit" name="update">Update</button>
                </div>
            </div>
        </form>
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
