<?php

  session_start();

  if($_SESSION['status']!="login"){

  header("location:../login/login.php");

  }

  include '../../koneksi.php';



  $today = date("dmy");

  $nomor = 5;

  $nomorpengguna = $nomor.$today;



  echo $nomorpengguna;



  $namaanggota = $_POST['namaanggota'];

  $tempatlahir = $_POST['tempatlahir'];

  $tanggallahir = $_POST['tanggallahir'];

  $jeniskelamin = $_POST['jeniskelamin'];

  $telepon = $_POST['telepon'];

  $nik = $_POST['nik'];

  $alamat = $_POST['alamat'];

  $pekerjaan = $_POST['pekerjaan'];



  mysqli_query($koneksi,"INSERT INTO t_dataanggota (no_anggota, nama_anggota, tempat_lahir, tanggal_lahir, jns_klmn, alamat, telp, nik, pkrjaan, denda) VALUES ('','$namaanggota', '$tempatlahir','$tanggallahir','$jeniskelamin','$alamat','$telepon','$nik','$pekerjaan', '0')");

  $last_id = mysqli_insert_id($koneksi);

  $nomorpengguna = $last_id.$today; //Menggabungkan nomor database dengan tanggal hari ini membuatnya menjadi nomor acak//

  mysqli_query($koneksi,"UPDATE t_dataanggota SET no_anggota = '$nomorpengguna' WHERE id_anggota = $last_id");



  header("location:dataanggota.php");

 ?>

