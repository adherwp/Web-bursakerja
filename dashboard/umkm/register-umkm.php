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
  <link rel="stylesheet" href="../../css/style.css">
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
                  <li class="active"><a href="list-company.php"><i class="fa fa-industry"></i> UMKM Saya</a></li>
                  <li><a href="create-job-post.php"><i class="fa fa-paper-plane"></i> Buat Lowongan</a></li>
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

          <div class="col-md-9 bg-white">
            <h3>Tambah UMKM</h3>
            <div class="row">
              <section class="content-header">
                <div class="row latest-job bg-white" style="padding-left: 35px; padding-right: 35px;">
                  <form method="post" id="form-register-umkm" action="add-umkm.php" enctype="multipart/form-data">
                    <!-- 2nd Tab -->
                    <div class="tab">
                      <div class="col-md-12 latest-job ">
                        <h3 class="text-center margin-bottom-20">Informasi Dasar UMKM</h3>
                        <div class="form-group">
                          <label>Nama UMKM</label>
                          <input class="form-control input-lg" type="text" id="companyname" name="companyname" placeholder="Nama UMKM" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi UMKM</label>
                            <input class="form-control input-lg" type="text" id="aboutme" name="aboutme" placeholder="Deskripsi UMKM">
                        </div>
                      </div>
                    </div>
                    <!-- End Tab -->

                    <!-- 2nd tab -->
                    <div class="tab">
                      <div class="col-md-12 latest-job ">
                        <h3 class="text-center margin-bottom-20">Lokasi UMKM</h3>
                        <div class="form-group">
                          <label>Asal Kecamatan</label>
                          <select class="form-control  input-lg" id="kecamatan" name="kecamatan" required>
                            <option selected="" value="">Pilih Kecamatan</option>
                              <?php
                                $sql="SELECT * FROM kecamatan";
                                $result=$conn->query($sql);
                                if($result->num_rows > 0) {
                                  while($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row['name']."' data-id='".$row['id']."'>".$row['name']."</option>";
                                  }
                                }
                              ?>
                            </select>
                        </div>      
                        <div id="kelurahanDesaDiv" class="form-group" style="display: none;">
                          <label>Asal Desa / Kelurahan</label> 
                          <select class="form-control  input-lg" id="kelurahan_desa" name="kelurahan_desa" required>
                            <option value="" selected="">Pilih Kelurahan/Desa</option>
                          </select>
                        </div>
                        <div id="alamat" class="form-group" style="display: none;">
                          <label>Alamat Lengkap</label>
                          <br>
                          <textarea class="form-control input-lg" rows="4" name="alamat" placeholder="Alamat Lengkap Pendaftar"></textarea>
                        </div>
                      </div>                  
                    </div>
                    <!-- End tab -->

                    <!-- 3rdTab -->
                    <div class="tab">
                      <div class="col-md-12 latest-job ">
                        <h3 class="text-center margin-bottom-20">Kontak UMKM</h3>
                        <div class="form-group">
                          <label>Nomor Telepon</label>
                          <input class="form-control input-lg" type="text" id="contactno" name="contactno" placeholder="Nomor Telepon" required>
                        </div>             
                        <br>
                        <div class="form-group">
                          <label>Website</label>
                          <input class="form-control input-lg" type="text" id="website" name="website" placeholder="Website" required>
                        </div>                             
                        <br>
                        <div class="form-group">
                          <label>Email</label>
                          <input class="form-control input-lg" type="text" id="email" name="email" placeholder="Email" required>
                        </div>           
                      </div>                  
                    </div>
                    <!-- End Tab -->

                    <!-- 4th Tab -->
                    <div class="tab">
                      <div class="col-md-12 latest-job">
                        <h3 class="text-center margin-bottom-20">Logo UMKM</h3> 
                        <br>
                        <div class="form-group">
                          <div class="picture-container">
                              <div class="picture">
                                  <img src="../../img/plus.png" class="picture-src" id="wizardPicturePreview"title="">
                                  <input type="file" id="image" class="">
                              </div>
                              <h6 class="">Choose Picture</h6>
                          </div>
                        </div>  
                      </div>
                    </div>
                    <!-- End Tab -->

                    <div class="col-md-12 latest-job">

                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                      </div>

                      <div style="overflow: auto;">
                        <div style="float: right;">       
                          <!-- <button class="btn btn-flat btn-success" type="submit">SUBMIT</button> -->
                          <button  class="btn btn-flat" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</  button>
                          <button  class="btn btn-flat btn-success" type="button" id="nextBtn" onclick="nextPrev(1) ">Next</button>
                        </div>
                      </div>
                      <!-- Circles which indicates the steps of the form: -->
                      
                    </div> 
                  </form>   
              </section>
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



</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../js/ajaxlibsjquery.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../js/ajaxlibs-twitterbootsrap.js"></script>
<!-- AdminLTE App -->
<script src="../../js/adminlte.min.js"></script>

<script>
  $("#kecamatan").on("change", function() {
    var id = $(this).find(':selected').attr("data-id");
    $("#kelurahan_desa").find('option:not(:first)').remove();
    if(id != '') {
      $.post("../../landingpage/kelurahan-desa.php", {id: id}).done(function(data) {
        $("#kelurahan_desa").append(data);
      });
      $('#kelurahanDesaDiv').show();
    } else {
      $('#kelurahanDesaDiv').hide();
      $('#alamat').hide();
    }
  });
</script>

<script>
  $("#kelurahan_desa").on("change", function() {
    var id = $(this).find(':selected').attr("data-id");
    $("#city").find('option:not(:first)').remove();
    if(id != '') {
      $.post("city.php", {id: id}).done(function(data) {
        $("#city").append(data);
      });
      $('#alamat').show();
    } else {
      $('#alamat').hide();
    }
  });
</script>

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
        document.getElementById("form-register-umkm").submit();
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
  <script>
    $(document).ready(function(){
    // Prepare the preview for profile picture
        $("#image").change(function(){
            readURL(this);
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
        
            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>
</body>
</html>
