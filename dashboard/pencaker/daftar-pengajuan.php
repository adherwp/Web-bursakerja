<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if(empty($_SESSION['id_user'])) {
  header("Location: ../../index.php");
  exit();
}
$id_user = $_SESSION['id_user'];
// echo($id_user);
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
  <link rel="stylesheet" href="../../css/style5.css">
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
          <li>
            <a href="../../landingpage/jobs.php">Lowongan</a>
          </li>       
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
                  <li class="active"><a href="daftar-pengajuan.php"><i class="fa fa-user"></i> Daftar Pengajuan</a></li>
                  <li><a href="index.php"><i class="fa fa-address-card-o"></i> Lamaran Saya</a></li>
                  <li><a href="mailbox.php"><i class="fa fa-envelope"></i> Kotak Pesan</a></li>
                  <li><a href="settings.php"><i class="fa fa-gear"></i> Pengaturan</a></li>
                  <li><a href="../../landingpage/jobs.php"><i class="fa fa-list-ul"></i> Lowongan</a></li>
                  <li><a href="../../landingpage/logout.php"><i class="fa fa-arrow-circle-o-right"></i> Keluar</a></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- <p><a href="register-kartukuning.php">hai</p> -->
          <!-- <div class="col-md-8">
            <div class="col-md-12 bg-white padding-2">

            </div>
          </div> -->
          <div class="col-md-8">
            <button type="submit" class="btn btn-primary" id="btnNew" onclick="ContentPage(<?php echo $id_user;?>)">+ Buat Baru</button>
            <?php
              $btnSql = "SELECT MAX(tgl_pendaftaran) AS max_date FROM pencaker WHERE id_user = '$_SESSION[id_user]'";
              $btnResult = mysqli_query($conn, $btnSql);
              $btnRow = mysqli_fetch_array($btnResult);
              $startdate = $btnRow['max_date'];
              $expire = strtotime($startdate.' + 730 days');
              $today = strtotime("today midnight");
              // $today = strtotime("22-03-2023");
              $time = date("d/m/Y", $today);
              // $time1 = date("d/m/Y", $expire);
              // die($startdate.', '.$time1.', '. $time);
              if ($today >= $expire) {
                echo "<script> document.getElementById('btnNew').disabled = false; </script>";
              } else {
                echo "<script> document.getElementById('btnNew').disabled = true; </script>";
              }
              
              ?>
          </div>
          
          <div class="col-md-8" >
          <?php
            
             $sql = "SELECT * FROM pencaker WHERE id_user = '$_SESSION[id_user]' ORDER BY tgl_pendaftaran DESC";
            //  die($sql);
             $result = $conn->query($sql);
            
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $id_pencaker = $row["id"];
                  $mulai = $row['tgl_pendaftaran'];
                  $kadaluarsa = strtotime($mulai.' + 730 days');
                  $hariIni = strtotime("today");
                  $tgl_kadaluarsa = date("d-m-Y", $kadaluarsa);
                  // $cok = date("d/m/Y", $hariIni);
                  // echo('hai '.$cok.', '.$tgl_kadaluarsa.', '.$mulai.'<br>');

                  if ($hariIni >= $kadaluarsa) {
          ?>
                    <div class="col-md-5 bg-white card foreground"  onclick="detailPage(<?php echo $id_pencaker?>)">
                      <div class="col-md-12"> 
                        <span style="color:red; float:right; margin">Kadaluarsa</span>
                      </div>
                      <h3 id="no_pendaftaran">
                      <?php 

                        $sqlKec = "SELECT no_pendaftaran, tgl_pendaftaran, kecamatan FROM pencaker WHERE id = '$id_pencaker'";
                        $resultKec = mysqli_query($conn, $sqlKec);
                        $rowKec = mysqli_fetch_array($resultKec);
                        $getKecamatan = $rowKec['kecamatan'];
                        $getNomer = $rowKec['no_pendaftaran'];
                        $format = date("d-m-Y", strtotime($rowKec['tgl_pendaftaran']));

                        $sqlKecamatan = "SELECT kode_kec FROM kecamatan WHERE name = '$getKecamatan'";
                        $resultKecamatan = mysqli_query($conn, $sqlKecamatan);
                        $rowKecamatan = mysqli_fetch_array($resultKecamatan);
                        $idKecamatan = $rowKecamatan['kode_kec'];

                        echo $getNomer." / ".$format." / ".$idKecamatan;
                      ?>
                      </h3>
                      <h5 id="tgl_pendaftaran"><?php echo 'tgl berakhir : '.$tgl_kadaluarsa ?></h5>
                    </div>
          <?php
                  } else{
                  ?>
                <div class="col-md-5 bg-white card"  onclick="detailPage(<?php echo $id_pencaker?>)"> 
                <h3 id="no_pendaftaran">
                      <?php 

                        $sqlKec = "SELECT no_pendaftaran, tgl_pendaftaran, kecamatan FROM pencaker WHERE id = '$id_pencaker'";
                        $resultKec = mysqli_query($conn, $sqlKec);
                        $rowKec = mysqli_fetch_array($resultKec);
                        $getKecamatan = $rowKec['kecamatan'];
                        $getNomer = $rowKec['no_pendaftaran'];
                        $format = date("d-m-Y", strtotime($rowKec['tgl_pendaftaran']));

                        $sqlKecamatan = "SELECT kode_kec FROM kecamatan WHERE name = '$getKecamatan'";
                        $resultKecamatan = mysqli_query($conn, $sqlKecamatan);
                        $rowKecamatan = mysqli_fetch_array($resultKecamatan);
                        $idKecamatan = $rowKecamatan['kode_kec'];

                        echo $getNomer." / ".$format." / ".$idKecamatan;
                      ?>
                      </h3>
                  <h5 id="tgl_pendaftaran"><?php echo 'tgl berakhir : '.$tgl_kadaluarsa ?></h5>
                </div>
          <?php
                  }
                }
              }
              ?>
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

<script>
function ContentPage(id){
    location.href = "register-kartukuning.php?id="+id;
}

function detailPage(id){
    location.href = "detail-pengajuan.php?id="+id;
}
</script>
<!-- jQuery 3 -->
<script src="../../js/ajaxlibsjquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../js/ajaxlibs-twitterbootsrap.js"></script>
<!-- AdminLTE App -->
<script src="../../js/adminlte.min.js"></script>
</body>
</html>
