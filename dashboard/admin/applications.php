<?php

session_start();

if(empty($_POST["status"])){
  $_POST["status"] = null;
}
$idKecamatan = $_POST["status"];

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
                <li ><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Lowongan Aktif</a></li>
                  <li  class="active"><a href="applications.php"><i class="fa fa-address-card-o"></i> Data Pencaker</a></li>
                  <li><a href="companies.php"><i class="fa fa-building"></i> UMKM</a></li>
                  <li><a href="../../landingpage/logout.php"><i class="fa fa-arrow-circle-o-right"></i> Keluar</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">

          <div class="pull-right">
            <a href="dashboard.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
          </div>  
          <h3>Data Pencaker</h3>
            
            <div class="row margin-top-20">

            <div>
              <div class="col-md-6 latest-job ">
              <form action="applications.php" method="POST" enctype="multipart/form-data">
                <div class="form-group" style="margin-bottom: 30px;">
                <label>Pencarian per Kecamatan</label>
                  <select class="form-control input-lg" id="status" name="status">
                    <option value="">Semua Kecamatan</option>
                    <option value="Ampelgading">Ampelgading</option>
                    <option value="Bantur">Bantur</option>
                    <option value="Bululawang">Bululawang</option>
                    <option value="Dampit">Dampit</option>
                    <option value="Dau">Dau</option>
                    <option value="Donomulyo">Donomulyo</option>
                    <option value="Gedangan">Gedangan</option>
                    <option value="Gondanglegi">Gondanglegi</option>
                    <option value="Jabung">Jabung</option>
                    <option value="Kalipare">Kalipare</option>
                    <option value="Karangploso">Karangploso</option>
                    <option value="Kasembon">Kasembon</option>
                    <option value="Kepanjen">Kepanjen</option>
                    <option value="Kromengan">Kromengan</option>
                    <option value="Lawang">Lawang</option>
                    <option value="Ngajum">Ngajum</option>
                    <option value="Ngantang">Ngantang</option>
                    <option value="Pagak">Pagak</option>
                    <option value="Pagelaran">Pagelaran</option>
                    <option value="Pakis">Pakis</option>
                    <option value="Pakisaji">Pakisaji</option>
                    <option value="Poncokusumo">Poncokusumo</option>
                    <option value="Pujon">Pujon</option>
                    <option value="Singosari">Singosari</option>
                    <option value="Sumbermanjing Wetan">Sumbermanjing Wetan</option>
                    <option value="Sumberpucung">Sumberpucung</option>
                    <option value="Tirtoyudo">Tajinan</option>
                    <option value="Tumpang">Tumpang</option>
                    <option value="Turen">Turen</option>
                    <option value="Wagir">Wagir</option>
                    <option value="Wajak">Wajak</option>
                    <option value="Wonosari">Wonosari</option>
                  </select>
                </div>
              </div>

              <div class="col-md-2 latest-job ">
                <div class="form-group" style="margin-top: 30px;">
                  <button class="btn btn-flat btn-success" type="submit">Cari</button>
                </div>
              </div>
            </div>
              
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table id="example2" class="table table-hover">
                    <thead>
                      <th>Nama Pencaker</th>
                      <th>Kecamatan</th>
                      <th>Desa</th>
                      <th>Unduh CV/Resume</th>
                      <th>Status</th>
                      <th>Hapus</th>
                    </thead>
                    <tbody>
                      <?php

                        if(!empty($idKecamatan)){
                          // $sql = "SELECT pencaker.id, pencaker.tgl_pendaftaran, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user FROM users JOIN pencaker ON users.id_user=pencaker.id_user WHERE pencaker.kecamatan='$idKecamatan'";
                          // $result = $conn->query($sql);

                          // if(!isset($_GET['status'])){
                            $sql = "SELECT pencaker.id, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user, users.resume FROM users JOIN pencaker ON users.id_user=pencaker.id_user WHERE pencaker.kecamatan='$idKecamatan'AND users.active NOT IN (3) ";
                            $result = $conn->query($sql);
                          // } else if ($_GET['status']==1){
                          //   $sql = "SELECT pencaker.id, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user, users.resume FROM users JOIN pencaker ON users.id_user=pencaker.id_user WHERE users.active = 1 AND pencaker.kecamatan='$idKecamatan'";
                          //   $result = $conn->query($sql);
                          // } else if ($_GET['status']==0){
                          //   $sql = "SELECT pencaker.id, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user, users.resume FROM users JOIN pencaker ON users.id_user=pencaker.id_user WHERE users.active = 0 AND pencaker.kecamatan='$idKecamatan'";
                          //   $result = $conn->query($sql);
                          // } else if ($_GET['status']==2){
                          //   $sql = "SELECT pencaker.id, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user, users.resume FROM users JOIN pencaker ON users.id_user=pencaker.id_user WHERE users.active = 2 AND pencaker.kecamatan='$idKecamatan'";
                          //   $result = $conn->query($sql);
                          // }
                        }else{
                          // $sql = "SELECT pencaker.id, pencaker.tgl_pendaftaran, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user FROM users JOIN pencaker ON users.id_user=pencaker.id_user";
                          // $result = $conn->query($sql);

                          // if(!isset($_GET['status'])){
                            $sql = "SELECT pencaker.id, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user, users.resume FROM users JOIN pencaker ON users.id_user=pencaker.id_user WHERE users.active NOT IN (3) ";
                            $result = $conn->query($sql);
                          // } else if ($_GET['status']==1){
                          //   $sql = "SELECT pencaker.id, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user, users.resume FROM users JOIN pencaker ON users.id_user=pencaker.id_user WHERE users.active = 1";
                          //   $result = $conn->query($sql);
                          // } else if ($_GET['status']==0){
                          //   $sql = "SELECT pencaker.id, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user, users.resume FROM users JOIN pencaker ON users.id_user=pencaker.id_user WHERE users.active = 0";
                          //   $result = $conn->query($sql);
                          // } else if ($_GET['status']==2){
                          //   $sql = "SELECT pencaker.id, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user, users.resume FROM users JOIN pencaker ON users.id_user=pencaker.id_user WHERE users.active = 2";
                          //   $result = $conn->query($sql);
                          // }
                        }

                        // if(!isset($_GET['status'])){
                        //   $sql = "SELECT pencaker.id, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user, users.resume FROM users JOIN pencaker ON users.id_user=pencaker.id_user ";
                        //   $result = $conn->query($sql);
                        // } else if ($_GET['status']==1){
                        //   $sql = "SELECT pencaker.id, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user, users.resume FROM users JOIN pencaker ON users.id_user=pencaker.id_user WHERE users.active = 1";
                        //   $result = $conn->query($sql);
                        // } else if ($_GET['status']==0){
                        //   $sql = "SELECT pencaker.id, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user, users.resume FROM users JOIN pencaker ON users.id_user=pencaker.id_user WHERE users.active = 0";
                        //   $result = $conn->query($sql);
                        // } else if ($_GET['status']==2){
                        //   $sql = "SELECT pencaker.id, pencaker.nama, pencaker.kecamatan, pencaker.desa, users.active, users.id_user, users.resume FROM users JOIN pencaker ON users.id_user=pencaker.id_user WHERE users.active = 2";
                        //   $result = $conn->query($sql);
                        // }

                        if($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) 
                        {     
                          $images = $row['resume'];
                          // die($images);
                      ?>
                      <tr>
                        <td><a href="view-datapencaker.php?id=<?php echo $row['id'];?>"><?php echo $row['nama']; ?></a></td>
                        <td><?php echo $row['kecamatan']; ?></td>
                        <td><?php echo $row['desa']; ?></td>
                        <?php if($row['resume'] != '') { 
                         echo '<td><a href="download.php?file='.urlencode($images).'"><i class="fa fa-file-pdf-o">&nbsp&nbsp<span class="label label-success">Unduh</span> </i></a></td>';
                        ?>
                        <?php } else { ?>
                        <td>No Resume Uploaded</td>
                        <?php } ?>
                        <td>
                        <?php
                          if($row['active'] == '1') {
                            echo '<strong>Terverifikasi</strong>';
                            // echo "Activated";
                          } else if($row['active'] == '2') {
                            ?>
                           <a href="approve-user.php?id=<?php echo $row['id_user']; ?>"><span class="label label-primary">VERIFIKASI</span></a>&nbsp<a href="reject-user.php?id=<?php echo $row['id_user']; ?>"><span class="label label-danger">TOLAK</span></a> 
                            <?php
                          } else if ($row['active'] == '3') {
                            ?>
                              <a href="approve-user.php?id=<?php echo $row['id_user']; ?>">Reactivate</a>
                            <?php
                          } else if($row['active'] == '0') {
                            echo 'Ditolak';
                          }
                        ?>                          
                        </td>
                        <td><a href="delete-user.php?id=<?php echo $row['id']; ?>"><span class="label label-warning">Hapus</span></a></td>
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

    <div class="modal modal-success fade" id="modal-success">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Candidate Profile</h4>
          </div>
          <div class="modal-body">
              <h3><b>Applied On</b></h3>
              <p>24/04/2017</p>
              <br>
              <h3><b>Email</b></h3>
              <p>test@test.com</p>
              <br>
              <h3><b>Phone</b></h3>
              <p>44907512447</p>
              <br>
              <h3><b>Website</b></h3>
              <p>learningfromscratch.online</p>
              <br>
              <h3><b>Application Message</b></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    

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
