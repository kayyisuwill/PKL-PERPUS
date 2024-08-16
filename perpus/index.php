<!DOCTYPE html>

<?php

session_start();

if ($_SESSION['status'] != "login") {

  header("location:pages/login/login.php");

}

$username = $_SESSION['username'];

include 'koneksi.php';

$data = mysqli_query($koneksi, "select * from t_datapengguna where username = '$username'");

while ($d = mysqli_fetch_array($data)) {

?>

  <html>



  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>

    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->

    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->

    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">

    <!-- DataTables -->

    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- jvectormap -->

    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <link rel="icon" href="dist/img/kumham.png" type="kumham.png">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->



    <!-- Google Font -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  </head>



  <body class="hold-transition layout-boxed skin-blue sidebar-mini">

    <div class="wrapper">



      <header class="main-header">



        <!-- Logo -->

        <a href="index.php" class="logo">

          <!-- mini logo for sidebar mini 50x50 pixels -->

          

          <!-- logo for regular state and mobile devices -->

          <span class="logo-lg"><b>KEMENKUMHAM</b></span>

        </a>



        <!-- Header Navbar: style can be found in header.less -->

        <nav class="navbar navbar-static-top">

          <!-- Sidebar toggle button-->

          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

            <span class="sr-only">Toggle navigation</span>

          </a>

          <!-- Navbar Right Menu -->

          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

              <!-- User Account: style can be found in dropdown.less -->

              <li class="dropdown user user-menu">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                  <img src="dist/img/kumham.png" class="user-image" alt="User Image">

                  <span class="hidden-xs"><?php echo $d['nama_pengguna']; ?></span>

                </a>

                <ul class="dropdown-menu">

                  <!-- User image -->

                  <li class="user-header">

                    <img src="dist/img/kumham.png" class="img-circle" alt="User Image">



                    <p>

                      <?php echo $d['nama_pengguna']; ?>

                      <small>

                        <?php

                        if ($d['level'] == 1) {

                          echo "Kepala Perpustakaan";

                        } else {

                          echo "Admin Perpustakaan";

                        }

                        ?>

                      </small>

                    </p>

                  </li>

                  <!-- Menu Footer-->

                  <li class="user-footer">

                    <div class="pull-left">

                      <a href="pages/pengaturanakun/pengaturanakun.php" class="btn btn-default btn-flat">Profil</a>

                    </div>

                    <div class="pull-right">

                      <a href="pages/login/logout-proses.php" class="btn btn-default btn-flat">Keluar</a>

                    </div>

                  </li>

                </ul>

              </li>

            </ul>

          </div>



        </nav>

      </header>

      <!-- Left side column. contains the logo and sidebar -->

      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->

        <section class="sidebar">

          <!-- Sidebar user panel -->

          <div class="user-panel">

            <div class="pull-left image">

              <img src="dist/img/kumham.png" class="img-circle" alt="User Image">

            </div>

            <div class="pull-left info">

              <p><?php echo $d['nama_pengguna']; ?></p>

              <a href="#"><i class="fa fa-user text-success"></i> <?php

                                                                  if ($d['level'] == 1) {

                                                                    echo "Kepala Perpustakaan";

                                                                  } else {

                                                                    echo "Admin Perpustakaan";

                                                                  }

                                                                  ?></a>

            </div>

          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->

          <ul class="sidebar-menu" data-widget="tree">

            <li class="header">MENU</li>

            <li class="active">

              <a href="index.php">

                <i class="fa fa-home"></i> <span>Beranda</span>

              </a>

            </li>

            <li style="<?php if ($d['level'] == 1) {

                          echo $displaynone;

                        } ?>">

              <a href="pages/transaksi/transaksi.php">

                <i class="fa fa-exchange"></i> <span>Transaksi</span>

              </a>

            </li>

            <li>

              <a href="pages/datapustaka/datapustaka.php">

                <i class="fa fa-book"></i> <span>Data Pustaka</span>

              </a>

            </li>

            <li style="<?php if ($d['level'] == 1) {

                          echo $displaynone;

                        } ?>">

              <a href="pages/dataanggota/dataanggota.php">

                <i class="fa fa-users"></i> <span>Data Anggota</span>

              </a>

            </li>

            <li style="<?php if ($d['level'] == 2) {

                          echo $displaynone;

                        } ?>">

              <a href="pages/dataadmin/dataadmin.php">

                <i class="fa fa-user"></i> <span>Data Admin</span>

              </a>

            </li>

            <li style="<?php if ($d['level'] == 1) {

                          echo $displaynone;

                        } ?>">

              <a href="pages/datapengunjung/datapengunjung.php">

                <i class="fa fa-user-secret"></i> <span>Data Pengunjung</span>

              </a>

            </li>

            <li>

              <a href="pages/pengaturanakun/pengaturanakun.php">

                <i class="fa fa-gear"></i> <span>Pengaturan Akun</span>

              </a>

            </li>

                        <li>

              <a href="pages/dataadmin/dataadmin.php">

                <i class="fa fa-user"></i> <span>Tambahkan Admin</span>

              </a>

            </li>



<br>
<li>

              <a href="pages/transaksi/reportdatatransaksi.php">

                <i class="fa fa-circle-o"></i> <span>Laporan Data Transaksi</span>

              </a>

            <li>
            

              <a href="pages/datapustaka/reportdatapustakapertahun.php">

                <i class="fa fa-circle-o"></i> <span>Laporan Data Pustaka</span>

              </a>
              
                                    <li>

              <a href="pages/dataanggota/reportdataanggota.php">

                <i class="fa fa-circle-o"></i> <span>Laporan Data Anggota</span>

              </a>

            </li>
 <li>

              <a href="pages/datapengunjung/reportdatapengunjung.php">

                <i class="fa fa-circle-o"></i> <span>Laporan Data Pengunjung</span>

              </a>

            </li>

            <li>
              <a href="pages/dataadmin/reportdataadmin.php">

                <i class="fa fa-circle-o"></i> <span>Laporan Data Admin</span>

              </a>

            </li>

            
                                   
                                             



            <li class="header" style="<?php if ($d['level'] == 2) {

                                        echo $displaynone;

                                      } ?>">LAPORAN</li>

            <li style="<?php if ($d['level'] == 2) {

                          echo $displaynone;

                        } ?>"><a target="_blank" href="pages/dataadmin/reportdataadmin.php"><i class="fa fa-circle-o"></i> <span>Data Admin</span></a></li>

            <li style="<?php if ($d['level'] == 2) {

                          echo $displaynone;

                        } ?>"><a target="_blank" href="pages/transaksi/reportdatatransaksi.php"><i class="fa fa-circle-o"></i> <span>Data Transaksi</span></a></li>

            <li style="<?php if ($d['level'] == 2) {

                          echo $displaynone;

                        } ?>"><a target="_blank" href="pages/datapustaka/reportdatapustaka.php"><i class="fa fa-circle-o"></i> <span>Data Pustaka</span></a></li>

            <li style="<?php if ($d['level'] == 2) {

                          echo $displaynone;

                        } ?>"><a target="_blank" href="pages/dataanggota/reportdataanggota.php"><i class="fa fa-circle-o"></i> <span>Data Anggota</span></a></li>

            <li style="<?php if ($d['level'] == 2) {

                          echo $displaynone;

                        } ?>"><a target="_blank" href="pages/datapengunjung/reportdatapengunjung.php"><i class="fa fa-circle-o"></i> <span>Data Pengunjung</span></a></li>

          </ul>

        </section>

        <!-- /.sidebar -->

      </aside>



      <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

          <h1>

            Beranda

          </h1>

          <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>

            <li class="active">Dasbor</li>

          </ol>

        </section>



        <!-- Main content -->

        <section class="content">

          <!-- Info boxes -->

          <div class="row">

            <?php

            $pengunjung = mysqli_query($koneksi, "SELECT COUNT(*) AS totalpengunjung FROM t_datapengunjung");

            $dpengunjung = mysqli_fetch_assoc($pengunjung);

            $pustaka = mysqli_query($koneksi, "SELECT COUNT(*) AS totalpustaka FROM t_datapustaka");

            $dpustaka = mysqli_fetch_assoc($pustaka);

            $anggota = mysqli_query($koneksi, "SELECT COUNT(*) AS totalanggota FROM t_dataanggota");

            $danggota = mysqli_fetch_assoc($anggota);

            $peminjaman = mysqli_query($koneksi, "SELECT COUNT(*) AS totalpeminjaman FROM t_peminjaman");

            $dpeminjaman = mysqli_fetch_assoc($peminjaman);

            ?>

            <div class="col-md-3 col-sm-6 col-xs-12">

              <div class="info-box">

                <span class="info-box-icon bg-aqua"><i class="fa fa-user-secret"></i></span>

                <div class="info-box-content">

                  <span class="info-box-text">Pengunjung</span>

                  <span class="info-box-number"><?php echo $dpengunjung['totalpengunjung']; ?></span>

                </div>

                <!-- /.info-box-content -->

              </div>

              <!-- /.info-box -->

            </div>

            <!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">

              <div class="info-box">

                <span class="info-box-icon bg-red"><i class="fa fa-archive"></i></span>



                <div class="info-box-content">

                  <span class="info-box-text">Pustaka</span>

                  <span class="info-box-number"><?php echo $dpustaka['totalpustaka']; ?></span>

                </div>

                <!-- /.info-box-content -->

              </div>

              <!-- /.info-box -->

            </div>

            <!-- /.col -->



            <!-- fix for small devices only -->

            <div class="clearfix visible-sm-block"></div>



            <div class="col-md-3 col-sm-6 col-xs-12">

              <div class="info-box">

                <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>



                <div class="info-box-content">

                  <span class="info-box-text">Anggota</span>

                  <span class="info-box-number"><?php echo $danggota['totalanggota']; ?></span>

                </div>

                <!-- /.info-box-content -->

              </div>

              <!-- /.info-box -->

            </div>

            <!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">

              <div class="info-box">

                <span class="info-box-icon bg-yellow"><i class="fa fa-upload"></i></span>



                <div class="info-box-content">

                  <span class="info-box-text">Peminjaman</span>

                  <span class="info-box-number"><?php echo $dpeminjaman['totalpeminjaman']; ?></span>

                </div>

                <!-- /.info-box-content -->

              </div>

              <!-- /.info-box -->

            </div>

            <!-- /.col -->

            <div class="row">

            </div>

            <!-- /.row -->

            <div class="col-xs-12">

              <div class="box">

                <div class="box-header">

                  <h3 class="box-title">Peminjaman Terbaru</h3>



                  <div class="box-tools">

                    <div class="input-group input-group-sm" style="width: 150px;">

                      <input type="text" id="myInput" name="table_search" class="form-control pull-right" placeholder="Cari">



                      <div class="input-group-btn">

                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>

                      </div>

                    </div>

                  </div>

                </div>

                <!-- /.box-header -->

                <div class="box-body table-responsive no-padding">

                  <table class="table table-hover">

                    <tr>

                      <th>ID</th>

                      <th>Nama Anggota</th>

                      <th>Judul Pustaka</th>

                      <th>Tgl</th>

                      <th>Aksi</th>

                    </tr>

                    <tbody id="myTable">

                      <?php

                      $peminjaman = mysqli_query($koneksi, "SELECT t_peminjaman.id_pmnjmn, t_peminjaman.nomor_pmnjmn, t_peminjaman.tgl_pjm, t_dataanggota.nama_anggota, t_datapustaka.judul_dp

                      FROM t_peminjaman

                      INNER JOIN t_dataanggota

                      ON t_peminjaman.id_anggota = t_dataanggota.id_anggota

                      INNER JOIN t_datapustaka

                      ON t_peminjaman.id_dp = t_datapustaka.id_dp

                      ORDER BY id_pmnjmn DESC

                      LIMIT 20");

                      while ($dpinjam = mysqli_fetch_array($peminjaman)) {

                      ?>

                        <tr>

                          <td><?php echo $dpinjam['nomor_pmnjmn']; ?></td>

                          <td><?php echo $dpinjam['nama_anggota']; ?></td>

                          <td><?php echo $dpinjam['judul_dp']; ?></td>

                          <td><?php

                              $tglpjm = date("d/m/Y", strtotime($dpinjam['tgl_pjm']));

                              echo $tglpjm;

                              ?></td>

                          <td><a href="pages/transaksi/informasipeminjaman.php?id=<?php echo $dpinjam['id_pmnjmn']; ?>" class="btn btn-info btn-xs btn-flat"><i class="fa fa-eye"></i></a></td>

                        </tr>

                      <?php } ?>

                    </tbody>

                  </table>

                </div>

                <!-- /.box-body -->

              </div>

              <!-- /.box -->

            </div>

          </div>

          <!-- /.row -->

        </section>

        <!-- /.content -->

      </div>

      <!-- /.content-wrapper -->



      <footer class="main-footer">

        <div class="pull-right hidden-xs">

          

      </footer>



      <!-- Control Sidebar -->

      <aside class="control-sidebar control-sidebar-dark">

        <!-- Create the tabs -->

        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>

        </ul>

        <!-- Tab panes -->

        <div class="tab-content">

          <!-- Home tab content -->

          <div class="tab-pane" id="control-sidebar-home-tab">

            <h3 class="control-sidebar-heading">Recent Activity</h3>

            <ul class="control-sidebar-menu">

              <li>

                <a href="javascript:void(0)">

                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>



                  <div class="menu-info">

                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>



                    <p>Will be 23 on April 24th</p>

                  </div>

                </a>

              </li>

              <li>

                <a href="javascript:void(0)">

                  <i class="menu-icon fa fa-user bg-yellow"></i>



                  <div class="menu-info">

                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>



                    <p>New phone +1(800)555-1234</p>

                  </div>

                </a>

              </li>

              <li>

                <a href="javascript:void(0)">

                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>



                  <div class="menu-info">

                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>



                    <p>nora@example.com</p>

                  </div>

                </a>

              </li>

              <li>

                <a href="javascript:void(0)">

                  <i class="menu-icon fa fa-file-code-o bg-green"></i>



                  <div class="menu-info">

                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>



                    <p>Execution time 5 seconds</p>

                  </div>

                </a>

              </li>

            </ul>

            <!-- /.control-sidebar-menu -->



            <h3 class="control-sidebar-heading">Tasks Progress</h3>

            <ul class="control-sidebar-menu">

              <li>

                <a href="javascript:void(0)">

                  <h4 class="control-sidebar-subheading">

                    Custom Template Design

                    <span class="label label-danger pull-right">70%</span>

                  </h4>



                  <div class="progress progress-xxs">

                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>

                  </div>

                </a>

              </li>

              <li>

                <a href="javascript:void(0)">

                  <h4 class="control-sidebar-subheading">

                    Update Resume

                    <span class="label label-success pull-right">95%</span>

                  </h4>



                  <div class="progress progress-xxs">

                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>

                  </div>

                </a>

              </li>

              <li>

                <a href="javascript:void(0)">

                  <h4 class="control-sidebar-subheading">

                    Laravel Integration

                    <span class="label label-warning pull-right">50%</span>

                  </h4>



                  <div class="progress progress-xxs">

                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>

                  </div>

                </a>

              </li>

              <li>

                <a href="javascript:void(0)">

                  <h4 class="control-sidebar-subheading">

                    Back End Framework

                    <span class="label label-primary pull-right">68%</span>

                  </h4>



                  <div class="progress progress-xxs">

                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>

                  </div>

                </a>

              </li>

            </ul>

            <!-- /.control-sidebar-menu -->



          </div>

          <!-- /.tab-pane -->



          <!-- Settings tab content -->

          <div class="tab-pane" id="control-sidebar-settings-tab">

            <form method="post">

              <h3 class="control-sidebar-heading">General Settings</h3>



              <div class="form-group">

                <label class="control-sidebar-subheading">

                  Report panel usage

                  <input type="checkbox" class="pull-right" checked>

                </label>



                <p>

                  Some information about this general settings option

                </p>

              </div>

              <!-- /.form-group -->



              <div class="form-group">

                <label class="control-sidebar-subheading">

                  Allow mail redirect

                  <input type="checkbox" class="pull-right" checked>

                </label>



                <p>

                  Other sets of options are available

                </p>

              </div>

              <!-- /.form-group -->



              <div class="form-group">

                <label class="control-sidebar-subheading">

                  Expose author name in posts

                  <input type="checkbox" class="pull-right" checked>

                </label>



                <p>

                  Allow the user to show his name in blog posts

                </p>

              </div>

              <!-- /.form-group -->



              <h3 class="control-sidebar-heading">Chat Settings</h3>



              <div class="form-group">

                <label class="control-sidebar-subheading">

                  Show me as online

                  <input type="checkbox" class="pull-right" checked>

                </label>

              </div>

              <!-- /.form-group -->



              <div class="form-group">

                <label class="control-sidebar-subheading">

                  Turn off notifications

                  <input type="checkbox" class="pull-right">

                </label>

              </div>

              <!-- /.form-group -->



              <div class="form-group">

                <label class="control-sidebar-subheading">

                  Delete chat history

                  <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>

                </label>

              </div>

              <!-- /.form-group -->

            </form>

          </div>

          <!-- /.tab-pane -->

        </div>

      </aside>

      <!-- /.control-sidebar -->

      <!-- Add the sidebar's background. This div must be placed

       immediately after the control sidebar -->

      <div class="control-sidebar-bg"></div>



    </div>

    <!-- ./wrapper -->



    <!-- jQuery 3 -->

    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->

    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- FastClick -->

    <script src="bower_components/fastclick/lib/fastclick.js"></script>

    <!-- AdminLTE App -->

    <script src="dist/js/adminlte.min.js"></script>

    <!-- Sparkline -->

    <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

    <!-- jvectormap  -->

    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- SlimScroll -->

    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <!-- ChartJS -->

    <script src="bower_components/chart.js/Chart.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

    <script src="dist/js/pages/dashboard2.js"></script>

    <!-- AdminLTE for demo purposes -->

    <script src="dist/js/demo.js"></script>

    <!-- page script -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>

      $(document).ready(function() {

        $("#myInput").on("keyup", function() {

          var value = $(this).val().toLowerCase();

          $("#myTable tr").filter(function() {

            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

          });

        });

      });

    </script>

  </body>



  </html>

<?php

}

?>