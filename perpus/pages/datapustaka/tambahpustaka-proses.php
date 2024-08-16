<?php

  session_start();

  if($_SESSION['status']!="login"){

  header("location:../login/login.php");

  }

  include '../../koneksi.php';



  $juduldp = $_POST['juduldp'];

  $kategori = $_POST['kategori'];

  $pengarang = $_POST['pengarang'];

  $penerbit = $_POST['penerbit'];

  $tahun = $_POST['tahun'];

  $isbn = $_POST['isbn'];

  $klasifikasi = $_POST['klasifikasi'];

  $jumlah = $_POST['jumlah'];



  mysqli_query($koneksi,"INSERT INTO t_datapustaka (judul_dp, kategori, pengarang, penerbit, tahun, isbn, klasifikasi, jumlah) VALUES ('$juduldp', '$kategori','$pengarang','$penerbit','$tahun','$isbn','$klasifikasi','$jumlah')");



  header("location:datapustaka.php");

 ?>

