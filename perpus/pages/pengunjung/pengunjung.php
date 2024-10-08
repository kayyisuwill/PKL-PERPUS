<?php

$pesan = "Silahkan isi data kunjungan";

if (isset($_GET['pesan'])) {
  if ($_GET['pesan'] == "berhasil") {
    $pesan = "Selamat datang";
  } elseif ($_GET['pesan'] == "tidakditemukan") {
    $pesan = "Nomor anggota tidak ditemukan, <br> silahkan coba kembali";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Kunjungan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
  <link rel="icon" href="../../dist/img/favicon-16x16.png" type="image/ico">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script>
    window.onload = function() {
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('anggota') === 'true') {
        alert('Anda adalah anggota');
      }
    };
  </script>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index.php"><b>Perpustakaan | </b>JDIH</a>
      <h6 class="lead">Kantor Wilayah Kementrian Hukum dan HAM Kalimantan Selatan</h6>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "berhasil") {
                                echo "text-green";
                              } elseif (isset($_GET['pesan']) && $_GET['pesan'] == "tidakditemukan") {
                                echo "text-red";
                              } ?>"><?php echo $pesan; ?></p>

      <form action="pengunjung-proses.php" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="namapengunjung" placeholder="Nama" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="keperluanpengunjung" placeholder="Alamat" required>
          <span class="glyphicon glyphicon-question-sign form-control-feedback"></span>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <button type="submit" name="submitpengunjung" class="btn btn-primary btn-block btn-flat">Selesai</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- ATAU ANGGOTA -</p>
        <form action="pengunjung-proses.php" method="post">
          <div class="form-group has-feedback">
            <input type="number" class="form-control" name="nomoranggota" placeholder="Nomor Anggota" required>
            <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" name="submitanggota" class="btn btn-success btn-block btn-flat">Kirim</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="../../plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>
</html>
