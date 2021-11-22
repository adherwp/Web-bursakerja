<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
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
  <!-- DataTables -->
  <link rel="stylesheet" href="../../css/style4.css">
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
              <h3 class="box-title">Selamat Datang  <b> Admin</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Lowongan Aktif</a></li>
                  <li><a href="applications.php"><i class="fa fa-address-card-o"></i> Data Pencaker</a></li>
                  <li class="active"><a href="companies.php"><i class="fa fa-building"></i> UMKM</a></li>
                  <li><a href="../../landingpage/logout.php"><i class="fa fa-arrow-circle-o-right"></i> Keluar</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">
          <div class="pull-right">
              <a href="dashboard.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>
            <h3>Data UMKM</h3>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Nama UMKM</th>
                      <th>Nama Pemilik</th>
                      <th>Email</th>
                      <th>Nomor Telpon</th>
                      <th>Kecamatan</th>
                      <th>Kelurahan/Desa</th>
                      <th>Alamat</th>
                      <th>Status</th>
                      <th>Hapus</th>
                    </thead>
                    <tbody>
                      <?php
                      if(!isset($_GET['status'])){
                        $sql = "SELECT company.*, pengusaha.nama FROM company JOIN pengusaha ON pengusaha.id_pengusaha = company.id_pengusaha";
                      } else if ($_GET['status']==1) {
                        $sql = "SELECT company.*, pengusaha.nama FROM company JOIN pengusaha ON pengusaha.id_pengusaha = company.id_pengusaha WHERE company.active = 1";
                      } else if ($_GET['status']==2) {
                        $sql = "SELECT company.*, pengusaha.nama FROM company JOIN pengusaha ON pengusaha.id_pengusaha = company.id_pengusaha WHERE company.active = 2";
                      } else if ($_GET['status']==0) {
                        $sql = "SELECT company.*, pengusaha.nama FROM company JOIN pengusaha ON pengusaha.id_pengusaha = company.id_pengusaha WHERE company.active = 0";
                      }
                      
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td><?php echo $row['companyname']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contactno']; ?></td>
                        <td><?php echo $row['kecamatan']; ?></td>
                        <td><?php echo $row['kelurahan_desa']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td>
                        <?php
                          if($row['active'] == '1') {
                            echo "<strong>Terverifikasi</strong>";
                          } else if($row['active'] == '2') {
                            ?>
                            <a href="reject-company.php?id=<?php echo $row['id_company']; ?>"><span class="label label-primary">Tolak</span></a> <a href="approve-company.php?id=<?php echo $row['id_company']; ?>"><span class="label label-primary">Approve</span></a>
                            <?php
                          } else if ($row['active'] == '3') {
                            ?>
                              <a href="approve-company.php?id=<?php echo $row['id_company']; ?>">Reactivate</a>
                            <?php
                          } else if($row['active'] == '0') {
                            echo "Rejected";
                          }
                        ?>                          
                        </td>
                        <td><a href="delete-company.php?id=<?php echo $row['id_company']; ?>"><span class="label label-danger">Hapus</span></a></td>
                      </tr>  
                     <?php
                        }
                      }
                    ?>
                    </tbody>                    
                  </table>
                </div>
              </div>
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
<!-- DataTables -->
<script src="../../datatables.js"></script>
<!-- AdminLTE App -->
<script src="../../js/adminlte.min.js"></script>

<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>
</body>
</html>
