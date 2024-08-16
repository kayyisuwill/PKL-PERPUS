<?php
  session_start();
  if($_SESSION['status']!="login"){
  header("location:../login/login.php");
  }
  include '../../koneksi.php';

  do {
    $nomorpgmbln = rand(pow(10, 5-1), pow(10, 5)-1);
    $sql = mysqli_query($koneksi,"SELECT * FROM t_pengembalian WHERE nomor_pgmbln = $nomorpgmbln");
    $cek = mysqli_num_rows($sql);
  } while ($cek >= 1);

  $idpmnjmn = $_POST['idpmnjmn'];
  $idanggota = $_POST['idanggota'];
  $iddp = $_POST['iddp'];
  $idpengguna = $_POST['idpengguna'];
  $ktrlmbtn = $_POST['keterlambatan'];
  $tglkmbl = $_POST['tanggalkembali'];
  $jumlahdp = $_POST['jumlahdp'];
  echo $ktrlmbtn;

  $today = date("Y-m-d");
  $denda = date('Y-m-d', strtotime('7 days', strtotime($today)));

  echo $denda;

  $jumlahdp = $jumlahdp + 1;
  mysqli_query($koneksi,"INSERT INTO t_pengembalian (id_pmnjmn, nomor_pgmbln, id_anggota, id_dp, id_pengguna, ktrlmbtn, tgl_kmbl) VALUES ('$idpmnjmn', '$nomorpgmbln','$idanggota','$iddp','$idpengguna','$ktrlmbtn','$tglkmbl')");
  mysqli_query($koneksi,"UPDATE t_datapustaka SET jumlah = $jumlahdp WHERE id_dp = $iddp");
  if ($ktrlmbtn > 0) {
    mysqli_query($koneksi, "UPDATE t_dataanggota SET denda = '$denda' WHERE id_anggota = $idanggota");
  }

  header("location:transaksi.php");
 ?>
