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

      $this->Cell(276, 5, 'LAPORAN DATA TRANSAKSI', 0, 0, 'C');

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

    function headerTablePeminjaman(){

      $today = date("d/m/Y"); 

      $this->SetFont('Times', 'B', 12);

      $this->Cell(19, 10, '', 0, 0, 'C');

      $this->Cell(10, 10, 'Tabel Peminjaman Per Tanggal '.$today, 0, 0, 'L');

      $this->Ln();

      $this->SetFont('Times', 'B', 11);

      $this->Cell(19, 10, '', 0, 0, 'C');

      $this->Cell(10, 10, '#', 1, 0, 'C');

      $this->Cell(24, 10, 'Tgl', 1, 0, 'C');

      $this->Cell(15, 10, 'ID', 1, 0, 'C');

      $this->Cell(60, 10, 'Nama Peminjam', 1, 0, 'C');

      $this->Cell(130, 10, 'Judul Pustaka', 1, 0, 'C');

      $this->Ln();

    }

    function footerTablePeminjaman(){

      $this->SetFont('Times', 'B', 11);

      $this->Cell(19, 10, '', 0, 0, 'C');

      $this->Cell(10, 10, '#', 1, 0, 'C');

      $this->Cell(24, 10, 'Tgl', 1, 0, 'C');

      $this->Cell(15, 10, 'ID', 1, 0, 'C');

      $this->Cell(60, 10, 'Nama Peminjam', 1, 0, 'C');

      $this->Cell(130, 10, 'Judul Pustaka', 1, 0, 'C');

      $this->Ln();

    }

    function viewTablePeminjaman($db){

      $total = 0;

      $nomor = 1;

      $this->SetFont('Times', '', 11);

      $stmt = $db->query('SELECT t_peminjaman.tgl_pjm, t_peminjaman.nomor_pmnjmn, t_dataanggota.nama_anggota, t_datapustaka.judul_dp

        FROM t_peminjaman

        INNER JOIN t_dataanggota

        ON t_peminjaman.id_anggota=t_dataanggota.id_anggota

        INNER JOIN t_datapustaka

        ON t_peminjaman.id_dp=t_datapustaka.id_dp ORDER BY tgl_pjm DESC');

      while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {

        $tgl_pjm = date("d/m/y", strtotime($data->tgl_pjm));

        $this->Cell(19, 10, '', 0, 0, 'C');

        $this->Cell(10, 10, $nomor.'.', 1, 0, 'C');

        $this->Cell(24, 10, $tgl_pjm, 1, 0, 'C');

        $this->Cell(15, 10, $data->nomor_pmnjmn, 1, 0, 'C');

        $this->Cell(60, 10, $data->nama_anggota, 1, 0, 'L');

        $this->Cell(130, 10, $data->judul_dp, 1, 0, 'L');

        $this->Ln();

        $total++;

        $nomor++;

      }

      $this->footerTablePeminjaman();

      $this->SetFont('Times', 'B', 11);

      $this->Cell(19, 10, '', 0, 0, 'C');

      $this->Cell(109,10,'Total Peminjaman', 1, 0,'C');

      $this->Cell(130,10,$total, 1, 0,'C');

      $this->Ln();

    }

    function headerTablePengembalian(){

      $today = date("d/m/Y");

      $this->SetFont('Times', 'B', 12);

      $this->Cell(10, 10, 'Tabel Pengembalian Per Tanggal '.$today, 0, 0, 'L');

      $this->Ln();

      $this->SetFont('Times', 'B', 11);

      $this->Cell(10, 10, '#', 1, 0, 'C');

      $this->Cell(24, 10, 'Tgl', 1, 0, 'C');

      $this->Cell(15, 10, 'ID', 1, 0, 'C');

      $this->Cell(60, 10, 'Nama Peminjam', 1, 0, 'C');

      $this->Cell(127, 10, 'Judul Pustaka', 1, 0, 'C');

      $this->Cell(40, 10, 'Keterlambatan (hari)', 1, 0, 'C');

      $this->Ln();

    }

    function viewTablePengembalian($db){

      $total = 0;

      $nomor = 1;

      $this->SetFont('Times', '', 11);

      $stmt = $db->query('SELECT t_pengembalian.tgl_kmbl, t_pengembalian.nomor_pgmbln, t_pengembalian.ktrlmbtn, t_dataanggota.nama_anggota, t_datapustaka.judul_dp

        FROM t_pengembalian

        INNER JOIN t_dataanggota

        ON t_pengembalian.id_anggota=t_dataanggota.id_anggota

        INNER JOIN t_datapustaka

        ON t_pengembalian.id_dp=t_datapustaka.id_dp ORDER BY tgl_kmbl DESC');

      while ($data = $stmt->fetch(PDO::FETCH_OBJ)) {

        $tgl_kmbl = date("d/m/y", strtotime($data->tgl_kmbl));

        $this->Cell(10, 10, $nomor.'.', 1, 0, 'C');

        $this->Cell(24, 10, $tgl_kmbl, 1, 0, 'C');

        $this->Cell(15, 10, $data->nomor_pgmbln, 1, 0, 'C');

        $this->Cell(60, 10, $data->nama_anggota, 1, 0, 'L');

        $this->Cell(127, 10, $data->judul_dp, 1, 0, 'L');

        $this->Cell(40, 10, $data->ktrlmbtn, 1, 0, 'R');

        $this->Ln();

        $total++;

        $nomor++;

      }

      $this->footerTablePengembalian();

      $this->SetFont('Times', 'B', 11);

      $this->Cell(236,10,'Total Pengembalian', 1, 0,'C');

      $this->Cell(40,10,$total, 1, 0,'R');

      $this->Ln();

    }

    function footerTablePengembalian(){

      $this->SetFont('Times', 'B', 11);

      $this->Cell(10, 10, '#', 1, 0, 'C');

      $this->Cell(24, 10, 'Tgl', 1, 0, 'C');

      $this->Cell(15, 10, 'ID', 1, 0, 'C');

      $this->Cell(60, 10, 'Nama Peminjam', 1, 0, 'C');

      $this->Cell(127, 10, 'Judul Pustaka', 1, 0, 'C');

      $this->Cell(40, 10, 'Keterlambatan (hari)', 1, 0, 'C');

      $this->Ln();

    }





  }

  $today = date("d/m/y");

  $pdf = new myPDF();

  $pdf->AliasNbPages();

  $pdf->AddPage('L', 'A4', 0);

  $pdf->Ln();

  $pdf->headerTablePeminjaman();

  $pdf->viewTablePeminjaman($db);

  $pdf->AddPage('L', 'A4', 0);

  $pdf->headerTablePengembalian();

  $pdf->viewTablePengembalian($db);

  $pdf->Output('','Laporan Data Transaksi.pdf');

 ?>

