<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

// Pastikan variabel dari formulir tersedia
$peke = isset($_POST["peke"]) ? $_POST["peke"] : "";
$tala = isset($_POST["tala"]) ? $_POST["tala"] : "";
$jala = isset($_POST["jala"]) ? $_POST["jala"] : "";
$hala = isset($_POST["hala"]) ? $_POST["hala"] : "";
$jeka = isset($_POST["jeka"]) ? $_POST["jeka"] : "";
$nopo = isset($_POST["nopo"]) ? $_POST["nopo"] : "";
$take = isset($_POST["take"]) ? $_POST["take"] : "";
$nora = isset($_POST["nora"]) ? $_POST["nora"] : "";
$wake = isset($_POST["wake"]) ? $_POST["wake"] : "";
$meke = isset($_POST["meke"]) ? $_POST["meke"] : "";
$jeke = isset($_POST["jeke"]) ? $_POST["jeke"] : "";
$take = isset($_POST["take"]) ? $_POST["take"] : "";
$jake = isset($_POST["jake"]) ? $_POST["jake"] : "";
$hake = isset($_POST["hake"]) ? $_POST["hake"] : "";
$teke = isset($_POST["teke"]) ? $_POST["teke"] : "";
$loke = isset($_POST["loke"]) ? $_POST["loke"] : "";
$dugaan = isset($_POST["dugaan"]) ? $_POST["dugaan"] : "";
$krono = isset($_POST["krono"]) ? $_POST["krono"] : "";




$options = new Options;
$options->setChroot(__DIR__);
$options->setIsHtml5ParserEnabled(true); // gunakan parser HTML5
$options->setIsPhpEnabled(true); // aktifkan evaluasi PHP

$dompdf = new Dompdf($options);
$dompdf->setPaper("A4", "portrait");

try {
    $html = file_get_contents(__DIR__ . "/template1.html");

    if ($html === false) {
        throw new Exception("File template tidak ditemukan.");
    }

    $html = str_replace(
        ["{{ peke }}", "{{ tala }}", "{{ jala }}", "{{ hala }}", "{{ jeka }}", "{{ nopo }}", "{{ take }}", "{{ nora }}", "{{ wake }}", "{{ meke }}", "{{ jeke }}", "{{ take }}", "{{ jake }}", "{{ hake }}", "{{ dugaan }}","{{ loke }}","{{ teke }}","{{ krono }}"],
        [$peke, $tala, $jala, $hala, $jeka, $nopo, $take, $nora, $wake, $meke, $jeke, $take, $jake, $hake, $teke, $loke, $dugaan, $krono],
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
