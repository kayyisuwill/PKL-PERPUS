<?php

require "../../fpdf/fpdf.php";

$db = new PDO('mysql:host=localhost;dbname=perpus','root','');

class myPDF extends FPDF
{
    function header(){
        // Only display this text on the first page
        if ($this->PageNo() == 1) {
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(276, 5, 'LAPORAN DATA PUSTAKA', 0, 0, 'C');
            $this->Ln();
            $this->SetFont('Times', '', 12);
            $this->Cell(276, 10, 'Perpustakaan JDIH Kantor Wilayah Kementrian Hukum dan HAM Kalimantan Selatan', 0, 0, 'C');
            $this->Ln(20);
        } else {
            $this->Ln(10);
        }
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, 'Halaman '.$this->PageNo().'/{nb}', 0, 0, 'C');
    }

    function headerTable($pengarang){
        $this->SetFont('Times', 'B', 12);
        $this->Cell(276, 10, 'Pengarang: '.$pengarang, 0, 0, 'L');
        $this->Ln();
        $this->SetFont('Times', 'B', 11);
        $this->Cell(10, 10, '#', 1, 0, 'C');
        $this->Cell(200, 10, 'Judul Pustaka', 1, 0, 'C');
        $this->Cell(12, 10, 'Tahun', 1, 0, 'C');
        $this->Cell(35, 10, 'Klasifikasi', 1, 0, 'C');
        $this->Cell(12, 10, 'Jumlah', 1, 0, 'C');
        $this->Ln();
    }

    function viewTable($db, $pengarang){
        $totalpustaka = 0;
        $nomor = 1;
        $this->SetFont('Times', '', 11);

        $stmt = $db->query("SELECT * FROM t_datapustaka WHERE pengarang = '$pengarang' ORDER BY judul_dp");
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
            $this->Cell(10, 10, $nomor.'.', 1, 0, 'C');
            $this->Cell(200, 10, $data->judul_dp, 1, 0, 'L');
            $this->Cell(12, 10, $data->tahun, 1, 0, 'L');
            $this->Cell(35, 10, $data->klasifikasi, 1, 0, 'L');
            $this->Cell(12, 10, $data->jumlah, 1, 0, 'C');
            $this->Ln();
            $totalpustaka++;
            $nomor++;
        }

        $this->SetFont('Times', 'B', 11);
        $this->Cell(220, 10, 'Total Koleksi Pustaka Pengarang '.$pengarang, 1, 0, 'C');
        $this->Cell(47, 10, $totalpustaka, 1, 0, 'C');
        $this->Ln();
    }

    function viewSummary($db){
        $this->SetFont('Times', 'B', 11);
        
        $tkk = $db->query('SELECT COUNT(*) AS totalkoleksi FROM t_datapustaka WHERE jumlah = 0');
        $datatkk = $tkk->fetch(PDO::FETCH_OBJ);
        $this->Cell(220,10,'Total Pustaka Kosong', 1, 0,'C');
        $this->Cell(47,10,$datatkk->totalkoleksi, 1, 0,'C');
        $this->Ln();

        $tkt = $db->query('SELECT COUNT(*) AS totalkoleksi FROM t_datapustaka WHERE jumlah != 0');
        $datatkt = $tkt->fetch(PDO::FETCH_OBJ);
        $this->Cell(230,10,'Total Pustaka Tersedia', 1, 0,'C');
        $this->Cell(47,10,$datatkt->totalkoleksi, 1, 0,'C');
        $this->Ln();

        $jp = $db->query('SELECT SUM(jumlah) AS jumlahpustaka FROM t_datapustaka');
        $datajp = $jp->fetch(PDO::FETCH_OBJ);
        $this->Cell(230,10,'Total Jumlah Pustaka', 1, 0,'C');
        $this->Cell(47,10,$datajp->jumlahpustaka, 1, 0,'C');
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);

$pengarangs = $db->query('SELECT DISTINCT pengarang FROM t_datapustaka ORDER BY pengarang');
while ($pengarang = $pengarangs->fetch(PDO::FETCH_OBJ)) {
    $pdf->Ln();
    $pdf->headerTable($pengarang->pengarang);
    $pdf->viewTable($db, $pengarang->pengarang);
}

$pdf->AddPage('L', 'A4', 0);
$pdf->viewSummary($db);

$pdf->Output('', 'Laporan Data Pustaka.pdf');
?>
