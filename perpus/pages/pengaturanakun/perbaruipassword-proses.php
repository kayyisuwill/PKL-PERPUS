<?php
  session_start();
  if($_SESSION['status']!="login"){
  header("location:../login/login.php");
  }
  include '../../koneksi.php';

  $id = $_POST['id'];
  $passwordlama = $_POST['passwordlama'];
  $passwordbaru = $_POST['passwordbaru'];
  $passwordbaru2 = $_POST['passwordbaru2'];

  $pengguna = mysqli_query($koneksi, "SELECT * FROM t_datapengguna WHERE id_pengguna = $id AND password = '$passwordlama'");
  $cekpassword = mysqli_num_rows($pengguna);

  if ($cekpassword == 0) {
    header("location:perbaruipassword.php?pesan=passwordlamasalah&id=$id");
  } elseif ($passwordbaru != $passwordbaru2) {
    header("location:perbaruipassword.php?pesan=passwordtidaksama&id=$id");
  } else {
    mysqli_query($koneksi,"UPDATE t_datapengguna SET password = '$passwordbaru' WHERE id_pengguna = $id");
    header("location:pengaturanakun.php");
  }
 ?>
