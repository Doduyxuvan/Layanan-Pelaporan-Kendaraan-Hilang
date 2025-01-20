<?php
    session_start();
    if(!isset($_SESSION['iduser'])) {
        echo "<script>window.location='login.php';</script>";
    }

    include "+koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Kendaraan | Web Pendataan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
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
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.judul {
    text-align: center;
    margin-bottom: 20px;
	background-color : #007BFF;
}

.judul h2 {
    font-size: 24px;
    margin-bottom: 5px;
	color : #fff;
}

.judul h3 {
    font-size: 18px;
    color: #fff;
}

.button {
    text-decoration: none;
}

.button button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    font-size: 16px;
}

.button button:hover {
    background-color: #0056b3;
}

form {
    margin-top: 20px;
}

table {
    width: 100%;
}

table td {
    padding: 8px;
}

table input[type="text"],
table input[type="number"],
table textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}

table button {
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    font-size: 16px;
}

table button:hover {
    background-color: #45a049;
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
        <div class="judul">      
            <h2>Website Pendataan Kehilangan  Roda Dua</h2>
            <h3>Polsek Hutaimbaru Kota Padangsidimpuan
</h3>
        </div>

        <br />
        <a href="pelapor.php" class="button">
            <button>< Back to All Data</button>
        </a>
        
        <h3>Edit Kendaraan</h3>
        <form action="proses_edit1.php" method="post">
            <?php
                $id = $_GET['id'];

                $query = $con->prepare("SELECT * FROM pelapor WHERE id = :id");
                $query->bindValue(':id', $id);
                $query->execute();
                $data = $query->fetch();
            ?>      
            <table>
                <tr>
                    <td>Nomor SIM</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                        <input type="text" name="nosim" value="<?php echo $data['nosim'] ?>" required>
                    </td>                   
                </tr>   
                <tr>
                    <td>Nama Pelapor</td>
                    <td><input type="text" name="nape" value="<?php echo $data['nape'] ?>" required></td>                  
                </tr>   
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input type="text" name="tala" value="<?php echo $data['tala'] ?>" required></td>                  
                </tr>   
                <tr>
                    <td>Tempat Lahir</td>
                    <td><input type="text" name="tela" value="<?php echo $data['tela'] ?>" required></td>                  
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" required></td>                  
                </tr>   
                <tr>
                    <td>Nomor Telepon</td>
                    <td><input type="text" name="notel" value="<?php echo $data['notel'] ?>" required></td>                  
                </tr>
                <tr>
                <tr>
    <td>Gender</td>
    <td>
        <select name="gender" required>
            <option value="">Pilih jenis kelamin</option>
            <option value="pria" <?php echo (isset($data['gender']) && $data['gender'] == 'pria') ? 'selected' : ''; ?>>Pria</option>
            <option value="wanita" <?php echo (isset($data['gender']) && $data['gender'] == 'wanita') ? 'selected' : ''; ?>>Wanita</option>
        </select>
    </td>
</tr>
                  
</tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td><input type="text" name="pekerjaan" value="<?php echo $data['pekerjaan'] ?>" required></td>                  
                </tr>
                <tr>
                    <td>Kewarganegaraan</td>
                    <td><input type="text" name="kewar" value="<?php echo $data['kewar'] ?>" required></td>                  
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
