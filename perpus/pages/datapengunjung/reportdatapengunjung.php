<?php

require "../../fpdf/fpdf.php";

$db = new PDO('mysql:host=localhost;dbname=perpus', 'root', '');

class myPDF extends FPDF
{
    private $monthLabels;

    function header(){
        // Only display this text on the first page
        if ($this->PageNo() == 1) {
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(276, 5, 'LAPORAN DATA PENGUNJUNG', 0, 0, 'C');
            $this->Ln();
            $this->SetFont('Times', '', 12);
            $this->Cell(276, 10, 'Perpustakaan JDIH Kantor Wilayah Kementrian Hukum dan HAM Kalimantan Selatan', 0, 0, 'C');
            $this->Ln(20);
        } else {
            $this->Ln(10);
        }
    }
    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function headerTable()
    {
        $today = date("d/m/Y");

    }

    function viewTable($db)
    {
        $this->SetFont('Times', '', 11);

        $this->monthLabels = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
            
        );

        $stmt = $db->query('SELECT *, MONTH(tgl) AS bulan FROM t_datapengunjung ORDER BY tgl ASC');

        $currentMonth = 0;
        $nomor = 1;

        while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {

            $tanggal = date("d/m/Y", strtotime($data->tgl));

            if ($currentMonth != $data->bulan) {
                $currentMonth = $data->bulan;
                $this->SetFont('Arial', 'B', 12);
                $this->Cell(0, 10, 'Data Pengunjung Bulan '  . $this->monthLabels[$currentMonth], 0, 1, 'C');
                $this->SetFont('Times', '', 11);
                $this->Cell(10, 10, '#', 1, 0, 'C');
                $this->Cell(100, 10, 'Nama Pengunjung', 1, 0, 'C');

                $this->Cell(90, 10, 'Alamat', 1, 0, 'C');
                $this->Cell(20, 10, 'Tanggal', 1, 0, 'C');
                $this->Ln();
                $nomor = 1; // Set nomor kembali ke 1 saat memulai tabel baru
            }

            $this->Cell(10, 10, $nomor . '.', 1, 0, 'C');

            $this->Cell(100, 10, $data->nama_pgnjng, 1, 0, 'L');


            $this->Cell(90, 10, $data->kprluan, 1, 0, 'L');

            $this->Cell(20, 10, $tanggal, 1, 0, 'C');

            $this->Ln();

            $nomor++;
        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->Ln();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output('', 'Laporan Data Pengunjung.pdf');
?>
