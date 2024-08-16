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

      $this->Cell(276, 5, 'LAPORAN DATA ADMIN PERPUSTAKAAN', 0, 0, 'C');

      $this->Ln();

      $this->SetFont('Times', '', 12);

      $this->Cell(276, 10, '', 0, 0, 'C');

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

      $this->Cell(55, 10, '', 0, 0, 'C');

      $this->Cell(10, 10, 'Tabel Admin Per Tanggal '.$today, 0, 0, 'L');

      $this->Ln();

      $this->SetFont('Times', 'B', 11);

      $this->Cell(55, 10, '', 0, 0, 'C');

      $this->Cell(10, 10, '#', 1, 0, 'C');

      $this->Cell(100, 10, 'Nama Admin', 1, 0, 'C');

      $this->Cell(57, 10, 'NIP', 1, 0, 'C');

      $this->Ln();

    }

    function viewTable($db){

      $totalpustaka = 0;

      $nomor = 1;

      $this->SetFont('Times', '', 11);

      $stmt = $db->query('SELECT * FROM t_datapengguna WHERE level = 2');

      while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {

        $this->Cell(55, 10, '', 0, 0, 'C');

        $this->Cell(10, 10, $nomor.'.', 1, 0, 'C');

        $this->Cell(100, 10, $data->nama_pengguna, 1, 0, 'L');

        $this->Cell(57, 10, $data->nip, 1, 0, 'L');

        $this->Ln();

        $totalpustaka++;

        $nomor++;

      }

      $this->SetFont('Times', 'B', 11);

      $this->Cell(55, 10, '', 0, 0, 'C');

      $this->Cell(110,10,'Total Admin', 1, 0,'C');

      $this->Cell(57,10,$totalpustaka, 1, 0,'C');

      $this->Ln();

    }





  }



  $pdf = new myPDF();

  $pdf->AliasNbPages();

  $pdf->AddPage('L', 'A4', 0);

  $pdf->Ln();

  $pdf->headerTable();

  $pdf->viewTable($db);

  $pdf->Output('','Laporan Data Admin.pdf');

 ?>

