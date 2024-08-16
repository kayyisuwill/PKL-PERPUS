<?php
  session_start();
  if($_SESSION['status']!="login"){
  header("location:../login/login.php");
  }
  include '../../koneksi.php';

  $id = $_GET['del_id'];

  mysqli_query($koneksi, "DELETE FROM t_datapengguna WHERE id_pengguna = '$id'");

  header("location:dataadmin.php");
 ?>
