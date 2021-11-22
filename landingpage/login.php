<?php 
  session_start();
  if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { 
    header("Location: ../index.php");
    exit();
  }
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
  <link rel="stylesheet" href="../css/style1.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Google reCaptcha -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
  
  </head>
<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="../index.php" class="logo logo-bg">
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
              <a href="../index.php">Home</a>
            </li> 
          <li>
              <a href="jobs.php">Lowongan</a>
            </li>
              <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
            <li>
              <a href="login.php">Masuk</a>
            </li>
            <li>
              <a href="sign-up.php">Daftar</a>
            </li>  
            <?php } else { 
              if(isset($_SESSION['id_user'])) { 
            ?>        
            <li>
              <a href="../dashboard/pencaker/index.php">Dashboard</a>
            </li>
            <?php
              } else if(isset($_SESSION['id_company'])) { 
            ?>        
            <li>
              <a href="../dashboard/umkm/index.php">Dashboard</a>
            </li>
            <?php } ?>
            <li>
              <a href="logout.php">Logout</a>
            </li>
            <?php } ?>          
          </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section class="content-header">
      <div class="container">
        <div class="row latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center margin-bottom-20">Masuk Sebagai</h1>
          <div class="col-md-6 latest-job ">
            <div class="small-box bg-yellow padding-5">
              <div class="inner">
                <h3 class="text-center">Pencari Kerja</h3>
              </div>
              <p data-toggle="modal" data-target="#mylogin" class="small-box-footer">
                <a href="#"><font color="white">Masuk Di Sini </font><i class="fa fa-arrow-circle-right" style="color:white"></i></a></p>
              </div>
          </div>
          <div class="col-md-6 latest-job ">
            <div class="small-box bg-aqua padding-5">
              <div class="inner">
                <h3 class="text-center">Penyedia Kerja</h3>
              </div>
              <p data-toggle="modal" data-target="#mylogincompany" class="small-box-footer">
                <a href="#"><font color="white">Masuk Di Sini </font><i class="fa fa-arrow-circle-right" style="color:white"></i></a></p>
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
<script src="../js/ajaxlibsjquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../js/ajaxlibs-twitterbootsrap.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<!-- Modal login -->
<div id="mylogin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content padding-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="login-logo">
          <span class="logo-lg"><b>Login</b> Pencaker</span>
        </div>
      </div>
    <div class="modal-body">
    
    <form method="post" action="checklogin.php">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <!-- Re-Captcha -->
      <div class="g-recaptcha" data-sitekey="6LfhR9YUAAAAADCoQE77qmcJwxyRuJvqr2L7Q9zI" data-callback="enableBtn"></div>
      <div class="row">
        <div class="col-xs-8">
          <a href="#">Saya Lupa Kata Sandi</a>
        </div>
      </div>

      <!-- button di dalam popup -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="buttonLogComp">Login</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </form>

    <?php 
      //If User have successfully registered then show them this success message
      //Todo: Remove Success Message without reload?
      if(isset($_SESSION['registerCompleted'])) {
    ?>
        <div>
          <p id="successMessage" class="text-center">Cek Email Anda</p>
        </div>
    <?php
      unset($_SESSION['registerCompleted']); }
    ?>   
      <?php 
        //If User Failed To log in then show error message.
        if(isset($_SESSION['loginError'])) {
        ?>
        <div>
          <p class="text-center">Email/Kata Sandi Anda Salah, Silahkan Coba Lagi!</p>
        </div>
      <?php
        unset($_SESSION['loginError']); }
      ?>      

      <?php 
        //If User Failed To log in then show error message.
        if(isset($_SESSION['userActivated'])) {
      ?>
        <div>
          <p class="text-center">Akun Anda Sudah Aktif, Silahkan Anda Masuk.</p>
        </div>
      <?php
        unset($_SESSION['userActivated']); }
      ?>    

      <?php 
        //If User Failed To log in then show error message.
        if(isset($_SESSION['loginActiveError'])) {
      ?>
        <div>
          <p class="text-center"><?php echo $_SESSION['loginActiveError']; ?></p>
        </div>
      <?php
        unset($_SESSION['loginActiveError']); }
      ?>

    </div>
      
      
    </div>
  </div>
  
</div>
<!-- End Modal Login -->

<!-- MODAL LOGIN COMPANY -->
<div id="mylogincompany" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content padding-modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="login-logo">
          <span class="logo-lg"><b>Login</b> UMKM</span>
        </div>
      </div>
    <div class="modal-body">
    
    <form method="post" action="checkcompanylogin.php">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <!-- reCaptcha -->
      <div class="g-recaptcha" data-sitekey="6LfhR9YUAAAAADCoQE77qmcJwxyRuJvqr2L7Q9zI" data-callback="enableBtn"></div>

      <div class="row">
        <div class="col-xs-8">
          <a href="#">Saya Lupa Kata Sandi</a>
        </div>
      </div>

      <!-- button di dalam popup -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" id="buttonLogComp1">Login</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </form>

    <?php 
      //If User have successfully registered then show them this success message
      //Todo: Remove Success Message without reload?
      if(isset($_SESSION['registerCompleted'])) {
    ?>
        <div>
          <p id="successMessage" class="text-center">Cek Email Anda</p>
        </div>
    <?php
      unset($_SESSION['registerCompleted']); }
    ?>   
      <?php 
        //If User Failed To log in then show error message.
        if(isset($_SESSION['loginError'])) {
        ?>
        <div>
          <p class="text-center">Email/Kata Sandi Anda Salah, Silahkan Coba Lagi!</p>
        </div>
      <?php
        unset($_SESSION['loginError']); }
      ?>      

      <?php 
        //If User Failed To log in then show error message.
        if(isset($_SESSION['userActivated'])) {
      ?>
        <div>
          <p class="text-center">Akun Anda Sudah Aktif, Silahkan Anda Masuk.</p>
        </div>
      <?php
        unset($_SESSION['userActivated']); }
      ?>    

      <?php 
        //If User Failed To log in then show error message.
        if(isset($_SESSION['loginActiveError'])) {
      ?>
        <div>
          <p class="text-center"><?php echo $_SESSION['loginActiveError']; ?></p>
        </div>
      <?php
        unset($_SESSION['loginActiveError']); }
      ?>

    </div>
    
    </div>
  </div>
  
</div>
<!-- END MODAL LOGIN PENGUSAHA -->


<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script type="text/javascript">
      $(function() {
        $("#successMessage:visible").fadeOut(8000);
      });
    </script>

<!-- JS Disable Submit -->
<script type="text/javascript" language="JavaScript">
// Callback to get the button working.
  function enableBtn(){
    document.getElementById("buttonLogComp").disabled = false;
    document.getElementById("buttonLogComp1").disabled = false;
  }
</script>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		// disable the button until successfull google captcha
    	document.getElementById("buttonLogComp").disabled = true;
      document.getElementById("buttonLogComp1").disabled = true;
	})(jQuery);
</script>

</body>
</html>
