<?php
  session_start();
  if($_SESSION['status']!="login"){
  header("location:../login/login.php");
  }
  include '../../koneksi.php';

  $id = $_GET['id'];

  $pengguna = mysqli_query($koneksi, "SELECT * FROM t_datapengguna WHERE id_pengguna = $id");
  $dpeng = mysqli_fetch_assoc($pengguna);
  $password = $dpeng['nip'];

  mysqli_query($koneksi,"UPDATE t_datapengguna SET password = '$password' WHERE id_pengguna = $id");
  header("location:dataadmin.php?pesan=berhasil&id=$id");
 ?>
