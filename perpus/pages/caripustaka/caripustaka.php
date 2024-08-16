<!DOCTYPE html>

<?php
include '../../koneksi.php';
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cari Pustaka</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="icon" href="../../dist/img/favicon-16x16.png" type="image/ico">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="" class="navbar-brand"><b>Perpustakaan JDIH Kementrian Hukum dan HAM Kalimantan Selatan <a href='' title='' target='_blank'></a></b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Cari Pustaka
          </h1>
          <ol class="breadcrumb">
            <li class="active"><i class="fa fa-search"></i> Cari Pustaka</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- /.row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                  <div class="col-xs-12" style="margin: 10px 0 0 0;">
                    <div class="box-tools">
                      <div class="input-group input-group-lg" style="width: 50%; margin: 0 auto;">
                        <input type="text" id="myInput" onkeyup="filterTable()" name="table_search" class="form-control pull-right" placeholder="Cari pustaka">
                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                      <div class="input-group input-group-lg" style="width: 50%; margin: 10px auto;">
                        <div class="row">
                          <div class="col-xs-4">
                            <select id="categoryFilter" class="form-control" onchange="filterTable()">
                              <option value="">Semua Kategori</option>
                              <?php
                              $kategori = mysqli_query($koneksi, "SELECT DISTINCT kategori FROM t_datapustaka ORDER BY kategori ASC");
                              while ($k = mysqli_fetch_array($kategori)) {
                                echo "<option value='{$k['kategori']}'>{$k['kategori']}</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col-xs-4">
                            <select id="yearStartFilter" class="form-control" onchange="filterTable()">
                              <option value="">Tahun Mulai</option>
                              <?php
                              $tahunStart = mysqli_query($koneksi, "SELECT DISTINCT tahun FROM t_datapustaka ORDER BY tahun ASC");
                              while ($t = mysqli_fetch_array($tahunStart)) {
                                echo "<option value='{$t['tahun']}'>{$t['tahun']}</option>";
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col-xs-4">
                            <select id="yearEndFilter" class="form-control" onchange="filterTable()">
                              <option value="">Tahun Akhir</option>
                              <?php
                              $tahunEnd = mysqli_query($koneksi, "SELECT DISTINCT tahun FROM t_datapustaka ORDER BY tahun DESC");
                              while ($t = mysqli_fetch_array($tahunEnd)) {
                                echo "<option value='{$t['tahun']}'>{$t['tahun']}</option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th width="10px">#</th>
                        <th>Judul Pustaka</th>
                        <th>Kategori</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>ISBN</th>
                        <th>Klasifikasi</th>
                        <th>Ketersediaan</th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                      <?php
                      $nomor = 1;
                      $pustaka = mysqli_query($koneksi, "SELECT * FROM t_datapustaka");
                      while ($p = mysqli_fetch_array($pustaka)) {
                      ?>
                        <tr>
                          <td><?php echo $nomor; ?>.</td>
                          <td><?php echo $p['judul_dp']; ?></td>
                          <td><?php echo $p['kategori']; ?></td>
                          <td><?php echo $p['pengarang']; ?></td>
                          <td><?php echo $p['penerbit']; ?></td>
                          <td><?php echo $p['tahun']; ?></td>
                          <td><?php echo $p['isbn']; ?></td>
                          <td><?php echo $p['klasifikasi']; ?></td>
                          <td>
                            <?php
                            if ($p['jumlah'] == 0) {
                              $label = "danger"; // memeriksa ketersediaan apakah 0 
                              $pesan = "Kosong";
                            } else {
                              $label = "success";
                              $pesan = "Tersedia";
                            }
                            ?>
                            <span class="label label-<?php echo $label; ?>"><?php echo $pesan; ?></span>
                          </td>
                        </tr>
                      <?php
                        $nomor++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
        </div>
      </div>
      <!-- /.container -->
    </footer>
  </div>
  <!-- ./wrapper -->
  <!-- jQuery 3 -->
  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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
    function filterTable() {
      var input = $('#myInput').val().toLowerCase();
      var category = $('#categoryFilter').val();
      var yearStart = $('#yearStartFilter').val();
      var yearEnd = $('#yearEndFilter').val();
      
      $('#myTable tr').each(function () {
        var rowCategory = $(this).find("td:nth-child(3)").text().toLowerCase();
        var rowYear = parseInt($(this).find("td:nth-child(6)").text());

        var showRow = true;
        
        if (input.length > 0 && $(this).text().toLowerCase().indexOf(input) === -1) {
          showRow = false;
        }
        
        if (category.length > 0 && rowCategory.indexOf(category.toLowerCase()) === -1) {
          showRow = false;
        }
        
        if (yearStart.length > 0 && rowYear < parseInt(yearStart)) {
          showRow = false;
        }
        
        if (yearEnd.length > 0 && rowYear > parseInt(yearEnd)) {
          showRow = false;
        }

        $(this).toggle(showRow);
      });
    }
  </script>
</body>
</html>
