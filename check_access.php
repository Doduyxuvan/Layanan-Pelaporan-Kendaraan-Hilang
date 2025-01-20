<?php
function checkAccess($requiredRole) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== $requiredRole) {
        header('Location: no_access.php'); // Halaman jika akses ditolak
        exit();
    }
}
?>
