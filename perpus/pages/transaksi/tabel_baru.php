<!DOCTYPE html>

<?php

session_start();

if ($_SESSION['status'] != "login") {

  header("location:../login/login.php");

}

$username = $_SESSION['username'];

include '../../koneksi.php';

$data = mysqli_query($koneksi, "select * from t_datapengguna where username = '$username'");

while ($d = mysqli_fetch_array($data)) {

?>

  <html>



  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Transaksi</title>

    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->

    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->

    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">

    <!-- DataTables -->

    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <link rel="icon" href="../../dist/img/kumham.png" type="image/ico">



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

        <a href="../../index.php" class="logo">

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

                  <img src="../../dist/img/kumham.png" class="user-image" alt="User Image">

                  <span class="hidden-xs"><?php echo $d['nama_pengguna']; ?></span>

                </a>

                <ul class="dropdown-menu">

                  <!-- User image -->

                  <li class="user-header">

                    <img src="../../dist/img/kumham.png" class="img-circle" alt="User Image">



                    <p>

                      <?php echo $d['nama_pengguna']; ?>

                      <small><?php

                              if ($d['level'] == 1) {

                                echo "Kepala Perpustakaan";

                              } else {

                                echo "Admin Perpustakaan";

                              }

                              ?></small>

                    </p>

                  </li>

                  <!-- Menu Footer-->

                  <li class="user-footer">

                    <div class="pull-left">

                      <a href="../pengaturanakun/pengaturanakun.php" class="btn btn-default btn-flat">Profil</a>

                    </div>

                    <div class="pull-right">

                      <a href="../login/logout-proses.php" class="btn btn-default btn-flat">Keluar</a>

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

              <img src="../../dist/img/kumham.png" class="img-circle" alt="User Image">

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

            <li>

              <a href="../../index.php">

                <i class="fa fa-home"></i> <span>Beranda</span>

              </a>

            </li>

            <li class="active" style="<?php if ($d['level'] == 1) {

                                        echo $displaynone;

                                      } ?>">

              <a href="transaksi.php">

                <i class="fa fa-exchange"></i> <span>Transaksi</span>

              </a>
              <a href="tabel_denda.php">

<i class="fa fa-money"></i> <span>Tabel Denda</span>

</a>

            </li>

            <li>

              <a href="../datapustaka/datapustaka.php">

                <i class="fa fa-book"></i> <span>Data Pustaka</span>

              </a>

            </li>

            <li style="<?php if ($d['level'] == 1) {

                          echo $displaynone;

                        } ?>">

              <a href="../dataanggota/dataanggota.php">

                <i class="fa fa-users"></i> <span>Data Anggota</span>

              </a>

            </li>

            <li style="<?php if ($d['level'] == 2) {

                          echo $displaynone;

                        } ?>">

              <a href="../dataadmin/dataadmin.php">

                <i class="fa fa-user"></i> <span>Data Admin</span>

              </a>

            </li>

            <li style="<?php if ($d['level'] == 1) {

                          echo $displaynone;

                        } ?>">

              <a href="../datapengunjung/datapengunjung.php">

                <i class="fa fa-user-secret"></i> <span>Data Pengunjung</span>

              </a>

            </li>

            <li>

              <a href="../pengaturanakun/pengaturanakun.php">

                <i class="fa fa-gear"></i> <span>Pengaturan Akun</span>

              </a>

            </li>

            <li class="header" style="<?php if ($d['level'] == 2) {

                                        echo $displaynone;

                                      } ?>">LAPORAN</li>

            <li style="<?php if ($d['level'] == 2) {

                          echo $displaynone;

                        } ?>"><a target="_blank" href="../dataadmin/reportdataadmin.php"><i class="fa fa-circle-o"></i> <span>Data Admin</span></a></li>

            <li style="<?php if ($d['level'] == 2) {

                          echo $displaynone;

                        } ?>"><a target="_blank" href="../transaksi/reportdatatransaksi.php"><i class="fa fa-circle-o"></i> <span>Data Transaksi</span></a></li>

            <li style="<?php if ($d['level'] == 2) {

                          echo $displaynone;

                        } ?>"><a target="_blank" href="../datapustaka/reportdatapustaka.php"><i class="fa fa-circle-o"></i> <span>Data Pustaka</span></a></li>

            <li style="<?php if ($d['level'] == 2) {

                          echo $displaynone;

                        } ?>"><a target="_blank" href="../dataanggota/reportdataanggota.php"><i class="fa fa-circle-o"></i> <span>Data Anggota</span></a></li>

            <li style="<?php if ($d['level'] == 2) {

                          echo $displaynone;

                        } ?>"><a target="_blank" href="../datapengunjung/reportdatapengunjung.php"><i class="fa fa-circle-o"></i> <span>Data Pengunjung</span></a></li>

          </ul>

        </section>

        <!-- /.sidebar -->

      </aside>



      <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

          <h1>

            Transaksi

          </h1>

          <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>

            <li class="active">Transaksi</li>

          </ol>

        </section>


        <div class="col-xs-12">




</div>

        <section class="content">

        <div class="row">
  <!-- /.col -->
  <div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Manajemen Transaksi</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

        <!-- Dropdown menu for selecting table -->
        <form method="GET" action="">
            <label for="table">Pilih Tabel:</label>
            <select name="table" id="table" onchange="this.form.submit()">
                <option value="peminjaman" <?php echo isset($_GET['table']) && $_GET['table'] == 'peminjaman' ? 'selected' : ''; ?>>Transaksi Peminjaman</option>
                <option value="pengembalian" <?php echo isset($_GET['table']) && $_GET['table'] == 'pengembalian' ? 'selected' : ''; ?>>Transaksi Pengembalian</option>
                <option value="denda" <?php echo isset($_GET['table']) && $_GET['table'] == 'denda' ? 'selected' : ''; ?>>Transaksi Denda</option>
            </select>
        </form>

        <!-- Form for filtering by year -->
        <form method="GET" action="">
            <input type="hidden" name="table" value="<?php echo isset($_GET['table']) ? $_GET['table'] : 'peminjaman'; ?>">
            <label for="year">Filter by Year:</label>
            <select name="year" id="year" onchange="this.form.submit()">
                <option value="">All Years</option>
                <?php
                // Generate a list of years from the data
                $years = mysqli_query($koneksi, "SELECT DISTINCT YEAR(tgl_pinjam) as year FROM tabel_transaksi ORDER BY year DESC");
                while ($y = mysqli_fetch_assoc($years)) {
                    $selected = ($y['year'] == (isset($_GET['year']) ? $_GET['year'] : '')) ? 'selected' : '';
                    echo '<option value="' . $y['year'] . '" ' . $selected . '>' . $y['year'] . '</option>';
                }
                ?>
            </select>
        </form>

        <!-- Display table based on selected dropdown -->
        <?php
        $selectedTable = isset($_GET['table']) ? $_GET['table'] : 'peminjaman';
        $selectedYear = isset($_GET['year']) ? $_GET['year'] : '';

        if ($selectedTable == 'peminjaman') {
            // Tabel Peminjaman
            echo '<h3 class="box-title">Transaksi Peminjaman</h3>';
            $query = "SELECT * FROM tabel_transaksi";
            if ($selectedYear) {
                $query .= " WHERE YEAR(tgl_pinjam) = $selectedYear";
            }
            $query .= " ORDER BY id_peminjam DESC;";
        } elseif ($selectedTable == 'pengembalian') {
            // Tabel Pengembalian
            echo '<h3 class="box-title">Transaksi Pengembalian</h3>';
            $query = "SELECT * FROM tabel_transaksi WHERE tgl_kembali IS NOT NULL AND YEAR(tgl_kembali) > 1970 AND YEAR(tgl_kembali) <= 2025";
            if ($selectedYear) {
                $query .= " AND YEAR(tgl_pinjam) = $selectedYear";
            }
            $query .= " ORDER BY id_peminjam DESC;";
        } elseif ($selectedTable == 'denda') {
            // Tabel Denda
            echo '<h3 class="box-title">Transaksi Denda</h3>';
            $query = "SELECT * FROM tabel_transaksi WHERE tgl_kembali IS NULL";
            if ($selectedYear) {
                $query .= " AND YEAR(tgl_pinjam) = $selectedYear";
            }
            $query .= " ORDER BY id_peminjam DESC;";
        }

        $transaksi = mysqli_query($koneksi, $query);

        // Displaying the selected table
        echo '<table id="example1" class="table table-bordered table-striped">';
        echo '<thead><tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Instansi</th>
                <th>No. HP</th>
                <th>Judul</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>No. Buku</th>
            </tr></thead>';
        echo '<tbody>';

        while ($t = mysqli_fetch_array($transaksi)) {
            echo '<tr>';
            echo '<td>' . $t['id_peminjam'] . '</td>';
            echo '<td>' . $t['nama_peminjam'] . '</td>';
            echo '<td>' . $t['instansi'] . '</td>';
            echo '<td>' . $t['no_hp'] . '</td>';
            echo '<td>' . $t['judul'] . '</td>';
            echo '<td>' . date("d/m/y", strtotime($t['tgl_pinjam'])) . '</td>';
            echo '<td>' . ($t['tgl_kembali'] ? date("d/m/y", strtotime($t['tgl_kembali'])) : '-') . '</td>';
            echo '<td>' . $t['no_buku'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';

        // Counting and displaying the total number of records
        $totalRecords = mysqli_num_rows($transaksi);
        echo '<p>Total Records: ' . $totalRecords . '</p>';
        ?>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
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

          <
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

          <!-- Stats tab content -->

          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>

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

    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->

    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- DataTables -->

    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <!-- SlimScroll -->

    <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <!-- FastClick -->

    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>

    <!-- AdminLTE App -->

    <script src="../../dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->

    <script src="../../dist/js/demo.js"></script>

    <!-- page script -->

    <script>

      $(function() {

        $('#example1').DataTable()

        $('#example2').DataTable()

        $('#example3').DataTable({

          'paging': true,

          'lengthChange': false,

          'searching': false,

          'ordering': true,

          'info': true,

          'autoWidth': false

        })

      })

    </script>

  </body>



  </html>

<?php

}

?>