<?php
// Koneksi ke database
$host = "localhost"; // Nama host
$user = "root"; // Nama user
$pass = ""; // Password
$db = "perpus"; // Nama database

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hapus data sebelumnya di tabel t_denda untuk menghindari duplikasi
$sql_clear_table = "TRUNCATE TABLE t_denda";
$conn->query($sql_clear_table);

// Ambil data dari t_peminjaman dan t_pengembalian, lalu masukkan ke t_denda
$sql_insert_data = "INSERT INTO t_denda (nama_anggota, judul_dp, tgl_pjm, tgl_kmbl, ktrlmbtn, pkrjaan)
        SELECT a.nama_anggota, d.judul_dp, p.tgl_pjm, g.tgl_kmbl, DATEDIFF(g.tgl_kmbl, p.tgl_pjm) AS ktrlmbtn, a.pkrjaan
        FROM t_peminjaman p
        JOIN t_pengembalian g ON p.id_pmnjmn = g.id_pmnjmn
        JOIN t_dataanggota a ON p.id_anggota = a.id_anggota
        JOIN t_datapustaka d ON p.id_dp = d.id_dp
        WHERE DATEDIFF(g.tgl_kmbl, p.tgl_pjm) > 0";

if ($conn->query($sql_insert_data) === TRUE) {
    echo "";
} else {
    echo "Error inserting data: " . $conn->error . "<br>";
}

// Ambil data dari tabel t_denda
$sql_select_data = "SELECT * FROM t_denda";
$result = $conn->query($sql_select_data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tabel Denda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
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
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <link rel="icon" href="../../dist/img/kumham.png" type="image/ico">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition layout-boxed skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="../../index.php" class="logo">
                <span class="logo-lg"><b>KEMENKUMHAM</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../../dist/img/kumham.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $d['nama_pengguna']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="../../dist/img/kumham.png" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo $d['nama_pengguna']; ?>
                                    </p>
                                </li>
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
        
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../../dist/img/kumham.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $d['nama_pengguna']; ?></p>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU</li>
                    <li>
                        <a href="../../index.php">
                            <i class="fa fa-home"></i> <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="../transaksi/transaksi.php">
                            <i class="fa fa-exchange"></i> <span>Transaksi</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="../transaksi/tabel_denda.php">
                            <i class="fa fa-money"></i> <span>Tabel Denda</span>
                        </a>
                    </li>
                    <li>
                        <a href="../datapustaka/datapustaka.php">
                            <i class="fa fa-book"></i> <span>Data Pustaka</span>
                        </a>
                    </li>
                    <li >
                        <a href="../dataanggota/dataanggota.php">
                            <i class="fa fa-users"></i> <span>Data Anggota</span>
                        </a>
                    </li>
                    <li>
                        <a href="../dataadmin/dataadmin.php">
                            <i class="fa fa-user"></i> <span>Data Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="../datapengunjung/datapengunjung.php">
                            <i class="fa fa-user-secret"></i> <span>Data Pengunjung</span>
                        </a>
                    </li>
                    <li>
                        <a href="../pengaturanakun/pengaturanakun.php">
                            <i class="fa fa-gear"></i> <span>Pengaturan Akun</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>Tabel Denda</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
                    <li class="active">Tabel Denda</li>
                </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Tabel Denda</h3>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Denda</th>
                                            <th>Nama Anggota</th>
                                            <th>Instansi</th>
                                            <th>Judul DP</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Keterlambatan (Hari)</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['id_denda'] . "</td>";
                                                echo "<td>" . $row['nama_anggota'] . "</td>";
                                                echo "<td>" . $row['pkrjaan'] . "</td>";
                                                echo "<td>" . $row['judul_dp'] . "</td>";
                                                echo "<td>" . $row['tgl_pjm'] . "</td>";
                                                echo "<td>" . $row['tgl_kmbl'] . "</td>";
                                                echo "<td>" . $row['ktrlmbtn'] . "</td>";
                                                
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <!-- Optional content -->
            </div>
            <strong>&copy; 2024 <a href="#">Perpustakaan</a>.</strong> All rights reserved.
        </footer>
    </div>

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
    <!-- Page script -->
    <script>
      $(function () {
        $('#example1').DataTable()
      })
    </script>
</body>
</html>

<?php
$conn->close();
?>
