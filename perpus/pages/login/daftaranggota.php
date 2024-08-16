<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Tambah Anggota</title>

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

    <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

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


<section class="content">

<div class="row">

  <form class="form-horizontal" role="form" method="post" action="tambahanggota-proses.php">

    <div class="col-xs-12">

    </div>

    <div class="col-md-12">

      <!-- general form elements -->

      <div class="box box-primary">

        <div class="box-header with-border">

          <h3 class="box-title">Form Registrasi Anggota Perpustakaan JDIH Kantor Wilayah Kementrian Hukum dan HAM Kalimantan Selatan</h3>

        </div>

        <!-- /.box-header -->

        <div class="box-body">

          <div class="col-xs-12">

            <div class="form-group">

              <label for="" class="col-sm-2 control-label">Nama Anggota</label>

              <div class="col-xs-10">

                <input type="text" class="form-control" id="namaanggota" name="namaanggota" required>

              </div>

            </div>

            <div class="form-group">

              <label for="" class="col-sm-2 control-label">Tempat Lahir</label>

              <div class="col-xs-3">

                <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" required>

              </div>

            </div>

            <div class="form-group">

              <label for="" class="col-sm-2 control-label">Tanggal Lahir</label>

              <div class="col-xs-3">

                <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" required>

              </div>

            </div>

            <div class="form-group">

              <label for="" class="col-sm-2 control-label">Jenis Kelamin</label>

              <div class="col-xs-2">

                <select class="form-control" name="jeniskelamin" required>

                  <option value="">Pilih Kategori</option>

                  <option>Laki-laki</option>

                  <option>Perempuan</option>

                </select>

              </div>

            </div>

            <div class="form-group">

              <label for="" class="col-sm-2 control-label">Telepon</label>

              <div class="col-xs-2">

                <input type="text" class="form-control" id="telepon" name="telepon" onkeypress="isInputNumber(event)" maxlength="13" required>

              </div>

            </div>

            <div class="form-group">

              <label for="" class="col-sm-2 control-label">NIK</label>

              <div class="col-xs-3">

                <input type="text" class="form-control" id="nik" name="nik" onkeypress="isInputNumber(event)" maxlength="16" required>

              </div>

            </div>

            <div class="form-group">

              <label for="" class="col-sm-2 control-label">Instansi</label>

              <div class="col-xs-4">

                <input type="text" class="form-control" id="instansi" name="instansi" required>

              </div>

            </div>

            <div class="form-group">

              <label for="" class="col-sm-2 control-label">Alamat</label>

              <div class="col-xs-6">

                <textarea class="form-control" rows="3" name="alamat" required></textarea>

              </div>

            </div>

          </div>

        </div>

        <!-- /.box-body -->

      </div>

      <!-- /.box -->



    </div>

    <div class="col-xs-12 text-center">

      <a href="login.php" class="btn btn-default" style="margin-right: 20px;">Kembali </a>

      <button type="submit" class="btn btn-primary">Selesai</button>

    </div>

  </form>

</div>

<!-- /.row -->

</section>