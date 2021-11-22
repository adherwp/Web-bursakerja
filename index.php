<?php
  //To Handle Session Variables on This Page
  session_start();
  //Including Database Connection From db.php file to avoid rewriting in all files
  require_once("landingpage/db.php");

  // $var = 'YWU1YmFkZGM4OGEyODBhNTBlNmJkMzNmMWM1YzI2NTY=';
  // $password = base64_decode($var);
  // die($password);
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/style2.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="css/custom.css">
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
      <!-- Header Navbar: style can be found in header.less -->
      <!-- <nav class="navbar navbar navbar-expand-md navbar-dark bg-dark fixed-top"> -->

      <nav class="navbar navbar-default" style="position: fixed; width: 100%; margin: 0px;" >
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><b>Bursa Kerja</b> Malang</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      <li>
              <a href="#home">Home</a>
            </li>
            <li>
              <a href="#lowongan">Lowongan</a>
            </li>
            
            <li>
              <a href="#statistics">Statistik</a>
            </li>
            <li>
              <a href="#candidates">Pencaker</a>
            </li>
           <li>
            <a href="#company">UMKM</a>
          </li>
          <li>
              <a href="#berita">Berita</a>
            </li>
          <li>
            <a href="#about">Tentang Kami</a>
          </li>
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
            <li>
              <a href="landingpage/login.php">Masuk</a>
            </li>
            <li>
              <a href="landingpage/sign-up.php">Daftar</a>
            </li>  
          
            <?php } else { 
              if(isset($_SESSION['id_user'])) { 
            ?>        
            
            <li>
              <a href="dashboard/pencaker/index.php">Dashboard</a>
            </li>
          <?php
            } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="dashboard/umkm/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="landingpage/logout.php">Logout</a>
          </li>
          <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

        <!-- Navbar Right Menu -->
      <!-- <nav class="navbar" style="position: fixed; width: 100%; padding-right:20%">
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li>
              <a href="#home">Home</a>
            </li>
            <li>
              <a href="#lowongan">Lowongan</a>
            </li>
            
            <li>
              <a href="#statistics">Statistik</a>
            </li>
            <li>
              <a href="#candidates">Pencaker</a>
            </li>
           <li>
            <a href="#company">UMKM</a>
          </li>
          <li>
              <a href="#berita">Berita</a>
            </li>
          <li>
            <a href="#about">Tentang Kami</a>
          </li>
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
            <li>
              <a href="landingpage/login.php">Masuk</a>
            </li>
            <li>
              <a href="landingpage/sign-up.php">Daftar</a>
            </li>  
          
            <?php } else { 
              if(isset($_SESSION['id_user'])) { 
            ?>        
            
            <li>
              <a href="dashboard/pencaker/index.php">Dashboard</a>
            </li>
          <?php
            } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="dashboard/umkm/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="landingpage/logout.php">Logout</a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </nav> -->
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header bg-main padding-5" id="home" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center index-head">
            <h1>Cari <strong>Lowongan</strong> Disini</h1>
            <p>Temukan Pekerjaan Yang Sesuai Keinginan Anda</p>
            <p><a class="btn btn-success btn-lg" href="landingpage/jobs.php" role="button">Temukan Lowongan</a></p>
          </div>
        </div>
      </div>
    </section>

    <section class="content-header padding-5" id="lowongan">
      <div class="container">
      <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
            <h1 class="text-center">Lowongan Terbaru</h1>    
            <center><h4>Apa saja lowongan terbaru yang tersedia ?</h4></center>
            <br>       
        
            <?php 
          /* Show any 4 random job post
           * 
           * Store sql query result in $result variable and loop through it if we have any rows
           * returned from database. $result->num_rows will return total number of rows returned from database.
          */
          $sql = "SELECT * FROM buat_lowongan Order By Rand() Limit 5";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
              $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) 
                {
             ?>
            <div class="attachment-block clearfix">
              <img class="attachment-img" style="margin-right: 15px; padding: 3px" src="img/photo1.png" alt="Attachment Image">
              <div class="attachment-text">
                <h4 class="attachment-heading"><a href="landingpage/view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"><?php echo $row['jobtitle']; ?></a> <span class="attachment-heading pull-right">Rp.<?php echo $row['maximumsalary']; ?>/Bulan</span></h4>
                <div class="attachment-text">
                    <div><strong><?php echo $row1['companyname']; ?> | <?php echo $row1['kecamatan']; ?> |<?php echo $row1['kelurahan_desa']; ?> | <?php echo $row1['aboutme']; ?> | Pengalaman Kerja <?php echo $row['experience']; ?> Tahun</strong></div>
                </div>
              </div>
            </div>
          <?php
              }
            }
            }
          }
          ?>

          </div>
        </div>
      </div>
    </section>

    <section id="statistics" class="content-header padding-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>Statistik Bursa Kerja Malang</h1>
            <center><h4>Anda bisa melihat berapa lowongan yang tersedia,berapa saja pencari kerja, umkm yang ada.</h4></center>

          </div>
        </div>
        <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
             <?php
                      $sql = "SELECT * FROM buat_lowongan";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>Total Lowongan</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                  <?php
                      $sql = "SELECT * FROM company WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>Total UMKM Terdaftar</p>
            </div>
            <div class="icon">
                <i class="ion ion-briefcase"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
               <?php
                      $sql = "SELECT * FROM users WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>Total Pencaker</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
             <?php
                      $sql = "SELECT * FROM users WHERE resume!=''";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
              <h3><?php echo $totalno; ?></h3>

              <p>CV/Resume</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-list"></i>
            </div>
          </div>
        </div>
      </div>
      </div>
      
    </section>
   
    <section id="candidates" class="content-header padding-5">
      <div class="container margin-top-30">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>Pencaker</h1>
            <h4>Kami Mempermudah Anda Menemukan Pekerjaan, Bagaimana Caranya ?</h4>            
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail candidate-img">
              <img src="img/job1.jpg" alt="Browse Jobs">
              <div class="caption">
                <h3 class="text-center">Daftar & Ajukan Kartu Kuning</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail candidate-img">
              <img src="img/job2.jpg" alt="Apply & Get Interviewed">
              <div class="caption">
                <h3 class="text-center">Masuk & Pilih Lowongan</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail candidate-img">
              <img src="img/job3.jpg" alt="Start A Career">
              <div class="caption">
                <h3 class="text-center">Tunggu Proses Seleksi </h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container margin-top-30">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">          
      <div class="col-lg-4 col-xs-9">
          <!-- small box -->
          <div class="small-box bg-grey">
          <div class="icon">
              <i class="ionicons ion-android-share"></i>
            </div>
            <div class="inner">
           
            <h3 style="color:black;">1.Data Diri</h3><br>
            <p style="color:black;">Anda akan memasukkan beberapa data yang diperlukan untuk mendaftarkan kartu kuning serta data lain yang diperlukan untuk keperluan seleksi pekerjaan di menu daftar atau klik <a href="landingpage/register-candidates.php">Disini.</a></p>
      </div>
      </div>
      </div>
      <div class="col-lg-4 col-xs-9">
          <!-- small box -->
          <div class="small-box bg-grey">
          <div class="icon">
              <i class="ionicons ion-android-share"></i>
            </div>
            <div class="inner">
           
            <h3 style="color:black;">2.Lowongan</h3><br>
            <p style="color:black;">Pilih lowongan yang sesuai dengan kriteria anda, dekat dengan lokasi anda berada, setelah itu lamar jika cocok, anda bisa melihat daftar lowongan pekerjaan yang ada di dashboard atau klik <a href="landingpage/register-candidates.php">Disini.</a> </p>
      </div>
      </div>
      </div>
      <div class="col-lg-4 col-xs-9">
          <!-- small box -->
          <div class="small-box bg-grey">
          <div class="icon">
              <i class="ionicons ion-checkmark-round"></i>
            </div>
            <div class="inner">
           
            <h3 style="color:black;">3.Seleksi</h3><br>
            <p style="color:black;">Setelah melamar, anda bisa menunggu sembari mengecek notifikasi apakah lamaran anda diterima atau ditolak, anda juga bisa mengirimkan pesan ke umkm yang menyediakan lowongan untuk bertanya.</p>
      </div>
      </div>
      </div>
      </div>
    </section>
    <section id="company" class="content-header padding-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>UMKM</h1>
            <h4>Anda Mempunyai Usaha Namun Kesulitan Untuk Menemukan Tenaga Kerja Yang Sesuai Dengan Kriteria Anda ? Segera Daftarkan UMKM Anda <a href="landingpage/register-company.php">Disini.</a></h4>            
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail company-img">
              <img src="img/umkm1.jpg" alt="Browse Jobs">
              <div class="caption">
                <h3 class="text-center">Buat Lowongan Baru</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail company-img">
              <img src="img/umkm2.png" alt="Apply & Get Interviewed">
              <div class="caption">
                <h3 class="text-center">Cek Jika Ada Pelamar</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="thumbnail company-img">
              <img src="img/umkm3.jpg" alt="Start A Career">
              <div class="caption">
                <h3 class="text-center">Jika Cocok, Pekerjakan</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="berita" class="content-header padding-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
            <center>
            <h1>Berita Terbaru</h1>
            </center>
            
            <?php
            $sql = "SELECT * FROM buat_artikel Order By Rand() Limit 5";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
             ?>
            <div class="attachment-block clearfix">
              <img class="attachment-img" src="img/photo1.png" alt="Attachment Image">
              <div class="attachment-pushed">
                <h4 class="attachment-heading"><a href="landingpage/view-article.php?id=<?php echo $row['id_berita']; ?>"><?php echo $row['judul_berita']; ?></a> <span class="attachment-heading pull-right">Tanggal: <?php echo $row['createdat']; ?></span></h4>
                <div class="attachment-text">
                    <div><strong><?php echo $row['deskripsi']; ?></strong></div>
                </div>
              </div>
            </div>
          <?php
              
            
            }
          }
          ?>

          </div>
        </div>
      </div>
    </section>

    <section id="about" class="content-header padding-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <h1>Tentang Kami</h1>                      
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <img src="img/malang.png" class="img-responsive">
          </div>
          <div class="col-md-6 about-text margin-bottom-20">
            <p align="justify"> Website Bursa Kerja Kabupaten Malang ini diciptakan untuk memenuhi kebutuhan masyarakat kabupaten malang yang ingin mencari kerja maupun yang memiliki lapangan pekerjaan, supaya tersalurkan kebutuhan masing-masing dengan baik. </p>
            <p align="justify">  Maka dari itu website Bursa Kerja Malang ada, pada dasarnya website ini memiliki fungsi sebagai penghubung informasi antara Pencari Kerja dengan Industri. Akhir-akhir ini, fungsi pemerintahan sebagai penghubung masyarakat dengan industri mulai tergeserkan fungsinya dengan berbagai penyedia layanan kerja yang lain.Adanya sistem informasi ini diharapkan memberikan laporan secara real time data pencari kerja dan industri.</p>
            <p align="justify"> Semoga pengguna website Bursa Kerja Kabupaten Malang ini bisa dengan mudah menemukan pekerjaan yang tepat serta para pemilik lapangan kerja bisa menemukan tenaga kerja yang sesuai dengan keinginan.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="content-header padding-5">
      <div class="container">
        <div class="row">
          
          <div class="col-md-12 text-center latest-job margin-bottom-20">
            <div class="col-md-3">
              <a href="dashboard/admin">Ke Dashboard  Amin (Disnaker)</a>
              <p>User diambil dari tabel Admin</p>
              <p>User: admin; pass: 123456</p>
            </div>
            <div class="col-md-3">
              <a href="dashboard/admin_kec">
                <p>Ke Dashboard Amin Kecamatan</p>
              </a>
              <p>User diambil dari tabel Admin</p>
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
<script src="js/ajaxlibsjquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="js/ajaxlibs-twitterbootsrap.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

<!-- Smooth Scrolling for all Links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
<!--  -->

<!-- Floating Button -->
<style>
  .top-scroller {
  position: fixed;
    bottom: 40px;
    right: 40px;
    font-size: 20px;
    padding: 7px;
    display: none;
    z-index: 2;
    text-align: center;
    cursor: pointer;
    height: 50px;
    width: 50px;
    border-radius: 50%;
    background: rgba(0,0,0,.35);
    color: #fff;
    line-height: 40px;

  }
 .top-scroller:hover {
    background: rgba(0,0,0,.6);
  }
  
  </style>
    <div class="top-scroller js-top-scroller">  
      <i class="glyphicon glyphicon-chevron-up" title="Back to Top"></i>
    </div>
  <script>

  $(window).scroll(function(){
    // console.log('wwww');
    if ($(this).scrollTop() > 400) {
      $('.top-scroller').fadeIn();
    } else {
      $('.top-scroller').fadeOut();
    }
  });
  
  //Click event to scroll to top
  $('.top-scroller').click(function(){
    $('html, body').animate({scrollTop : 0},1000);
    return false;
  });
</script>
<!--  -->

</body>
</html>