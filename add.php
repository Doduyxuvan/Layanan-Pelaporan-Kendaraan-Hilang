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
    include_once("config.php");

    if (isset($_POST['Submit'])) {
        $lapor = mysqli_real_escape_string($mysqli, $_POST['lapor']);
        $tkp = mysqli_real_escape_string($mysqli, $_POST['tkp']);
        $kasus = mysqli_real_escape_string($mysqli, $_POST['kasus']);
        $filename = $_FILES['gambar']['name'];
        $pelapor = mysqli_real_escape_string($mysqli, $_POST['pelapor']);
        $tersangka = mysqli_real_escape_string($mysqli, $_POST['tersangka']);
        $uraian_singkat = mysqli_real_escape_string($mysqli, $_POST['uraian_singkat']);
        $keterangan = mysqli_real_escape_string($mysqli, $_POST['keterangan']);

        // CEK DATA TIDAK BOLEH KOSONG
        if (empty($lapor) || empty($tkp) || empty($kasus) || empty($filename) || empty($pelapor) || empty($tersangka) || empty($uraian_singkat) || empty($keterangan)) {

            if (empty($lapor)) {
                echo "<font color='red'>Kolom lapor tidak boleh kosong.</font><br/>";
            }

            if (empty($tkp)) {
                echo "<font color='red'>Kolom tkp tidak boleh kosong.</font><br/>";
            }

            if (empty($kasus)) {
                echo "<font color='red'>Kolom Kasus tidak boleh kosong.</font><br/>";
            }

            if (empty($filename)) {
                echo "<font color='red'>Kolom Gambar tidak boleh kosong.</font><br/>";
            }

            if (empty($pelapor)) {
                echo "<font color='red'>Kolom Pelapor tidak boleh kosong.</font><br/>";
            }

            if (empty($tersangka)) {
                echo "<font color='red'>Kolom Tersangka tidak boleh kosong.</font><br/>";
            }

            if (empty($uraian_singkat)) {
                echo "<font color='red'>Kolom Uraian Singkat tidak boleh kosong.</font><br/>";
            }

            if (empty($keterangan)) {
                echo "<font color='red'>Kolom Keterangan tidak boleh kosong.</font><br/>";
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
            $result = mysqli_query($mysqli, "INSERT INTO curanmor(lapor,tkp,kasus,gambar,pelapor,tersangka,uraian_singkat,keterangan) VALUES('$lapor', '$tkp', '$kasus', '$filename', '$pelapor', '$tersangka', '$uraian_singkat', '$keterangan')");

            // MENAMPILKAN PESAN BERHASIL
            echo "<font color='green'>Data Berhasil ditambahkan.</font>";
            echo "<br/><a href='curanmor.php'>Lihat Hasilnya</a>";
        }
    }
    ?>
</body>

</html>
