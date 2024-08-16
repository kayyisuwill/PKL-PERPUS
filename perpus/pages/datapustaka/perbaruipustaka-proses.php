<?php
  session_start();
  if($_SESSION['status']!="login"){
  header("location:../login/login.php");
  }
  include '../../koneksi.php';

  $id = $_POST['id'];
  $juduldp = $_POST['juduldp'];
  $kategori = $_POST['kategori'];
  $pengarang = $_POST['pengarang'];
  $penerbit = $_POST['penerbit'];
  $tahun = $_POST['tahun'];
  $isbn = $_POST['isbn'];
  $klasifikasi = $_POST['klasifikasi'];
  $jumlah = $_POST['jumlah'];

  echo $id;

  mysqli_query($koneksi,"UPDATE t_datapustaka SET judul_dp = '$juduldp', kategori = '$kategori', pengarang = '$pengarang', penerbit = '$penerbit', tahun = $tahun, klasifikasi = '$klasifikasi', jumlah = $jumlah WHERE id_dp = $id");
  header("location:datapustaka.php");
 ?>
