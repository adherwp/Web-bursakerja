<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_pengusaha'])) {
  header("Location: ../../index.php");
  exit();
}

require_once("../../landingpage/db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bursa Kerja Malang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../css/style1.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../../css/custom.css">

  <script src="../../js/tinymce/tinymce.min.js"></script>

  <script>tinymce.init({ selector:'#deskripsi', height: 300 });</script>

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Bursa Kerja</b> Malang</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                   
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Selamat Datang <b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="list-company.php"><i class="fa fa-industry"></i> UMKM Saya</a></li>
                  <li><a href="create-job-post.php"><i class="fa fa-paper-plane"></i> Buat Lowongan</a></li>
                  <li><a href="my-job-post.php"><i class="fa fa-tasks"></i> Lowongan Saya</a></li>
                  <li><a href="job-applications.php"><i class="fa fa-users"></i> Pelamar di UMKM Saya</a></li>
                  <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Kotak Pesan</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Pengaturan</a></li>
                  <li><a href="resume-database.php"><i class="fa fa-user"></i> Data Pelamar</a></li>
                  <li class="active"><a href="create-article.php"><i class="fa fa-comment-o "></i> Buat Artikel</a></li>
                  <li><a href="list-article.php"><i class="fa fa-newspaper-o"></i> Daftar Artikel</a></li>
                  <li><a href="../../landingpage/logout.php"><i class="fa fa-arrow-circle-o-right"></i> Keluar</a></li></ul>
              </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Buat Artikel Baru</i></h2>
            <div class="row">
              <form method="post" action="add-article.php">
                <div class="col-md-12 latest-job ">
                  <div class="form-group">
                    <input class="form-control input-lg" type="text" id="judul_berita" name="judul_berita" placeholder="Judul Berita">
                  </div>
                  <div class="form-group">
                    <textarea class="form-control input-lg" id="deskripsi" name="deskripsi" placeholder="Deskripsi Berita"></textarea>
                  </div>
                  <div class="form-group">
                <label>Tambahkan Foto</label>
                <input type="file" id="pict_article" name="pict_article" class="form-control input-lg" required>
              </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-flat btn-success">Buat</button>
                  </div>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
    <div class="text-center">
    <strong>Bismillah &copy; KP <a href="http://kominfo.malangkab.go.id/">Kominfo Kabupaten Malang</a>.</strong> 2019

    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../js/ajaxlibsjquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../js/ajaxlibs-twitterbootsrap.js"></script>
<!-- AdminLTE App -->
<script src="../../js/adminlte.min.js"></script>
</body>
</html>