<?php
$pesan = "Masuk untuk memulai sesi";
if (isset($_GET['pesan'])) {
  if ($_GET['pesan'] == "gagallogin") {
    $pesan = "Kombinasi username dan password salah, silahkan coba kembali";
  }
}
?>
<!DOCTYPE html>
<html>
  
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perpustakaan JDIH | Kantor Wilayah Kementrian Hukum dan HAM Kalimantan Selatan</title>
  
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
  <link rel="icon" href="../../dist/img/kumham.png" type="">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .login-box-body .btn {
      margin-bottom: 10px;
    }
    .login-logo img {
      display: block;
      margin: 0 auto;
      width: 100px; /* Adjust as needed */
      height: auto;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box" style="padding: 0 auto !important;">
  <div class="login-logo">
    <img src="../../dist/img/kumham.png" alt="Logo">
    <a href="../../index.php"><b>Perpustakaan | </b>JDIH</a>
    <div class="lead" style="font-size: 20px;">
      Kantor Wilayah Kementrian Hukum dan HAM Kalimantan Selatan 
    </div>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "gagallogin") { echo "text-red"; } ?>"><?php echo $pesan; ?></p>
    <form action="login-proses.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat btn-lg">Masuk</button>
        </div>
      </div>
    </form>
    <div class="social-auth-links">
      <a href="../pengunjung/pengunjung.php" class="btn btn-default btn-flat"><i class="fa fa-user-secret"></i> Data Kunjungan</a>
      <a href="../caripustaka/caripustaka.php" class="btn btn-default btn-flat"><i class="fa fa-search"></i> Cari Pustaka</a>
      <a href="../login/daftaranggota.php" class="btn btn-default btn-flat"><i class="fa fa-user"></i> Daftar Anggota Perpustakaan</a>
    </div>
  </div>
</div>
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
