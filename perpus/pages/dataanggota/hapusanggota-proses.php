<?php
  session_start();
  if($_SESSION['status']!="login"){
  header("location:../login/login.php");
  }
  include '../../koneksi.php';

  $id = $_GET['del_id'];

  if (!mysqli_query($koneksi, "DELETE FROM t_dataanggota WHERE id_anggota = '$id'")) {
    header("location:dataanggota.php?pesan=gagal");
  } else {
    header("location:dataanggota.php");
  }
 ?>
