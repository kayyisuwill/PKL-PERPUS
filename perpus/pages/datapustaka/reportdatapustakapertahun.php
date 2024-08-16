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

    function headerTable($year){
        $this->SetFont('Times', 'B', 12);
        $this->Cell(276, 10, ' '.$year, 0, 0, 'L');
        $this->Ln();
        $this->SetFont('Times', 'B', 11);
        $this->Cell(10, 10, '#', 1, 0, 'C');
        $this->Cell(120, 10, 'Judul Pustaka', 1, 0, 'C');
        $this->Cell(90, 10, 'Pengarang', 1, 0, 'C');
        $this->Cell(12, 10, 'Tahun', 1, 0, 'C');
        $this->Cell(35, 10, 'Klasifikasi', 1, 0, 'C');
        $this->Cell(12, 10, 'Jumlah', 1, 0, 'C');
        $this->Ln();
    }

    function viewTable($db, $year){
        $totalpustaka = 0;
        $nomor = 1;
        $this->SetFont('Times', '', 11);

        $stmt = $db->query("SELECT * FROM t_datapustaka WHERE tahun = '$year' ORDER BY pengarang");
        while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {
            $this->Cell(10, 10, $nomor.'.', 1, 0, 'C');

            // Adjust height based on title length
            $cellWidth = 120; // fixed cell width
            $cellHeight = 10; // normal one-line height

            // check whether the title length is longer than the cell width
            if($this->GetStringWidth($data->judul_dp) < $cellWidth){
                // if not, then do not change the height of the cell
                $line = 1;
            }else{
                // if it is, then calculate the height of the cell
                $textLength = strlen($data->judul_dp); // total text length
                $errMargin = 10; // cell width error margin
                $startChar = 0; // character start position for each line
                $maxChar = 0; // maximum character in a line, to be incremented later
                $textArray = array(); // to hold the strings for each line
                $tmpString = ""; // to hold the string for a line (temporary)
                
                while($startChar < $textLength){ // loop until end of text
                    // check whether the character is within the error margin or not
                    while($this->GetStringWidth($tmpString) < ($cellWidth - $errMargin) &&
                        ($startChar + $maxChar) < $textLength){
                        $maxChar++;
                        $tmpString = substr($data->judul_dp, $startChar, $maxChar);
                    }
                    // move startChar to the next line start
                    $startChar = $startChar + $maxChar;
                    // then add it into the array so we know how many lines are needed
                    array_push($textArray, $tmpString);
                    // reset maxChar and tmpString
                    $maxChar = 0;
                    $tmpString = '';
                }
                // get maximum line number
                $line = count($textArray);
            }

            // Multicell for flexible column height
            $xPos = $this->GetX();
            $yPos = $this->GetY();
            $this->MultiCell($cellWidth, $cellHeight, $data->judul_dp, 1);
            $this->SetXY($xPos + $cellWidth, $yPos);

            // Fill other columns
            $this->Cell(90, ($line * $cellHeight), $data->pengarang, 1, 0, 'L');
            $this->Cell(12, ($line * $cellHeight), $data->tahun, 1, 0, 'L');
            $this->Cell(35, ($line * $cellHeight), $data->klasifikasi, 1, 0, 'L');
            $this->Cell(12, ($line * $cellHeight), $data->jumlah, 1, 0, 'C');
            $this->Ln();
            $totalpustaka++;
            $nomor++;
        }

        $this->SetFont('Times', 'B', 11);
        $this->Cell(230, 10, 'Total Koleksi Pustaka Tahun '.$year, 1, 0, 'C');
        $this->Cell(47, 10, $totalpustaka, 1, 0, 'C');
        $this->Ln();
    }

    function viewSummary($db){
        $this->SetFont('Times', 'B', 11);
        
        $tkk = $db->query('SELECT COUNT(*) AS totalkoleksi FROM t_datapustaka WHERE jumlah = 0');
        $datatkk = $tkk->fetch(PDO::FETCH_OBJ);
        $this->Cell(230,10,'Total Pustaka Kosong', 1, 0,'C');
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

$years = $db->query('SELECT DISTINCT tahun FROM t_datapustaka ORDER BY tahun');
while ($year = $years->fetch(PDO::FETCH_OBJ)) {
    $pdf->Ln();
    $pdf->headerTable($year->tahun);
    $pdf->viewTable($db, $year->tahun);
}

$pdf->AddPage('L', 'A4', 0);
$pdf->viewSummary($db);

$pdf->Output('', 'Laporan Data Pustaka.pdf');
?>
