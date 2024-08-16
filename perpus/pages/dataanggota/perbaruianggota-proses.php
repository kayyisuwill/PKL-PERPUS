<?php
  session_start();
  if($_SESSION['status']!="login"){
  header("location:../login/login.php");
  }
  include '../../koneksi.php';

  $id = $_POST['id'];
  $namaanggota = $_POST['namaanggota'];
  $tempatlahir = $_POST['tempatlahir'];
  $tanggallahir = $_POST['tanggallahir'];
  $jeniskelamin = $_POST['jeniskelamin'];
  $telepon = $_POST['telepon'];
  $nik = $_POST['nik'];
  $alamat = $_POST['alamat'];
  $pekerjaan = $_POST['pekerjaan'];

  echo $id;

  mysqli_query($koneksi,"UPDATE t_dataanggota SET nama_anggota = '$namaanggota', tempat_lahir = '$tempatlahir', tanggal_lahir = '$tanggallahir', jns_klmn = '$jeniskelamin', alamat = '$alamat', telp = '$telepon', nik = '$nik', pkrjaan = '$pekerjaan'  WHERE id_anggota = $id");
  header("location:dataanggota.php");
 ?>
