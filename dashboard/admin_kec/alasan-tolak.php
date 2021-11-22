<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../../landingpage/db.php");


  
// $sql1 = "SELECT * FROM buat_lowongan INNER JOIN company ON buat_lowongan.id_company=company.id_company WHERE id_jobpost='$_GET[id]'";
// $result1 = $conn->query($sql1);
// if($result1->num_rows > 0) 
// {
//   $row = $result1->fetch_assoc();
// }

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
    <a href="../../index.php" class="logo logo-bg">
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
      <?php
      $sql = "SELECT * FROM pencaker WHERE id_user = '$_GET[id]'";
      $result = $conn->query($sql);
      $idPencaker = $_GET['id'];

      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
      ?>
        <div class="row">          
          <div class="col-md-12 bg-white padding-2">
            <div class="pull-left">
              <h2><b><i><?php echo $row['nama'] ?></i></b></h2>
            </div>
            <div class="pull-right">
              <a href="list-pencaker.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>
          <div>
          
          <div class="col-md-12 bg-white">
            <hr>
          </div>      
          <div class="col-md-12 bg-white padding-2">
            <div class="col-md-3 text-center">
              <img src="../../img/profile.PNG" style="width: 200px; height: 210px;">
              <label><?php echo $row['nama'] ?></label>
              <p><?php echo $row['tanggal_lahir'] ?></p>
              <p><?php if($row['jenis_kelamin']== 'P'){echo "Perempuan";}else{echo "Laki Laki";} ?> . <?php echo $row['status']; ?> . <?php echo $row['agama'] ?> . <?php echo $row['kewarganegaraan'] ?></p>
              <p><?php echo $row['tinggi_badan']; ?> cm . <?php echo $row['berat_badan']; ?> kg</p>

              <!-- if else cacat -->
              <?php
                if($row['cacat_badan'] == "Tidak Ada"){
                  echo "<p>Tidak memiliki riwayat cacat fisik dan cacat lainnya</p>";
                }else{
                  echo "<p>Memiliki cacat : " . $row['cacat_lainnya'];
                }
              ?>

              <!-- if else penghasil -->
              <?php
                if($row['penghasil']=="Ya"){
                  echo "<p><i><b>Penghasil</i></b></p>";
                } else {
                  echo "<p><i><b>Bukan Penghasil</i></b></p>";
                } 
              ?>
              
            </div>
            
            <!-- Sisi Kanan -->
            <div class="col-md-9">
              <form class="col-md-12" method="post" id="tolakKuy" action="reject-user.php?id=<?php echo $idPencaker ?>" enctype="multipart/form-data">
                <!-- if else pendidikan -->
                <h4><b>Masukkan Alasan Penolakan</b></h4>
                <textarea name="komentar" id="komentar" cols="120" rows="10"></textarea>
                <button class="label label-danger"><h6>TOLAK PENCAKER</h6></button>
              </form>

              <div class="col-md-12 ">
                <!-- <div class="margin-top-20">
                  <a href="alasan-tolak.php?id=<?php echo $row['id_user']; ?>"><span class="label label-danger">TOLAK PENCAKER</span></a> 
                </div> -->

                                                    
                </div>
              </div>
            </div>
          </div>
          <?php   }
                } 
          ?>      
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
