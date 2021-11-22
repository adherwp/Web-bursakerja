<?php
session_start();

if(isset($_SESSION['id_user']) || isset($_SESSION['id_pengusaha'])) { 
  header("Location: ../index.php");
  exit();
}

require_once("db.php");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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

  <!-- custom css for multiple form -->
  <link href="../css/style.css" rel="stylesheet" type="text/css">

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
          <div class="row latest-job margin-top-50 margin-bottom-20 bg-white" style="padding-left: 35px; padding-right: 35px; padding-top: 35px; padding-bottom: 35px">
            <div class="pull-right">
                  <a href="../index.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-home" title="Kembali ke Halaman Awal"></i></a>
            </div>

            <h2 class="text-center">Form Pendaftaran Pengusaha</h2>
            <form method="post" id="registerPengusaha" action="addpengusaha.php" enctype="multipart/form-data">
                <div class="tab">
                    <div class="col-md-12 latest-job">
                        <h4><b>Informasi Dasar</b></h4>
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control input-lg" type="text" id="nama" name="nama" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                          <label>Gender</label>
                          <select class="form-control input-lg" name="gender" id="gender">
                              <option value="">Pilih Gender</option>
                              <option value="L">Laki-Laki</option>
                              <option value="P">Perempuan</option>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="col-md-12 latest-job">
                        <h4><b>Informasi Administratif</b></h4>
                        <div class="form-group">
                              <label>NIK</label>
                              <input class="form-control input-lg" type="text" name="nik" id="nik" placeholder="NIK" required>
                        </div>
                        <div class="form-group">
                              <label>NIB</label>
                              <input class="form-control input-lg" type="text" name="nib" id="nib" placeholder="NIB" required>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="col-md-12 latest-job">
                    <h4><b>Informasi Akun</b></h4>
                        <div class="form-group">
                              <label>Email</label>
                              <input class="form-control input-lg" type="text" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                              <label>Password</label>
                              <input class="form-control input-lg" type="password" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                              <label>Confirm Password</label>
                              <input class="form-control input-lg" type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required>
                        </div>
                        <div id="passwordError" class="btn btn-flat btn-danger hide-me" >
                            Kata Sandi Tidak Cocok!! 
                        </div>
                    </div>
                </div>
                <div class="col-md-12 latest-job">
                    <div style="overflow: auto;">
                      <div style="float: right;">       
                        <button  class="btn btn-flat" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</  button>
                        <button  class="btn btn-flat btn-success" type="button" id="nextBtn" onclick="nextPrev(1) ">Next</button>
                      </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                      <span class="step"></span>
                      <span class="step"></span>
                      <span class="step"></span>
                    </div>
                </div> 
            </form>        
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

<script>
  $("#registerCandidates").on("submit", function(e) {
    e.preventDefault();
    if( $('#password').val() != $('#cpassword').val() ) {
      $('#passwordError').show();
    } else {
      $(this).unbind('submit').submit();
    }
  });
</script>

<!-- Steps Indicator -->
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("registerPengusaha").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
</script>
<!--  -->
</body>
</html>
