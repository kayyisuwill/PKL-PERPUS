<?php

  require "../../fpdf/fpdf.php";

  $db = new PDO('mysql:host=localhost;dbname=perpus','root','');



  /**

   *

   */

  class myPDF extends FPDF

  {

    function header(){

      // $this->Image('logo.png', 10, 6,-200);

      $this->SetFont('Arial', 'B', 14);

      $this->Cell(276, 5, 'LAPORAN DATA ANGGOTA', 0, 0, 'C');

      $this->Ln();

      $this->SetFont('Times', '', 12);

      $this->Cell(276, 10, 'Perpustakaan JDIH Kantor Wilayah Kementrian Hukum dan HAM Kalimantan Selatan', 0, 0, 'C');

      $this->Ln();

    }

    function footer(){

      $this->SetY(-15);

      $this->SetFont('Arial', '', 8);

      $this->Cell(0, 10, 'Halaman '.$this->PageNo().'/{nb}', 0, 0, 'C');

    }

    function headerTable(){

      $today = date("d/m/Y");

      $this->SetFont('Times', 'B', 12);

      $this->Cell(10, 10, 'Tabel Anggota Per Tanggal '.$today, 0, 0, 'L');

      $this->Ln();

      $this->SetFont('Times', 'B', 11);

      $this->Cell(10, 10, '#', 1, 0, 'C');

      $this->Cell(20, 10, 'ID', 1, 0, 'C');

      $this->Cell(150, 10, 'Nama Anggota', 1, 0, 'C');

      $this->Cell(70, 10, 'Telepon', 1, 0, 'C');

      $this->Cell(27, 10, 'Denda', 1, 0, 'C');

      $this->Ln();

    }

    function viewTable($db){

      $totalpustaka = 0;

      $nomor = 1;

      $this->SetFont('Times', '', 11);

      $stmt = $db->query('SELECT * FROM t_dataanggota');

      while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {

        $denda = "";

        if ($data->denda == '0000-00-00') {

          $denda = "Tidak";

        } else {

          $tanggal = date("d/m/Y", strtotime($data->denda));

          $denda = $tanggal;

        }

        $this->Cell(10, 10, $nomor.'.', 1, 0, 'C');

        $this->Cell(20, 10, $data->no_anggota, 1, 0, 'C');

        $this->Cell(150, 10, $data->nama_anggota, 1, 0, 'L');

        $this->Cell(70, 10, $data->telp, 1, 0, 'L');

        $this->Cell(27, 10, $denda, 1, 0, 'L');

        $this->Ln();

        $totalpustaka++;

        $nomor++;

      }

      $this->SetFont('Times', 'B', 11);

      $this->Cell(250,10,'Total Anggota', 1, 0,'C');

      $this->Cell(27,10,$totalpustaka, 1, 0,'C');

      $this->Ln();

      $tad = $db->query('SELECT COUNT(*) AS totalanggotadenda FROM t_dataanggota WHERE denda != 0000-00-00');

      $datatad = $tad->fetch(PDO::FETCH_OBJ);

      $this->Cell(250,10,'Total Anggota dengan Denda', 1, 0,'C');

      $this->Cell(27,10,$datatad->totalanggotadenda, 1, 0,'C');

      $this->Ln();

    }





  }



  $pdf = new myPDF();

  $pdf->AliasNbPages();

  $pdf->AddPage('L', 'A4', 0);

  $pdf->Ln();

  $pdf->headerTable();

  $pdf->viewTable($db);

  $pdf->Output('','Laporan Data Anggota.pdf');

 ?>

