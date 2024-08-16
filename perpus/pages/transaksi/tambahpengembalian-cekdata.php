<?php
  session_start();
  if($_SESSION['status']!="login"){
  header("location:../login/login.php");
  }
  include '../../koneksi.php';

  $nomorpeminjaman = $_POST['nomorpeminjaman'];

  $peminjaman = mysqli_query($koneksi,"SELECT * FROM t_peminjaman WHERE nomor_pmnjmn = $nomorpeminjaman");
  $cekpeminjaman = mysqli_num_rows($peminjaman);
  if ($cekpeminjaman == 0) {
    header("location:tambahpengembalian.php?pesan=tidakditemukan");
  } else {
    $_SESSION['nomorpeminjaman'] = $nomorpeminjaman;
    header("location:tambahpengembalian-verifikasi.php");
  }
 ?>
