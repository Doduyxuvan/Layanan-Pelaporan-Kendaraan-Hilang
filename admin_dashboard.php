<?php 
session_start();
if($_SESSION['role'] != 'admin') {
    header('Location: user_dashboard.php');
}
?>
<h1>Selamat datang di dashboard admin!</h1>
