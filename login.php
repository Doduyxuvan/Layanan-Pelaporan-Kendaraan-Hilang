<?php
session_start(); // memulai session
if(isset($_SESSION['iduser'])) {
	echo "<script>window.location='home.php';</script>";
}

require "+koneksi.php"; // memanggil file koneksi
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700');

        body {
            background: linear-gradient(to left, #007BFF, #007BFF);
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-page {
            width: 360px;
            padding: 10% 0 0;
        }

        .form {
            background: #FFFFFF;
            max-width: 360px;
            margin: auto;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
            border-radius: 10px;
        }

        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: calc(100% - 30px);
            border: 0;
            margin: 0 0 20px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .form input:focus {
            background-color: #e6e6e6;
        }

        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #007BFF;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 5px;
        }

        .form button:hover {
            background: #0056b3;
        }

        .form .message {
            margin-top: 20px;
            color: #b3b3b3;
            font-size: 12px;
        }

        .form .message a {
            color: #007BFF;
            text-decoration: none;
        }

        .form .message a:hover {
            color: #0056b3;
        }

        .form .input-container {
            position: relative;
        }

        .form .input-container i {
            position: absolute;
            top: 15px;
            left: 10px;
            color: #b3b3b3;
        }

        .form .input-container input {
            padding-left: 40px;
        }

        .input-container img {
            position: absolute;
            top: -190px;
            left: calc(50% - 50px);
            width: 100px;
            height: auto;
        }

        .input-container p {
            color: #007BFF;
            font-size: 18px;
            text-align: center;
            margin-top: 10px;
        }
        .form .login-options {
    display: flex;
    justify-content: center; /* Pusatkan konten secara horizontal */
    gap: 20px; /* Jarak antara dua tombol login */
    margin-top: 20px;
    font-size: 16px;
}

.form .login-options a {
    color: #007BFF;
    text-decoration: none;
    font-weight: 500;
    padding: 10px 20px;
    background-color: #f2f2f2;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.form .login-options a:hover {
    background-color: #007BFF;
    color: #FFFFFF;
}

    </style>
</head>
<body>
<div class="login-page">
    <div class="form">
    <div class="input-container">
    <img src="img/your-logo1.png" alt="Logo">
    <p>LOGIN POLSEK HUTAIMBARU</p>
    <p class="login-options">
    <a href="login1.php">Login Polisi</a> | <a href="login3.php">Login Admin</a>
</p>
 <!-- Tautan login -->
</div>


    </div>
</div>

<?php
if(isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $query = $con->prepare("SELECT * FROM user WHERE username = :user AND password = :pass");
    $query->bindValue(':user', $user);
    $query->bindValue(':pass', $pass);
    $query->execute();
    $cek = $query->rowCount();
    if($cek > 0) {
        $data = $query->fetch();
        $_SESSION['iduser'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        echo "<script>alert('Selamat. Login berhasil :)'); window.location='home.php';</script>";
    } else {
        echo "<script>alert('Login gagal. Ulangi lagi!');</script>";
    }
}
?>

</body>
</html>