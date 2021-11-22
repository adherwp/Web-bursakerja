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
  <link rel="stylesheet" href="../../css/style.css">

  <!-- Customize Print Layout -->
  
  <style >
    /* td.withborder {
      border: 0.5px solid black;
    } */
   @page { size: auto;  margin: 0mm; }
   table{
        width:100%;
        table-layout: fixed;
        overflow-wrap: break-word;
    }

    #kotakan {
      width: 12px;
      border: 1px solid black;
      padding: 12px;
      margin: 12px;
    }

    .kotakkecil {
      width: 20px; height: 20px; border: 1px solid black;
    }
    
    
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Untuk Print -->
    <!-- <script src="../../node_modules/print-js/src/js/jsprint.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/jsprint.css"> -->
    <script type="text/javascript"></script>
    <!--  -->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
  var a = document.getElementById('printing-css').value;
  var b = document.getElementById(elementId).innerHTML;
  window.frames["print_frame"].document.title = document.title;
  window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
  window.frames["print_frame"].window.focus();
  window.frames["print_frame"].window.print();
}
</script>

<!-- <script type="text/javascript">
  var divToPrint = document.getElementById('table');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding:0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
</script> -->

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
      <?php
      $sql = "SELECT * FROM pencaker WHERE id_user = '$_GET[id]'";
      $result = $conn->query($sql);

      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
      ?>
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
              <h3 class="box-title">Selamat Datang  <b> Admin</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                <li ><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <!-- <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Lowongan Aktif</a></li> -->
                  <li class="active"><a href="list-pencaker.php"><i class="fa fa-address-card-o"></i> Data Kartu Kuning</a></li>
                  <!-- <li><a href="companies.php"><i class="fa fa-building"></i> UMKM</a></li> -->
                  <li><a href="../../landingpage/logout.php"><i class="fa fa-arrow-circle-o-right"></i> Keluar</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9 bg-white padding-2">

            <h3>Data Pencaker</h3>
            <!-- <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-info"></i> Klik pada <b>Nama Pencaker</b> untuk melihat data diri Pencaker.
            </div> -->
            
            <div class="pull-right">
              <a href="javascript:printDiv('print-this');" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-print"></i> Cetak Kartu Kuning</a>
            </div>
            <div class="pull-right">
              <a href="list-pencaker.php" class="btn btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <div id="print-this" style="margin-top: 30px;">
                    <!-- <div class="col-md-12"> -->
                      <!-- Div yang mau di print -->
                          <!-- <img class="logokartukuning" src="../../img/logokabmalang_bw.jpg" alt="" style="height: 100px; weight: 80px;"> -->
                          <table style="width: 100%; padding: 20px;">
                            <tr>
                              <td style="width: 25%; text-align:center;">
                                <img class="logokartukuning" src="../../img/logokabmalang_bw.jpg" alt="" style="height: 90px; weight: 80px;">
                              </td>
                              <td style="width: 50%;">
                                <h4><b>
                                <center>
                                  PEMERINTAH KABUPATEN MALANG<br>
                                  DINAS TENAGA KERJA KABUPATEN MALANG<br>
                                  KARTU TANDA PENCARI KERJA<br>
                                </center>
                                </b></h4>
                              </td>
                              <td style="width: 25%; text-align:center;">
                                <h3><b>AK/I</b></h3>  
                              </td>
                            </tr>
                            
                            <tr>
                              <td>
                                <br> 
                              </td>
                              <td colspan="2">
                                 
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <p style="text-align: right; padding-right: 8px;"><b>No. PENCAKER   :</b></p>
                              </td>
                              <td colspan="2">
                                <!-- <table id="kotakan" >
                                 <tr>
                                  <td style="width: 25px; height: 10px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">1</p>
                                  </td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">2</p>
                                  </td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">3</p>
                                  </td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                  <p id="#" name="#" style="text-align: center">4</p>
                                  </td>
                                  <td style="width: 25px; height: 22px; border: none"></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">1</p>
                                  </td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">2</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">3</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">4</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">5</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">6</p></td>
                                  <td style="width: 25px; height: 22px; border: none"></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">1</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">2</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">3</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">4</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">5</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">6</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;">
                                    <p id="#" name="#" style="text-align: center">7</p></td>
                                 </tr>
                                </table> -->
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <p style="text-align: right; padding-right: 8px;"><b>No. PENDUDUK &nbsp;:</b></p>                        
                              </td>
                              <td colspan="2">
                                <table id="kotakan" >
                                 <tr>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">3</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">9</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">0</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">7</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">0</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">5</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">6</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">1</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">2</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">1</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">9</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">8</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">0</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">0</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">0</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center">1</p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center"></p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center"></p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center"></p></td>
                                  <td style="width: 25px; height: 22px; border: 1px solid black;"><p id="#" name="#" style="text-align: center"></p></td>
                                 </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td rowspan="3" style="text-align: center;">
                                Foto
                              </td>
                              <td colspan="2" style="padding-left: 30px; padding-right: 70px;">
                                <p><b>Ketentuan : </b></p>
                                <ol type="1">
                                  <li><p style="text-align: justify;">
                                    Kartu ini berlaku untuk melamar pekerjaan</p></li>
                                  <li><p style="text-align: justify;">
                                    Bila ada perubahan data/keterangan lainnya atau telah mendapat pekerjaan harap segera melapor</p></li>
                                  <li><p style="text-align: justify;">
                                    Apabila pencari kerja yang bersangkutan telah diterima bekerja, maka instansi/perusahaan yang menerima agar mengembalikan AK/I ini kepada DINAS TENAGA KERJA</p></li>
                                  <li><p style="text-align: justify;">
                                    Karu ini berlaku selama 2 tahun dengan keharusan melapor setiap 6 bulan sekali terhitung sejak tanggal pendaftaran</p></li>
                                  <li><p style="text-align: justify;">Apabila kemudian hari terbukti memberikan keterangan yang tidak benar dan atau memiliki lebih dari satu kartu AK/I maka akan dituntut sesuai dengan peraturan perundang-undangan yang berlaku.</p></li>
                                </ol>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                                <table width="90%" style="border-spacing: 0; border: 0.5px solid black;">
                                  <tr >
                                    <td style="text-align:center; border: 0.5px solid black;">Laporan</td>
                                    <td style="text-align:center; border: 0.5px solid black;">Tgl-Bln-Th</td>
                                    <td style="text-align:center; border: 0.5px solid black;">Ttd Petugas<br>Cantumkan NIP</td>
                                  </tr>
                                  <tr>
                                    <td style="border: 0.5px solid black;"><p>&nbsp;</p></td>
                                    <td style="border: 0.5px solid black;"><p>&nbsp;</p></td>
                                    <td style="border: 0.5px solid black;"><p>&nbsp;</p></td>
                                  </tr>
                                  <tr>
                                    <td style="border: 0.5px solid black;"><p>&nbsp;</p></td>
                                    <td style="border: 0.5px solid black;"><p>&nbsp;</p></td>
                                    <td style="border: 0.5px solid black;"><p>&nbsp;</p></td>
                                  </tr>
                                  <tr>
                                    <td style="border: 0.5px solid black;"><p>&nbsp;</p></td>
                                    <td style="border: 0.5px solid black;"><p>&nbsp;</p></td>
                                    <td style="border: 0.5px solid black;"><p>&nbsp;</p></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                                <br>
                                <table width="90%" style="border: 1px solid black;">
                                  <tr >
                                    <td width="20%" style="padding-left: 10px; padding-top: 10px;">
                                      Diterima di
                                    </td>
                                    <td width="80%" style="padding-right: 10px; padding-bottom: 0px; padding-top: 10px;">
                                      <!-- <hr style="border-bottom: dotted 1px;"> -->
                                      ................................................................................................................................
                                    </td>
                                  </tr>
                                  <tr >
                                    <td width="15%" style="padding-left: 10px; padding-top: 10px;">
                                      TMT
                                    </td>
                                    <td width="85%" style="padding-right: 10px; padding-bottom: 0px; padding-top: 10px;">
                                      <!-- <hr style="border-bottom: dotted 1px;"> -->................................................................................................................................
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                          <br>
                          <br>
                          <br>
                          <table>
                            <tr>
                              <td style="width: 35%;">
                                <b>NAMA</b>
                              </td>
                              <td> : </td>
                              <td style="width: 64%;">
                              <?php echo $row['nama']?>  
                                <!-- <table id="kotakan" >
                                  <tr>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">S</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">E</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">S</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">I</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">L</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">L</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">I</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">A</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center"></p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">F</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">A</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">J</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">A</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">R</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center"></p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">K</p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center"></p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center"></p>
                                    </td>
                                    <td style="width: 25px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center"></p>
                                    </td>
                                  </tr>
                                </table> -->
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <b>TEMPAT TGL. LAHIR</b>
                              </td>
                              <td> : </td>
                              <td>
                                <table>
                                  <tr>
                                    <td>
                                      MALANG, <?php echo $row['tanggal_lahir']; ?>
                                    </td>
                                    <!-- <td style="width: 25px; height: 22px; border: none"></td>
                                    <td style="width: 25px; height: 22px; border: none"></td>
                                    <td style="width: 25px; height: 22px; border: none"></td>
                                    <td style="width: 25px; height: 22px; border: none"></td>
                                    <td style="width: 25px; height: 22px; border: none"></td>
                                    <td style="width: 25px; height: 22px; border: none"></td>
                                    <td style="width: 25px; height: 22px; border: none"></td>
                                    <td style="width: 25px; height: 22px; border: none"></td>
                                    <td style="width: 25px; height: 22px; border: none"></td>
                                    <td style="width: 25px; height: 22px; border: none"></td>
                                    <td style="width: 25px; height: 22px; border: none"></td>
                                    <td style="width: 26px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">
                                        2
                                      </p>
                                    </td>
                                    <td style="width: 26px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">
                                        1
                                      </p>
                                    </td>
                                    <td style="width: 26px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">
                                        1
                                      </p>
                                    </td>
                                    <td style="width: 26px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">
                                        0
                                      </p>
                                    </td>
                                    <td style="width: 26px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">
                                        9
                                      </p>
                                    </td>
                                    <td style="width: 26px; height: 22px; border: 1px solid black;">
                                      <p id="#" name="#" style="text-align: center">
                                        8
                                      </p>
                                    </td>   -->
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <b>JENIS KELAMIN</b>
                              </td>
                              <td> : </td>
                              <td>
                                <?php if($row['jenis_kelamin']== 'P'){echo "Perempuan";}else{echo "Laki Laki";} ?>
                                <!-- <table width="100%">
                                  <tr>
                                    <td width="25%">1. Laki-laki</td>
                                    <td width="25%">2. Perempuan</td>
                                    <td width="25%"> &nbsp; </td>
                                    <td width="25%"> &nbsp; </td>
                                  </tr>
                                </table> -->
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <b>STATUS</b>
                              </td>
                              <td> : </td>
                              <td>
                              <?php echo $row['status'] ?>
                                <!-- <table width="100%">
                                  <tr>
                                    <td width="25%">1. Kawin</td>
                                    <td width="25%">2. Belum Kawin</td>
                                    <td width="25%">3. Janda</td>
                                    <td width="25%">4. Duda</td>
                                  </tr>
                                </table> -->
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <b>AGAMA</b>
                              </td>
                              <td> : </td>
                              <td>
                                <?php echo $row['agama'] ?>
                                <!-- <table width="100%">
                                  <tr>
                                    <td width="25%">1. Islam</td>
                                    <td width="25%">2. Protestan</td>
                                    <td width="25%">3. Katolik</td>
                                    <td width="25%">4. Hindu</td>
                                  </tr>
                                </table> -->
                              </td>
                            </tr>
                            <tr>
                              <td>
                                &nbsp;
                              </td>
                              <td> : </td>
                              <td>
                                <!-- <table width="100%">
                                  <tr>
                                    <td width="25%">5. Buddha</td>
                                    <td width="75%">6. Kepercayaan kepada Tuhan YME</td>
                                     <td width="25%">&nbsp;</td>
                                    <td width="25%">&nbsp;</td>
                                  </tr>
                                </table> -->
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <b>CIRI - CIRI KHUSUS</b>
                              </td>
                              <td> : </td>
                              <td>.................................................................................................................................................</td>
                            </tr>
                            <tr>
                              <td>
                                <b>ALAMAT / TELP</b>
                              </td>
                              <td> : </td>
                              <td><?php echo $row['alamat']." , Ds.".$row['desa']. ", Kec.".$row['kecamatan'] ?></td>
                            </tr>
                            <!-- <tr>
                              <td>
                                <b>&nbsp;</b>
                              </td>
                              <td> : </td>
                              <td>.................................................................................................................................................</td>
                            </tr> -->
                            <tr>
                              <td><b>PENDIDIKAN FORMAL/NON FORMAL</b></td>
                              <td> : </td>
                              <td>&nbsp;</td>
                            </tr>

                            <tr>
                              <td><b>TIDAK TAMAT/SD SAMPAI KELAS</b></td>
                              <td> : </td>
                              <td>
                                <table width="100%">
                                  <tr>
                                    <td width=35%>....................................................</td>
                                    <td width=30%>Th.............................</td>
                                    <td></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td><b>SD / SEDERAJAT</b></td>
                              <td> : </td>
                              <td>
                                <table width="100%">
                                  <tr>
                                    <td width=35%>....................................................</td>
                                    <td width=30%>Th.............................</td>
                                    <td> </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td><b>SLTP / SEDERAJAT</b></td>
                              <td> : </td>
                              <td>
                                <table width="100%">
                                  <tr>
                                    <td width=35%>....................................................</td>
                                    <td width=30%>Th.............................</td>
                                    <td></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td><b>SLTA / SEDERAJAT</b></td>
                              <td> : </td>
                              <td>
                                <table width="100%">
                                  <tr>
                                    <td width=35%>....................................................</td>
                                    <td width=30%>Th.............................</td>
                                    <td><p style="text-align: center; padding-right: 20px;">DINAS TENAGA KERJA</p></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td><b>D.I. D.II, D.III, D.IV</b></td>
                              <td> : </td>
                              <td>
                                <table width="100%">
                                  <tr>
                                    <td width=35%>....................................................</td>
                                    <td width=30%>Th.............................</td>
                                    <td><p style="text-align: center; padding-right: 20px;">KABUPATEN MALANG</p></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td><b>AKTA.I/AKTA.II/AKTA.III/AKTA.IV/AKTA.V</b></td>
                              <td> : </td>
                              <td>
                                <table width="100%">
                                  <tr>
                                    <td width=35%>....................................................</td>
                                    <td width=30%>Th.............................</td>
                                    <td><p style="text-align: center; padding-right: 20px;">PENGANTAR KERJA</p></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td><b>S.1/S.2/S.3</b></td>
                              <td> : </td>
                              <td>
                                <table width="100%">
                                  <tr>
                                    <td width=35%>....................................................</td>
                                    <td width=30%>Th.............................</td>
                                    <td></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3">&nbsp;</td>
                            </tr>

                            <tr>
                              <td><b><u>PENDIDIKAN NON FORMAL</u></b></td>
                            </tr>
                            <br>
                            <tr>
                              <td colspan="3">
                                <table width="100%">
                                  <td width="59%">
                                    1. ......................................................................................................................................
                                  </td>
                                  <td width=44%>Th.............................</td>                                  
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3">
                                <table width="100%">
                                  <td width="59%">
                                    2. ......................................................................................................................................
                                  </td>
                                  <td width=44%>Th.............................</td>                                  
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3">
                                <table width="100%">
                                  <td width="59%">
                                    3. ......................................................................................................................................
                                  </td>
                                  <td width=44%>Th.............................</td>                                  
                                </table>
                              </td>
                            </tr>
                          </table>

                         
                      <!--  -->
                    <!-- </div> -->
                  </div>
                  <!-- <div class="col-md-12">
                    <a href="javascript:printDiv('print-this');">Print</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }
        } ?>
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

  <!-- Script for clickable tr -->
  <script>
    $('*[data-href]').on("click",function(){
      window.location = $(this).data('href');
      return false;
    });
    $("td > a").on("click",function(e){
      e.stopPropagation();
    });
  </script>
  <!--  -->

</body>
</html>
