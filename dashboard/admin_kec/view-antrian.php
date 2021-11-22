<?php

//To Handle Session Variables on This Page
session_start();

$nama_kecamatan = $_GET['name'];

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

  <div class="col-md-12 bg-white">
  <table id="example2" class="table table-hover">
                    <thead>
                      <tr>
                      <th>Nama</th>
                      <th><div align="center">Tgl Pengajuan</div></th>
                      <th><div align="center">Kecamatan</div></th>
                      <th><div align="center">Desa<div></th>
                      <th><div align="center">No. Antrian<div></th>
                      </tr>
                         
                      
                    </thead>
                    <tbody>
                      <?php
                       $tanggalAntri = strtotime("today");
                       $timeAntri = date("Y-m-d", $tanggalAntri);
                      $sql = "SELECT * FROM pencaker WHERE kecamatan = '$nama_kecamatan' AND tgl_pendaftaran = '$timeAntri' ";
                       $result = $conn->query($sql);
                      //$row = mysql_fetch_assoc($sql);
                      

                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) 
                        {
                    

                      ?>
                      
                      <tr>
                        <td><?php echo $row['nama']; ?></td>
                        <td><div align="center"><?php echo $row['tgl_pendaftaran']; ?><div></td>
                        <td><div align="center"><?php echo $row['kecamatan']; ?><div></td>
                        <td><div align="center"><?php echo $row['desa']; ?></div></td>
                        <td><div align="center"><?php echo $row['no_antrian']; ?></div></td>
                      </tr>

                      <?php

                        }
                      }
                      ?>
                      

                      <script>
                        
                      </script>

                    </tbody>                    
                  </table>
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
