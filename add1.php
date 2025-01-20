<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>
    <?php
    // INCLUDE KONEKSI KE DATABASE
    include_once("config1.php");

    if (isset($_POST['Submit'])) {
        $nip = mysqli_real_escape_string($mysqli, $_POST['nip']);
        $namapetugas = mysqli_real_escape_string($mysqli, $_POST['namapetugas']);
        $gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
        $filename = $_FILES['gambar']['name'];
        $alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);
        $notelp = mysqli_real_escape_string($mysqli, $_POST['notelp']);
        $status = mysqli_real_escape_string($mysqli, $_POST['status']);
        $jabatan = mysqli_real_escape_string($mysqli, $_POST['jabatan']);

        // CEK DATA TIDAK BOLEH KOSONG
        if (empty($nip) || empty($namapetugas) || empty($gender) || empty($alamat) || empty($notelp) || empty($status) || empty($jabatan)) {

            if (empty($nip)) {
                echo "<font color='red'>Kolom nip tidak boleh kosong.</font><br/>";
            }

            if (empty($namapetugas)) {
                echo "<font color='red'>Kolom namapetugas tidak boleh kosong.</font><br/>";
            }

            if (empty($gender)) {
                echo "<font color='red'>Kolom gender tidak boleh kosong.</font><br/>";
            }

            if (empty($alamat)) {
                echo "<font color='red'>Kolom alamat tidak boleh kosong.</font><br/>";
            }

            if (empty($notelp)) {
                echo "<font color='red'>Kolom notelp tidak boleh kosong.</font><br/>";
            }

            if (empty($status)) {
                echo "<font color='red'>Kolom status tidak boleh kosong.</font><br/>";
            }

            if (empty($jabatan)) {
                echo "<font color='red'>Kolom jabatan tidak boleh kosong.</font><br/>";
            }

            // KEMBALI KE HALAMAN SEBELUMNYA
            echo "<br/><a href='javascript:self.history.back();'>Kembali</a>";
        } else {
            // JIKA SEMUANYA TIDAK KOSONG
            $filetmpname = $_FILES['gambar']['tmp_name'];

            // FOLDER DIMANA GAMBAR AKAN DI SIMPAN
            $folder = 'image/';
            
            // Pastikan folder tujuan sudah ada atau buat jika belum ada
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }

            // GAMBAR DI SIMPAN KE DALAM FOLDER
            move_uploaded_file($filetmpname, $folder . $filename);

            // MEMASUKAN DATA DATA + NAMA GAMBAR KE DALAM DATABASE
            $result = mysqli_query($mysqli, "INSERT INTO petugas(nip, namapetugas, gender, alamat, notelp, status, gambar, jabatan)  VALUES('$nip', '$namapetugas', '$gender', '$alamat', '$notelp', '$status', '$filename', '$jabatan')");

            // MENAMPILKAN PESAN BERHASIL
            echo "<font color='green'>Data Berhasil ditambahkan.</font>";
            echo "<br/><a href='petugas.php'>Lihat Hasilnya</a>";
        }
    }
    ?>
</body>

</html>
