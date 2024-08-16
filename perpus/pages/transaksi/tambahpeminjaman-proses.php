<?php

  session_start();

  if($_SESSION['status']!="login"){

  header("location:../login/login.php");

  }

  include '../../koneksi.php';



  do {

    $nomorpmnjmn = rand(pow(10, 5-1), pow(10, 5)-1); //akan menghasilkan angka acak antara 10000 dan 99999 

    $sql = mysqli_query($koneksi,"SELECT * FROM t_peminjaman WHERE nomor_pmnjmn = $nomorpmnjmn");

    $cek = mysqli_num_rows($sql);

  } while ($cek >= 1); // nomor acak yang dihasilkan adalah unik.



  echo $nomorpmnjmn;



  $idanggota = $_POST['idanggota'];

  $iddp = $_POST['iddp'];

  $jumlahdp = $_POST['jumlahdp'];

  $idpengguna = $_POST['idpengguna'];

  $tglpnjm = $_POST['tanggalpinjam'];

  $tglkmbl = $_POST['tanggalkembali'];



  echo $idanggota."<br>";

  echo $iddp."<br>";

  echo $idpengguna."<br>";

  echo $tglpnjm."<br>";

  echo $tglkmbl."<br>";

  echo $jumlahdp."<br>";



  if ($jumlahdp <= 0) {

    header("location:transaksi.php");

  } else {

    $jumlahdp = $jumlahdp - 1;

    mysqli_query($koneksi,"INSERT INTO t_peminjaman (id_anggota, nomor_pmnjmn, id_dp, id_pengguna, tgl_pjm, tgl_kmbl) VALUES ('$idanggota', '$nomorpmnjmn', '$iddp','$idpengguna','$tglpnjm','$tglkmbl')");

    mysqli_query($koneksi,"UPDATE t_datapustaka SET jumlah = $jumlahdp WHERE id_dp = $iddp");

  }



  header("location:transaksi.php");

 ?>

