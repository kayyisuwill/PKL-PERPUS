<?php
  session_start();
  if($_SESSION['status']!="login"){
  header("location:../login/login.php");
  }
  include '../../koneksi.php';

  $id = $_GET['del_id'];

  if (!mysqli_query($koneksi, "DELETE FROM t_datapustaka WHERE id_dp = '$id'")) {
    header("location:datapustaka.php?pesan=gagal");
  } else {
    header("location:datapustaka.php");
  }
 ?>
