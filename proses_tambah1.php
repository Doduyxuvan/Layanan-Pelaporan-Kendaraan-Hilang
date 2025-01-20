<?php
// Pastikan jalur ke file fpdf.php benar
require('fpdf/fpdf.php');

// Ambil data dari formulir
$vehicleType = $_POST['vehicle-type'];
$merk = $_POST['merk'];
$warna = $_POST['warna'];
$tahun = $_POST['tahun'];
$bbm = $_POST['bbm'];
$nopol = $_POST['nopol'];
$norangka = $_POST['norangka'];
$nomesin = $_POST['nomesin'];
$pemilik = $_POST['pemilik'];
$alamat = $_POST['alamat'];

// Buat instance FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial','B',16);

// Judul
$pdf->Cell(0,10,'Data Kendaraan',0,1,'C');
$pdf->Ln(10);

// Data Kendaraan
$pdf->SetFont('Arial','',12);
$pdf->Cell(50,10,'Jenis Kendaraan:',0,0);
$pdf->Cell(0,10,$vehicleType,0,1);
$pdf->Cell(50,10,'Merk / Type:',0,0);
$pdf->Cell(0,10,$merk,0,1);
$pdf->Cell(50,10,'Warna Kendaraan:',0,0);
$pdf->Cell(0,10,$warna,0,1);
$pdf->Cell(50,10,'Tahun Pembuatan:',0,0);
$pdf->Cell(0,10,$tahun,0,1);
$pdf->Cell(50,10,'Bahan Bakar:',0,0);
$pdf->Cell(0,10,$bbm,0,1);
$pdf->Cell(50,10,'Nomor Polisi:',0,0);
$pdf->Cell(0,10,$nopol,0,1);
$pdf->Cell(50,10,'Nomor Rangka:',0,0);
$pdf->Cell(0,10,$norangka,0,1);
$pdf->Cell(50,10,'Nomor Mesin:',0,0);
$pdf->Cell(0,10,$nomesin,0,1);
$pdf->Cell(50,10,'Pemilik:',0,0);
$pdf->Cell(0,10,$pemilik,0,1);
$pdf->Cell(50,10,'Alamat Pemilik:',0,0);
$pdf->MultiCell(0,10,$alamat,0,1);

// Output PDF
$pdf->Output('D', 'data_kendaraan.pdf');
?>
