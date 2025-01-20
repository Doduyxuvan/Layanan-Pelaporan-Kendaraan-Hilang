<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

// Pastikan variabel dari formulir tersedia
$jenis = isset($_POST["jenis"]) ? $_POST["jenis"] : "";
$sop = isset($_POST["sop"]) ? $_POST["sop"] : "";
$nop = isset($_POST["nop"]) ? $_POST["nop"] : "";
$status = isset($_POST["status"]) ? $_POST["status"] : "";
$pekerjaan = isset($_POST["pekerjaan"]) ? $_POST["pekerjaan"] : "";
$namas = isset($_POST["namas"]) ? $_POST["namas"] : "";
$npwp = isset($_POST["npwp"]) ? $_POST["npwp"] : "";
$namaj = isset($_POST["namaj"]) ? $_POST["namaj"] : "";
$blok = isset($_POST["blok"]) ? $_POST["blok"] : "";
$kelurahan = isset($_POST["kelurahan"]) ? $_POST["kelurahan"] : "";
$nomor = isset($_POST["nomor"]) ? $_POST["nomor"] : "";
$luas = isset($_POST["luas"]) ? $_POST["luas"] : "";
$jenist = isset($_POST["jenist"]) ? $_POST["jenist"] : "";
$jumlah = isset($_POST["jumlah"]) ? $_POST["jumlah"] : "";
$jamke = isset($_POST["jamke"]) ? $_POST["jamke"] : "";
$loke = isset($_POST["loke"]) ? $_POST["loke"] : "";
$wakje = isset($_POST["wakje"]) ? $_POST["wakje"] : "";
$pelapor = isset($_POST["pelapor"]) ? $_POST["pelapor"] : "";




$options = new Options;
$options->setChroot(__DIR__);
$options->setIsHtml5ParserEnabled(true); // gunakan parser HTML5
$options->setIsPhpEnabled(true); // aktifkan evaluasi PHP

$dompdf = new Dompdf($options);
$dompdf->setPaper("A4", "portrait");

try {
    $html = file_get_contents(__DIR__ . "/template.html");

    if ($html === false) {
        throw new Exception("File template tidak ditemukan.");
    }

    $html = str_replace(
        ["{{ jenis }}", "{{ sop }}", "{{ nop }}", "{{ status }}", "{{ pekerjaan }}", "{{ namas }}", "{{ npwp }}", "{{ namaj }}", "{{ blok }}", "{{ kelurahan }}", "{{ nomor }}", "{{ luas }}", "{{ jenist }}", "{{ jumlah }}", "{{ jamke }}","{{ loke }}","{{ wakje }}","{{ pelapor }}"],
        [$jenis, $sop, $nop, $status, $pekerjaan, $namas, $npwp, $namaj, $blok, $kelurahan, $nomor, $luas, $jenist, $jumlah, $jamke, $loke, $wakje, $pelapor],
        $html
    );

    $dompdf->loadHtml($html);
    $dompdf->render();

    // Tampilkan PDF ke browser
    $dompdf->stream("invoice.pdf", ["Attachment" => 0]);

    // Simpan file PDF secara lokal
    $output = $dompdf->output();
    file_put_contents(__DIR__ . "/file.pdf", $output);
} catch (Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
}
?>
