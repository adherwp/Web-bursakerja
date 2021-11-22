<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
$id_pencaker = $_GET["id"]; 
// die($id_pencaker);
if(empty($_SESSION['id_user'])) {
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
          <div class="col-md-9 bg-white">
            <div class="#">
              <?php
                $sql = "SELECT * FROM pencaker WHERE id_user = '$_SESSION[id_user]' AND id = $id_pencaker";
                $result = $conn->query($sql);
                
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
              ?>
          <div class="row">
            <div class="col-md-12 bg-white padding-2 d-flex justify-content-between">
              <div class="row">
                <div class="pull-left col-md-4" style="margin-left: 2%">
                  <h2><b><i><?php echo $row['nama'] ?></i></b></h2>
                </div>
                <div class="pull-right col-md-4" style="text-align: right; margin-right: 2%">
                  <h2><b><i><?php echo $row['no_antrian'] ?></i></b></h2>
                </div>
              </div>
            <div>
                    
            <div class="col-md-12 bg-white">
              <hr>
            </div>      
            <div class="col-md-12 bg-white padding-2">
              <div class="col-md-12 text-center">
              <img src="../../uploads/foto_pribadi/<?php echo $row['pas_foto']?>" style="width: 200px; height: 210px;"><br>
              <label><?php echo $row['nama'] ?></label>
              <p><?php 
                $strTgl = strtotime($row['tanggal_lahir']);
                $tgl = date('d-m-Y', $strTgl); 
                
                echo $tgl; ?></p>
              <p><?php if($row['jenis_kelamin']== 'P'){echo "Perempuan";}else{echo "Laki Laki";} ?> . <?php echo $row['status']; ?> . <?php echo $row['agama'] ?> . <?php echo $row['kewarganegaraan'] ?></p>
              <p><?php echo $row['tinggi_badan']; ?> cm . <?php echo $row['berat_badan']; ?> kg</p>

              <!-- if else cacat -->
              <?php
                if($row['cacat_badan'] == "Tidak Ada"){
                  echo "<p>Tidak memiliki riwayat cacat fisik dan cacat lainnya</p>";
                }else{
                  if ($row['cacat_lainnya']) {
                    echo "<p>Memiliki cacat : " . $row['cacat_badan'].', '.$row['cacat_lainnya'];
                  }else{
                    echo "<p>Memiliki cacat : " . $row['cacat_badan'];
                  }
                }
              ?>

              <!-- if else penghasil -->
              <?php
                if($row['penghasil']=="Ya"){
                  echo "<p><i><b>Berpenghasilan</i></b></p>";
                } else {
                  echo "<p><i><b>Belum Berpenghasilan</i></b></p>";
                } 
              ?>
              
              </div>
                
              <!-- Sisi Kanan -->
              <div class="col-md-12">
                <div class="col-md-12">
                  <!-- if else pendidikan -->
                  <h4><b>Pendidikan</b></h4>
                  <div class="col-md-12">
                    <label>Formal</label>
                    <?php $pdSql = "SELECT * FROM pendidikan WHERE id_pencaker = $id_pencaker";
                          $pdResult = $conn->query($pdSql);
                          if($pdResult->num_rows > 0) {
                            while($pdRow = $pdResult->fetch_assoc()) {
                        
                    ?>
                      <table class="table" width="100%">
                        <tr class="info">
                          <th>Nama Sekolah</th>
                          <th>Tahun Pendidikan</th>
                        </tr>
                        <?php 
                          if(!empty($pdRow['tidak_tamat'])){
                            echo "<tr>";
                            echo " <td>".$pdRow['tidak_tamat']."</td>";
                            echo " <td>".$pdRow['thn_tidak_tamat']."</td>";
                            echo "</tr>";
                          } else {
                            echo  "<tr style='display:none';>";
                            echo  "  <td></td>";
                            echo  "  <td></td>";
                            echo  "</tr>";
                          }
                          if(!empty($pdRow['sd'])){
                            echo "<tr>";
                            echo " <td>".$pdRow['sd']."</td>";
                            echo " <td>".$pdRow['thn_sd']."</td>";
                            echo "</tr>";
                          } else {
                            echo  "<tr style='display:none';>";
                            echo  "  <td></td>";
                            echo  "  <td></td>";
                            echo  "</tr>";
                          }
                          if(!empty($pdRow['smp'])){
                            echo "<tr>";
                            echo " <td>".$pdRow['smp']."</td>";
                            echo " <td>".$pdRow['thn_smp']."</td>";
                            echo "</tr>";
                          } else {
                            echo  "<tr style='display:none';>";
                            echo  "  <td></td>";
                            echo  "  <td></td>";
                            echo  "</tr>";
                          }
                          if(!empty($pdRow['sma'])){
                            echo "<tr>";
                            echo " <td>".$pdRow['sma']."</td>";
                            echo " <td>".$pdRow['thn_sma']."</td>";
                            echo "</tr>";
                          } else {
                            echo  "<tr style='display:none';>";
                            echo  "  <td></td>";
                            echo  "  <td></td>";
                            echo  "</tr>";
                          }
                          if(!empty($pdRow['sm'])){
                            echo "<tr>";
                            echo " <td>".$pdRow['sm']."</td>";
                            echo " <td>".$pdRow['thn_sm']."</td>";
                            echo "</tr>";
                          } else {
                            echo  "<tr style='display:none';>";
                            echo  "  <td></td>";
                            echo  "  <td></td>";
                            echo  "</tr>";
                          }
                          if(!empty($pdRow['akta_dua'])){
                            echo "<tr>";
                            echo " <td>".$pdRow['akta_dua']."</td>";
                            echo " <td>".$pdRow['thn_akta_dua']."</td>";
                            echo "</tr>";
                          } else {
                            echo  "<tr style='display:none';>";
                            echo  "  <td></td>";
                            echo  "  <td></td>";
                            echo  "</tr>";
                          }
                          if(!empty($pdRow['akta_tiga'])){
                            echo "<tr>";
                            echo " <td>".$pdRow['akta_tiga']."</td>";
                            echo " <td>".$pdRow['thn_akta_tiga']."</td>";
                            echo "</tr>";
                          } else {
                            echo  "<tr style='display:none';>";
                            echo  "  <td></td>";
                            echo  "  <td></td>";
                            echo  "</tr>";
                          }
                          if(!empty($pdRow['sarjana'])){
                            echo "<tr>";
                            echo " <td>".$pdRow['sarjana']."</td>";
                            echo " <td>".$pdRow['thn_sarjana']."</td>";
                            echo "</tr>";
                          } else {
                            echo  "<tr style='display:none';>";
                            echo  "  <td></td>";
                            echo  "  <td></td>";
                            echo  "</tr>";
                          }
                          if(!empty($pdRow['doktor'])){
                            echo "<tr>";
                            echo " <td>".$pdRow['doktor']."</td>";
                            echo " <td>".$pdRow['thn_doktor']."</td>";
                            echo "</tr>";
                          } else {
                            echo  "<tr style='display:none';>";
                            echo  "  <td></td>";
                            echo  "  <td></td>";
                            echo  "</tr>";
                          }
                        ?>
                      </table>
                    <?php
                            }
                          }
                    ?>
                  </div>
                  
                  <div class="col-md-6 margin-top-20">
                    <label>Bahasa</label>
                    <br>
                    <?php 
                          $sqlBahasa = "SELECT * FROM bahasa WHERE id_pencaker = $id_pencaker";
                          $resultBahasa = $conn->query($sqlBahasa);
                          if($resultBahasa->num_rows > 0) {
                            while($rowBahasa = $resultBahasa->fetch_assoc()) {?>
                              <span><i><?php echo $rowBahasa['bahasa'] ?>,</i></span>
                        <?php
                            }
                          }
                        ?> 
                  </div>

                  <div class="col-md-6 margin-top-20">
                    <label>Non Formal</label>
                    <?php 
                          $sqlNonFormal = "SELECT * FROM pendidikan_non_formal WHERE id_pencaker = '$id_pencaker'";
                          $resultNonFormal = $conn->query($sqlNonFormal);
                          if($resultNonFormal->num_rows > 0) {
                            while($rowNonFormal = $resultNonFormal->fetch_assoc()) {
                              if ($rowNonFormal['penyelenggara'] != 'Tidak Ada') {
                                echo "<p><i><b>". $rowNonFormal['penyelenggara']."</b> ". $rowNonFormal['lama_kursus']." bulan pada tahun ".$rowNonFormal['thn_kursus']."</i></p>";
                              }
                      ?>
                      <?php
                            }
                          }
                      ?>
                    <br>
                  </div>
                </div>
                  
                
                  
                  <div class="margin-top-20">
                    <div class="col-md-6">
                    <h4><b>Pekerjaan Sekarang</b></h4>
                    <p><i><?php echo $row['kerja_sekarang'] ?></i></p> 
                    </div>
                    <div class="col-md-6 ">
                        <h4><b>Keahlian Yang Dimiliki</b></h4>
                        <?php 
                          $sql1 = "SELECT * FROM skill WHERE id_pencaker = $id_pencaker";
                          $result1 = $conn->query($sql1);
                          if($result1->num_rows > 0) {
                            while($row1 = $result1->fetch_assoc()) {?>

                              <span><i><?php echo $row1['skill'] ?>,</i></span>
                        <?php
                            }
                          }
                        ?> 
                      </div>
                  
                  </div>
                  <div class="margin-top-20">
                  <div class="col-md-12">
                    <h4><b>Terdaftar dalam Jabatan</b></h4>
                  
                    <div class="col-md-6">
                      <label>Pokok</label>
                      <p><i><?php
                      if (empty($row['j_kerja_pokok'])) {
                        echo 'Tidak ada';
                      } else{
                        echo $row['j_kerja_pokok'];
                      }
                      ?></i></p> 
                    </div>
                    <div class="col-md-6">
                      <label>Sampingan</label>
                      <p><i><?php
                      if (empty($row['j_kerja_sampingan'])) {
                        echo 'Tidak ada';
                      } else{
                        echo $row['j_kerja_sampingan'];
                      }
                      ?></i></p> 
                      <br>
                    </div>
                  </div>
                  </div>
                  <br>
                  <br>
                  
                  <div class="margin-top-20">
                  <div class="col-md-12">
                    <h4><b>Riwayat Pekerjaan</b></h4>
                    <?php if (empty($row['jabatan1']) && empty($row['kerja1']) && empty($row['lama1']) && empty($row['upah1']) && empty($row['alasan1'])) {
                      echo "<p>Belum mempunyai pengalaman kerja</p> <br>";
                    } else {?>
                      <div class="col-md-6">
                        <label>Jenis Lapangan Usaha 1</label>
                        <p><i><?php echo $row['jabatan1']." . ".$row['kerja1']." . ".$row['lama1']." Bulan"; ?></i></p> 
                        <p><i>Rp. <?php echo $row['upah1']; ?>/bln</i></p> 
                        <p><i>Keluar karena <?php echo $row['alasan1']; ?></i></p> 
                        <br>
                      </div>
                      <div class="col-md-6">
                        <label>Jenis Lapangan Usaha 2</label>
                    <?php if (empty($row['jabatan2']) && empty($row['kerja2']) && empty($row['lama2']) && empty($row['upah2']) && empty($row['alasan2'])) {
                      echo "<p>Tidak ada</p></br></br></br>";
                    } else {?>
                        <p><i><?php echo $row['jabatan2']." . ".$row['usaha2']." . ".$row['lama2']." Bulan"; ?></i></p> 
                        <p><i>Rp. <?php echo $row['upah2']; ?>/bln</i></p> 
                        <p><i>Keluar karena <?php echo $row['alasan2']; ?></i></p> 
                    <?php }
                      echo '</div>';
                    }?>
                    </div>
                  </div>
                  
                  <div class="margin-top-20">
                  <div class="col-md-12">
                    <h4><b>Pekerjaan yang Diinginkan</b></h4>
                    <div class="col-md-6">
                      <label>Jabatan yang Diinginkan</label>
                      <p><i><?php echo $row['ingin_jabatan'];?></i></p> 
                      
                      <label>Bersedia Ditempatkan</label>
                      <p><i>Di <?php echo $row['penempatan']?></i></p> 
                      
                      <label>Bersedia Ditempatkan untuk Waktu</label>
                      <p><i><?php echo $row['bersedia_waktu'];?></i></p> 
                      <br>
                    </div>                                    
                    <div class="col-md-6">
                      <label>Bersedia Menerima Upah</label>
                      <p><i><?php echo $row['bersedia_upah'];?></i></p> 
                      
                      <label>Upah yang Diinginkan</label>
                      <p><i>Rp. <?php echo $row['ingin_upah'];?></i></p> 
                      
                      <label>Keadaan yang Diinginkan</label>
                      <p><i><?php echo $row['keadaan'];?></i></p> 
                    </div>                                    
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <?php   }
                  } 
            ?>      
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
<!-- AdminLTE App -->
<script src="../../js/adminlte.min.js"></script>
</body>
</html>
