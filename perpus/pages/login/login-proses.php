<?php

  // mengaktifkan session php

  session_start();



  // menghubungkan dengan koneksi

  include '../../koneksi.php';



  // menangkap data yang dikirim dari form

  $username = $_POST['username'];

  $password = $_POST['password'];



  // menyeleksi data admin dengan username dan password yang sesuai

  $data = mysqli_query($koneksi,"SELECT * FROM t_datapengguna WHERE username='$username' AND password='$password'");

  $dpengguna = mysqli_fetch_assoc($data);

  $idpengguna = $dpengguna['id_pengguna'];



  // menghitung jumlah data yang ditemukan

  $cek = mysqli_num_rows($data);



  $today = date("Y-m-d");

  $sql = mysqli_query($koneksi,"SELECT * FROM t_dataanggota");

  while ($result = mysqli_fetch_array($sql)) {

    $id = $result['id_anggota'];

    $denda = $result['denda'];

    $date1=date_create($denda);

    $date2=date_create($today);

    $diff=date_diff($date1,$date2);

    $hasil = $diff->format("%R%a");

    if ($hasil > 0) {

      mysqli_query($koneksi,"UPDATE t_dataanggota SET denda = '0000-00-00' WHERE id_anggota = $id;");

    }

  }



  if($cek > 0){

  	$_SESSION['username'] = $username;

  	$_SESSION['status'] = "login";

    $_SESSION['idpengguna'] = $idpengguna;

  	header("location:../../index.php");

  }else{

  	header("location:login.php?pesan=gagallogin");

  }



 ?>

