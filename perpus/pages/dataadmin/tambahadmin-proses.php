<?php
  session_start();
  if($_SESSION['status']!="login"){
  header("location:../login/login.php");
  }
  include '../../koneksi.php';

  $namaadmin = $_POST['namaadmin'];
  $nip = $_POST['nip'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $admin = mysqli_query($koneksi, "SELECT * FROM t_datapengguna WHERE username = '$username'");
  $cekadmin = mysqli_num_rows($admin);

  echo $cekadmin;

  if ($cekadmin != 0) {
    header("location:tambahadmin.php?pesan=usernametidaktersedia");
  } else {
    mysqli_query($koneksi,"INSERT INTO t_datapengguna (nama_pengguna, level, nip, username, password) VALUES ('$namaadmin', '2','$nip','$username','$password')");
    header("location:dataadmin.php");
  }
 ?>
