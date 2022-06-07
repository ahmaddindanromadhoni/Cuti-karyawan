<?php
include '../laporan/fpdf.php';
include '../koneksi.php';
include 'sess_check.php';
$nik = $nik;

$pdf = new FPDF();
$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 5, 'DATA CUTI KARYAWAN', '0', '1', 'C', false);
$pdf->Ln(1);
$pdf->Cell(190, 0.6, '', '0', '1', 'C', true);
$pdf->Ln(5);


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(5, 6, 'No', 1, 0, 'C');
$pdf->Cell(27, 6, 'No Cuti', 1, 0, 'C');
$pdf->Cell(27, 6, 'NIK', 1, 0, 'C');
$pdf->Cell(30, 6, 'Nama', 1, 0, 'C');
$pdf->Cell(20, 6, 'Pengajuan', 1, 0, 'C');
$pdf->Cell(20, 6, 'Tgl Awal', 1, 0, 'C');
$pdf->Cell(20, 6, 'Tgl Akhir', 1, 0, 'C');
$pdf->Cell(30, 6, 'Keterangan', 1, 0, 'C');
$pdf->Cell(15, 6, 'Status', 1, 0, 'C');


$no = 0;
$nn = $_POST['no_cuti'];
$cuti = mysqli_query($koneksi, "SELECT cuti.*, employee.* FROM cuti, employee WHERE cuti.nik=employee.nik AND 
cuti.stt_cuti='Approved' ORDER BY cuti.no_cuti DESC");
while($d = mysqli_fetch_array($cuti)){

  $no++;
  $pdf->Ln(6);
  $pdf->SetFont('Arial', '', 6);
  $pdf->Cell(5, 6, $no, 1, 0, 'C');
  $pdf->Cell(27, 6, $d['no_cuti'], 1, 0, 'C');
  $pdf->Cell(27, 6, $d['nik'], 1, 0, 'C');
  $pdf->Cell(30, 6, $d['nama_emp'], 1, 0, 'C');
  $pdf->Cell(20, 6, IndonesiaTgl($d['tgl_pengajuan']) , 1, 0, 'C');
  $pdf->Cell(20, 6, IndonesiaTgl($d['tgl_awal']) , 1, 0, 'C');
  $pdf->Cell(20, 6, IndonesiaTgl($d['tgl_akhir']) , 1, 0, 'C');
  $pdf->Cell(30, 6, $d['keterangan'], 1, 0, 'C');
  $pdf->Cell(15, 6, $d['stt_cuti'], 1, 0, 'C');

}


$pdf->Output();
