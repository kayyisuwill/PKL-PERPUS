<?php
  session_start();
  if($_SESSION['status']!="login"){
  header("location:../login/login.php");
  }
  include '../../koneksi.php';

  $nomoranggota = $_POST['nomoranggota'];
  $nomorpustaka = $_POST['nomorpustaka'];

  $anggota = mysqli_query($koneksi,"SELECT * FROM t_dataanggota WHERE no_anggota = $nomoranggota");
  $cekanggota = mysqli_num_rows($anggota);
  $pustaka= mysqli_query($koneksi,"SELECT * FROM t_datapustaka WHERE id_dp = $nomorpustaka");
  $cekpustaka = mysqli_num_rows($pustaka);
  if ($cekanggota == 0 and $cekpustaka == 0) {
    header("location:tambahpeminjaman.php?pesan=tidakditemukan");
  } elseif ($cekanggota == 0) {
    header("location:tambahpeminjaman.php?pesan=anggotatidakditemukan");
  } elseif ($cekpustaka == 0) {
    header("location:tambahpeminjaman.php?pesan=pustakatidakditemukan");
  } else {
    $_SESSION['nomoranggota'] = $nomoranggota;
    echo $_SESSION['nomoranggota'];
    $_SESSION['nomorpustaka'] = $nomorpustaka;
    echo $_SESSION['nomorpustaka'];
    header("location:tambahpeminjaman-verifikasi.php");
  }
 ?>
