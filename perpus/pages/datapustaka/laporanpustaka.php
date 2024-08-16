<!DOCTYPE html>

<?php

session_start();

if ($_SESSION['status'] != "login") {

  header("location:../login/login.php");

}

$username = $_SESSION['username'];

include '../../koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM t_datapengguna WHERE username = '$username'");

while ($d = mysqli_fetch_array($data)) {

?>

  <html>



  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>AdminLTE 2 | Invoice</title>

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



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->



    <!-- Google Font -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  </head>



  <body onload="window.print()">

    <div class="wrapper">

      <!-- Main content -->

      <section class="invoice">

        <!-- title row -->

        <div class="row">

          <div class="col-xs-12">

            <h2 class="page-header">

              <i class="fa fa-globe"></i>Perpustakaan JDIH Kemenkumam Kalsel </a>

              <small class="pull-right">Tanggal: <?php echo date("d/m/Y") ?></small>

            </h2>

          </div>

          <!-- /.col -->

        </div>

        <?php

        $totalkoleksi = mysqli_query($koneksi, "SELECT COUNT(*) AS totalkoleksi FROM t_datapustaka");

        $datatk = mysqli_fetch_array($totalkoleksi);

        $totalkoleksikosong = mysqli_query($koneksi, "SELECT COUNT(*) AS totalkoleksi FROM t_datapustaka WHERE jumlah = 0");

        $datatkk = mysqli_fetch_array($totalkoleksikosong);

        $totalkoleksitersedia = mysqli_query($koneksi, "SELECT COUNT(*) AS totalkoleksi FROM t_datapustaka WHERE jumlah != 0");

        $datatkt = mysqli_fetch_array($totalkoleksitersedia);

        ?>

        <!-- info row -->

        <div class="row invoice-info">

          <div class="col-sm-4 invoice-col">

            <address>

              <strong>Koleksi Pustaka</strong><br>

              <h1><?php echo $datatk['totalkoleksi']; ?>

                <small>Pustaka</small>

              </h1>

          </div>

          <!-- /.col -->

          <div class="col-sm-4 invoice-col">

            <address>

              <strong>Pustaka Kosong</strong><br>

              <h1><?php echo $datatkk['totalkoleksi']; ?>

                <small>Pustaka</small>

              </h1>

            </address>

          </div>

          <!-- /.col -->

          <div class="col-sm-4 invoice-col">

            <address>

              <strong>Pustaka Tersedia</strong><br>

              <h1><?php echo $datatkt['totalkoleksi']; ?>

                <small>Pustaka</small>

              </h1>

            </address>

          </div>

          <!-- /.col -->

        </div>

        <!-- /.row -->



        <!-- Table row -->

        <div class="row">

          <div class="col-xs-12 table-responsive">

            <table class="table table-striped">

              <thead>

                <tr>

                  <th width="10px">#</th>

                  <th width="10px">ID</th>

                  <th>Judul Pustaka</th>

                  <th>Kategori</th>

                  <th>Pengarang</th>

                  <th>Penerbit</th>

                  <th>Tahun</th>

                  <th>Klasifikasi</th>

                  <th>Jumlah</th>

                </tr>

              </thead>

              <tbody>

                <?php

                $nomor = 1;

                $pustaka = mysqli_query($koneksi, "SELECT * FROM t_datapustaka ORDER BY judul_dp ASC");

                while ($p = mysqli_fetch_array($pustaka)) {

                ?>

                  <tr>

                    <td><?php echo $nomor ?>.</td>

                    <td><?php echo $p['id_dp'] ?></td>

                    <td><?php echo $p['judul_dp'] ?></td>

                    <td><?php echo $p['kategori']; ?></td>

                    <td><?php echo $p['pengarang']; ?></td>

                    <td><?php echo $p['penerbit']; ?></td>

                    <td><?php echo $p['tahun']; ?></td>

                    <td><?php echo $p['klasifikasi'] ?></td>

                    <td align="right"><?php echo $p['jumlah'] ?></td>

                  </tr>

                <?php

                  $nomor++;

                }

                ?>

              </tbody>

            </table>

          </div>

          <!-- /.col -->

        </div>

        <!-- /.row -->



        <div class="row">

          <!-- accepted payments column -->



          <div class="col-md-4 pull-right" style="margin-top: 100px;">

            <div class="table-responsive">

              <table align="right" width="100%">

                <tr align="center">

                  <td align="center">Mengetahui,</td>

                </tr>

                <tr>

                  <td align="center">Kepala Perpustakaan</td>

                </tr>

                <tr>

                  <td align="center" height="100px"></td>

                </tr>

                <tr>

                  <td align="center">Adi Permana Putra</td>

                </tr>

              </table>

            </div>

          </div>

          <!-- /.col -->

        </div>

        <!-- /.row -->

      </section>

      <!-- /.content -->

    </div>

    <!-- ./wrapper -->

  </body>



  </html>

<?php

}

?>