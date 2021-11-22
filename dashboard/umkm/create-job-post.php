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
  <!-- Jquery -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <script src="../../js/tinymce/tinymce.min.js"></script>
  

  <script>tinymce.init({ 
    selector:'#description',
    entity_encoding: "raw",
    height: 400,
    menubar: true, 
    forced_root_block: "",
    force_br_newlines: true,
    force_p_newlines: false,
    plugins: [
      'advlist autolink lists link charmap preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media contextmenu paste code codesample'
    ],
    toolbar1: 
    'undo redo | fontselect fontsizeselect | bold underline italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
    toolbar2:
    'blockquote | hr removeformat subscript superscript | link ',
    branding: false
    });</script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
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
                <h3 class="box-title">Selamat Datang, <br><b><?php echo $_SESSION['name']; ?></b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="list-company.php"><i class="fa fa-industry"></i> UMKM Saya</a></li>
                  <li class="active"><a href="create-job-post.php"><i class="fa fa-paper-plane"></i> Buat Lowongan</a></li>
                  <li><a href="my-job-post.php"><i class="fa fa-tasks"></i> Lowongan Saya</a></li>
                  <li><a href="job-applications.php"><i class="fa fa-users"></i> Pelamar di UMKM Saya</a></li>
                  <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Kotak Pesan</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Pengaturan</a></li>
                  <li><a href="resume-database.php"><i class="fa fa-user"></i> Data Pelamar</a></li>
                  <li><a href="create-article.php"><i class="fa fa-comment-o "></i> Buat Artikel</a></li>
                  <li><a href="list-article.php"><i class="fa fa-newspaper-o"></i> Daftar Artikel</a></li>
                  <li><a href="../../landingpage/logout.php"><i class="fa fa-arrow-circle-o-right"></i> Keluar</a></li></ul>
              </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
            <h2><i>Buat Lowongan Baru</i></h2>
            <div class="row">
              <form method="post" action="addpost.php">
                <div class="col-md-12">
                  <div class="form-group">
                    <select class="form-control  input-lg" id="company" name="company" required>
                    <option selected="" value="">Pilih UMKM</option>
                    <?php
                      $sql="SELECT * FROM company WHERE id_pengusaha ='$_SESSION[id_pengusaha]' AND active = 1";
                      $result=$conn->query($sql);

                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                          echo "<option value='".$row['id_company']."' data-id='".$row['id_company']."'>".$row['companyname']."</option>";
                        }
                      }
                    ?>
                      
                    </select>
                  </div>
                </div>
                <div class="col-md-12 latest-job ">
                  <div class="form-group">
                    <input class="form-control input-lg" type="text" id="jobtitle" name="jobtitle" placeholder="Judul Lowongan">
                  </div>
                  <div class="form-group">
                    <textarea class ="form-control input-lg" id="description" name="description" placeholder="Deskripsi Lowongan"></textarea>
                  </div>

                  
                  <!-- Gaji kanan kiri -->
                  <label>Gaji Pokok </label>
                  <div class="contain">
                    <div class="col-md-6 latest-job">
                      <div class="form-group">
                        <input type="number" class="form-control  input-lg" id="minimumsalary" min="1000" autocomplete="off" name="minimumsalary" placeholder="Gaji Minimum" required="">
                      </div>
                    </div>
                    <div class="col-md-6 latest-job">
                    <label hidden>Jangka Waktu Kerja</label>
                      <div class="form-group">
                        <input type="number" class="form-control  input-lg" id="maximumsalary" name="maximumsalary" placeholder="Gaji Maksimum" required="">
                      </div>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label>Pengalaman Kerja</label>
                    <input type="number" class="form-control  input-lg" id="experience" autocomplete="off" name="experience" placeholder="Pengalaman kerja (Tahun) " required="">
                  </div>
                  <div class="form-group">
                    <label>Kualifikasi</label>
                    <input type="text" class="form-control  input-lg" id="qualification" name="qualification" placeholder="Keahlian Yang Dibutuhkan " required="">
                  </div>
                  <!-- <div class="form-group">
                        <label>Jangka Waktu Kerja</label>
                        <select class="form-control input-lg" id="bersedia_waktu" name="bersedia_waktu" required>
                          <option value="">Waktu Kerja</option>
                          <option value="Jangka Pendek/Kontrak">Jangka Pendek/Kontrak</option>
                          <option value="Jangka Panjang/Tetap">Jangka Panjang/Tetap</option>
                        </select>
                      </div> -->
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
