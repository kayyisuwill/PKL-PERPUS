<?php
  session_start();
  if($_SESSION['status']!="login"){
  header("location:../login/login.php");
  }
  include '../../koneksi.php';

  $id = $_POST['id'];
  $namaadmin = $_POST['namaadmin'];
  $nip = $_POST['nip'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  echo $id;

  mysqli_query($koneksi,"UPDATE t_datapengguna SET nama_pengguna = '$namaadmin', nip = '$nip', username = '$username', password = '$password' WHERE id_pengguna = $id");
  header("location:dataadmin.php");
 ?>
