<?php
session_start();
require_once("../../landingpage/db.php");
// echo("woy".$_SESSION['id_user']);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bursa Kerja Malang</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Ajax 2.2.0 -->
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
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

  <!-- custom css for multiple form -->
  <link href="../css/style.css" rel="stylesheet" type="text/css">

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
          <?php if(empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
          <li>
            <a href="../../landingpage/login.php">Masuk</a>
          </li>
          <li>
            <a href="sign-up.php">Daftar</a>
          </li>  
          <?php } else { 

            if(isset($_SESSION['id_user'])) { 
          ?>        
          <li>
            <a href="index.php">Dashboard</a>
          </li>
          <?php
          } else if(isset($_SESSION['id_company'])) { 
          ?>        
          <li>
            <a href="dashboard/umkm/index.php">Dashboard</a>
          </li>
          <?php } ?>
          <li>
            <a href="../../landingpage/logout.php">Logout</a>
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
          <h1 class="text-center">Form Pendaftaran Kartu Kuning</h1>
          <div class="row latest-job margin-top-50 margin-bottom-20 bg-white" style="padding-left: 35px; padding-right: 35px; padding-top: 35px; padding-bottom: 35px">
            <form method="POST" id="registerKartuKuning" action="addkartukuning.php" enctype="multipart/form-data">
               
                  <div class="col-md-12 latest-job margin-bottom-20 ">
                  <h3 class="margin-bottom-20">Dokumen dan Tanggal Pendaftaran</h3>
                    <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                          <label>Tanggal Pendaftaran</label>
                          <input class="form-control input-lg" type="date" id="tgl_daftar" name="tgl_daftar" placeholder="Tanggal Pendaftaran">
                      </div>    
                    </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group mt-4">
                          <label class="mb-2">Foto Pribadi (3 X 4)</label></br>
                          <input type="file" name="ft_pribadi" required>
                      </div>
                      <?php if(isset($_SESSION['uploadError'])) { ?>
                        <div class="form-group">
                            <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
                        </div>
                        <?php unset($_SESSION['uploadError']); } ?> 
                    </div>

                    <div class="col-md-3">
                      <div class="form-group mt-4">
                          <label class="mb-2">Foto Ijazah Terakhir</label></br>
                          <input type="file" name="ft_ijazah" required>
                      </div>
                      <?php if(isset($_SESSION['uploadError'])) { ?>
                        <div class="form-group">
                            <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
                        </div>
                        <?php unset($_SESSION['uploadError']); } ?>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group mt-4">
                          <label class="mb-2">Foto KTP atau SIM</label></br>
                          <input type="file" name="ft_ktp" required>
                      </div>
                      <?php if(isset($_SESSION['uploadError'])) { ?>
                        <div class="form-group">
                            <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
                        </div>
                        <?php unset($_SESSION['uploadError']); } ?>   
                    </div>

                    <div class="col-md-3 margin-bottom-20">
                      <div class="form-group mt-4">
                          <label class="mb-2">Foto Akte Kelahiran</label></br>
                          <input type="file" name="ft_akte" required>
                      </div>
                      <?php if(isset($_SESSION['uploadError'])) { ?>
                        <div class="form-group">
                            <label style="color: red;"><?php echo $_SESSION['uploadError']; ?></label>
                        </div>
                        <?php unset($_SESSION['uploadError']); } ?> 
                    </div>
               
                    <h3 class="text-center margin-bottom-20">Keterangan</h3>
                    <!-- Kiri -->
                    <div class="col-md-6 latest-job ">
                    <div class="form-group">
                      <label>NIK</label>
                        <input class="form-control input-lg" type="number" id="nik" name="nik" placeholder="NIK" required>
                      </div>
                     
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control input-lg" type="date" id="dob" name="dob" placeholder="Tanggal Lahir" required>
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control input-lg" type="text" id="tmpt_lahir" name="tmpt_lahir" placeholder="Tempat Lahir" required>
                      </div>
                      <div class="form-group">
                        <label>Umur</label>
                        <input class="form-control input-lg" type="number" id="umur" name="umur" placeholder="Umur" required>                        
                      </div>

                              
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control input-lg" id="gender" name="gender" required>
                          <option selected="" value="">Pilih Jenis Kelamin</option>
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control input-lg" id="agama" name="agama" required>
                          <option selected="" value="">Pilih Agama</option>
                          <option value="Islam">Islam</option>
                          <option value="Buddha">Buddha</option>
                          <option value="Protestan">Protestant</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Konghuchu">Konghuchu</option>
                          <option value="Lainnya">Lainnya</option>
                          <!-- Kalo bisa disuruh isi kalau pilihannya Lainnya -->
                        </select>
                      </div>
                    </div>
                    <!-- End Kiri -->

                    <!-- Kanan -->
                    <div class="col-md-6 latest-job ">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input class="form-control input-lg" type="text" id="fname" name="fname" placeholder="Nama Lengkap" required>
                      </div>
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

                      <div id="kelurahanDesaDiv" class="form-group">
                          <label>Asal Desa / Kelurahan</label>
                          <input class="form-control input-lg" type="text" id="kelurahan_desa" name="kelurahan_desa" placeholder="Desa / Kelurahan" required> 
                      </div>


                      <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <br>
                        <textarea class="form-control input-lg" rows="4" name="alamat" placeholder="Alamat Lengkap Pendaftar"></textarea>
                      </div>      
                    </div>
                    <!-- End Kanan -->
               
                  <div class="col-md-12 latest-job ">
                    <!-- <h3 class="text-center margin-bottom-20">Keterangan [2]</h3>                -->
                  </div>
                  <div class="col-md-6 latest-job ">
                    <div class="form-group">
                        <label>Kewarganegaraan</label>
                        <select class="form-control input-lg" id="kwg" name="kwg" required>
                          <option selected="" value="">Pilih Kewarganegaran</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Asing">Asing</option>
                        </select>
                    </div>
                    <div class="form-group"> 
                        <label>Tinggi Badan</label>
                        <input class="form-control input-lg" type="number" id="tinggi" name="tinggi" placeholder="Tinggi Badan" required>                                 
                      </div>
                      <div class="form-group"> 
                        <label>Berat Badan</label>
                        <input class="form-control input-lg" type="number" id="berat" name="berat" placeholder="Berat Badan" required>                                 
                      </div>
                      <div class="form-group">
                        <label>Status Perkawinan</label>
                        <select class="form-control input-lg" id="status" name="status" required>
                          <option value="">Pilih Status Perkawinan</option>
                          <option value="Belum Kawin">Belum Kawin</option>
                          <option value="Kawin">Kawin</option>
                          <option value="Janda">Janda</option>
                          <option value="Duda">Duda</option>
                        </select>
                      </div>
                  </div>

                  <div class="col-md-6 latest-job ">
                    <div class="form-group">
                        <label>Cacat Badan</label>
                          <select class="form-control input-lg" id="yn_cacat" name="yn_cacat" required>
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="Ada">Ada</option>
                          </select>                             
                      </div>
                      <!-- keluar kalo cacat Ada -->
                      <div class="form-group">
                        <input class="form-control input-lg" type="text" id="desc_cacat" name="desc_cacat" placeholder="Deskripsi Cacat Badan" required>
                      </div>

                      <div class="form-group">
                        <label>Cacat Lainnya</label>
                          <select class="form-control input-lg" id="yn_cacatlain" name="yn_cacatlain" required>
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="Ada">Ada</option>
                          </select>                             
                      </div>
                      <!-- keluar kalo cacat Ada -->
                      <div class="form-group">
                        <input class="form-control input-lg" type="text" id="desc_cacatlain" name="desc_cacatlain" placeholder="Deskripsi Cacat Lainnya" required>
                      </div>
                      <div class="form-group">
                        <label>Penghasil?</label>
                        <select class="form-control input-lg" id="penghasil" name="penghasil" required>
                          <option value="Ya">Ya</option>
                          <option value="Tidak">Tidak</option>
                        </select>
                      </div>
                  </div>        
                      
                  <div class="col-md-12 latest-job ">
                    <h3 class="text-center margin-bottom-20">Pendidikan Formal</h3>               
                  </div>
                    
                  <div class="col-md-12 latest-job">
                    <p><b>*Jika anda tidak menempuh pendidikan yang dimaksud harap kosongi form tersebut</b></p>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">Tidak Tamat/SD Sampai Kelas</div>
                        <div class="col-md-6">
                          <input class="form-control input-lg" type="text" id="tidak_tamat" name="tidak_tamat" placeholder="Kelas terakhir">
                        </div>
                        <div class="col-md-3">
                          <div class="row">
                            <div class="col-md-2">
                              <span>Th.</span>
                            </div>
                            <div class="col-md-10">    
                              <input class="form-control input-lg" type="number" id="thn_tidak_tamat" name="thn_tidak_tamat" placeholder="Tahun Pendidikan">
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">SD/Sederajat</div>
                        <div class="col-md-6">
                          <input class="form-control input-lg" type="text" id="sd" name="sd" placeholder="Nama Instansi">
                        </div>
                        <div class="col-md-3">
                          <div class="row">
                            <div class="col-md-2">
                              <span>Th.</span>
                            </div>
                            <div class="col-md-10">    
                              <input class="form-control input-lg" type="number" id="thn_sd" name="thn_sd" placeholder="Tahun Pendidikan">
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">SMP/Sederajat</div>
                        <div class="col-md-6">
                          <input class="form-control input-lg" type="text" id="smp" name="smp" placeholder="Nama Instansi">
                        </div>
                        <div class="col-md-3">
                          <div class="row">
                            <div class="col-md-2">
                              <span>Th.</span>
                            </div>
                            <div class="col-md-10">    
                              <input class="form-control input-lg" type="number" id="thn_smp" name="thn_smp" placeholder="Tahun Pendidikan">
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">SMA/D.I/AKTA I</div> 
                        <div class="col-md-6">
                          <input class="form-control input-lg" type="text" id="sma" name="sma" placeholder="Nama Instansi">
                        </div>
                        <div class="col-md-3">
                          <div class="row">
                            <div class="col-md-2">
                              <span>Th.</span>
                            </div>
                            <div class="col-md-10">    
                              <input class="form-control input-lg" type="number" id="thn_sma" name="thn_sma" placeholder="Tahun Pendidikan">
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">SM/D.II/D.III</div>
                        <div class="col-md-6">
                          <input class="form-control input-lg" type="text" id="sm" name="sm" placeholder="Nama Instansi">
                        </div>
                        <div class="col-md-3">
                          <div class="row">
                            <div class="col-md-2">
                              <span>Th.</span>
                            </div>
                            <div class="col-md-10">    
                              <input class="form-control input-lg" type="number" id="thn_sm" name="thn_sm" placeholder="Tahun Pendidikan">
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">AKTA II</div>
                        <div class="col-md-6">
                          <input class="form-control input-lg" type="text" id="akta_dua" name="akta_dua" placeholder="Nama Instansi">
                        </div>
                        <div class="col-md-3">
                          <div class="row">
                            <div class="col-md-2">
                              <span>Th.</span>
                            </div>
                            <div class="col-md-10">    
                              <input class="form-control input-lg" type="number" id="thn_akta_dua" name="thn_akta_dua" placeholder="Tahun Pendidikan">
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">AKTA III</div>
                        <div class="col-md-6">
                          <input class="form-control input-lg" type="text" id="akta_tiga" name="akta_tiga" placeholder="Nama Instansi">
                        </div>
                        <div class="col-md-3">
                          <div class="row">
                            <div class="col-md-2">
                              <span>Th.</span>
                            </div>
                            <div class="col-md-10">    
                              <input class="form-control input-lg" type="number" id="thn_akta_tiga" name="thn_akta_tiga" placeholder="Tahun Pendidikan">
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">S/PASCA/S.I/AKTA IV/D.IV</div>
                        <div class="col-md-6">
                          <input class="form-control input-lg" type="text" id="sarjana" name="sarjana" placeholder="Nama Instansi">
                        </div>
                        <div class="col-md-3">
                          <div class="row">
                            <div class="col-md-2">
                              <span>Th.</span>
                            </div>
                            <div class="col-md-10">    
                              <input class="form-control input-lg" type="number" id="thn_sarjana" name="thn_sarjana" placeholder="Tahun Pendidikan">
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">DOKTOR/S.II/AKTA V</div>
                        <div class="col-md-6">
                          <input class="form-control input-lg" type="text" id="doktor" name="doktor" placeholder="Nama Instansi">
                        </div>
                        <div class="col-md-3">
                          <div class="row">
                            <div class="col-md-2">
                              <span>Th.</span>
                            </div>
                            <div class="col-md-10">    
                              <input class="form-control input-lg" type="number" id="thn_doktor" name="thn_doktor" placeholder="Tahun Pendidikan">
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12 latest-job ">
                    <h3 class="text-center margin-bottom-20">Pendidikan Non Formal</h3>               
                  </div>

                  <div class="col-md-12 latest-job ">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Penyelenggara Pendidikan Non Formal Formal 1 (Jika Ada)</label>
                            <select class="form-control input-lg" id="kursus1" name="kursus[]" required>
                              <option value="Tidak Ada">Tidak Ada</option>
                              <option value="Departemen Tenaga Kerja">Departemen Tenaga Kerja</option>
                              <option value="Instansi Pemerintahan Lainnya">Instansi Pemerintahan Lainnya</option>
                              <option value="Perusahaan">Perusahaan</option>
                              <option value="Lembaga Pendidikan Swasta">Lembaga Pendidikan Swasta</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Lama Mengikuti Kursus (bulan)</label>
                          <input class="form-control input-lg" type="number" id="lama_kursus1" name="lama_kursus[]" placeholder="Lama Kursus" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Tahun Kursus</label>
                          <input class="form-control input-lg" type="number" id="thn_kursus1" name="thn_kursus[]" placeholder="Tahun" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Penyelenggara Pendidikan Non Formal Formal 2 (Jika Ada)</label>
                            <select class="form-control input-lg" id="kursus2" name="kursus[]" required>
                              <option value="Tidak Ada">Tidak Ada</option>
                              <option value="Departemen Tenaga Kerja">Departemen Tenaga Kerja</option>
                              <option value="Instansi Pemerintahan Lainnya">Instansi Pemerintahan Lainnya</option>
                              <option value="Perusahaan">Perusahaan</option>
                              <option value="Lembaga Pendidikan Swasta">Lembaga Pendidikan Swasta</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Lama Mengikuti Kursus (bulan)</label>
                          <input class="form-control input-lg" type="number" id="lama_kursus2" name="lama_kursus[]" placeholder="Lama Kursus" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Tahun Kursus</label>
                          <input class="form-control input-lg" type="number" id="thn_kursus2" name="thn_kursus[]" placeholder="Tahun" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Penyelenggara Pendidikan Non Formal Formal 3 (Jika Ada)</label>
                            <select class="form-control input-lg" id="kursus3" name="kursus[]" required>
                              <option value="Tidak Ada">Tidak Ada</option>
                              <option value="Departemen Tenaga Kerja">Departemen Tenaga Kerja</option>
                              <option value="Instansi Pemerintahan Lainnya">Instansi Pemerintahan Lainnya</option>
                              <option value="Perusahaan">Perusahaan</option>
                              <option value="Lembaga Pendidikan Swasta">Lembaga Pendidikan Swasta</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Lama Mengikuti Kursus (bulan)</label>
                          <input class="form-control input-lg" type="number" id="lama_kursus3" name="lama_kursus[]" placeholder="Lama Kursus" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label>Tahun Kursus</label>
                          <input class="form-control input-lg" type="number" id="thn_kursus3" name="thn_kursus[]" placeholder="Tahun" required>
                        </div>
                      </div>
                    </div>
                  </div>
                    <!-- <div class="form-group">
                        <label>Pendidikan Formal Terakhir</label>
                          <select class="form-control input-lg" id="pendidikan" name="pendidikan" required>
                            <option value="Tidak Ada">Tidak Ada</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Instansi Pendidikan Formal</label>
                        <input class="form-control input-lg" type="text" id="desc_pendidikan" name="desc_pendidikan" placeholder="Instansi Pendidikan" required>
                        <p style="text-size: 11pt">* Harap Masukkan Program Pendidikan dan Instansi Pendidikan (Contoh: Desain Interior Institut Seni Indonesia</p>
                      </div> -->
                  <!-- Keahlian -->

                  <div class="col-md-12 latest-job ">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Keahlian Yang Dimilik</label>
                              <div name="add_skill" id="add_skill">
                                    <table class="table table-bordered" id="dynamic_field">
                                      <tr>
                                        <td><input class="form-control skill_list" type="text" name="skill[]" id="skill" placeholder="Masukkan Keahlian Yang Dimilik" required/></td>
                                        <td><button class="btn btn-success" name="add" id="add" type="button">Tambah Skill</button></td>
                                      </tr>
                                    </table>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Bahasa yang Dikuasai</label><br>
                              <input type="checkbox" id="b_indo" name="bahasa[]" value="Indonesia "> Indonesia &emsp;
                              <input type="checkbox" id="b_inggris" name="bahasa[]" value="Inggris "> Inggris &emsp;
                              <input type="checkbox" id="b_arab" name="bahasa[]" value="Arab "> Arab &emsp;
                              <input type="checkbox" id="b_arab" name="bahasa[]" value="Jerman "> Jerman &emsp;
                              <input type="checkbox" id="b_belanda" name="bahasa[]" value="Belanda "> Belanda &emsp; <br>
                              <input type="checkbox" id="b_perancis" name="bahasa[]" value="Perancis "> Perancis &emsp;
                              <input type="checkbox" id="b_cina" name="bahasa[]" value="Cina "> Cina &emsp;
                              <input type="checkbox" id="b_jepang" name="bahasa[]" value="Jepang "> Jepang &emsp;
                              <input type="checkbox" id="b_korea" name="bahasa[]" value="Korea "> Korea &emsp;
                              <input type="checkbox" id="b_lainnya" name="bahasa[]" value="Lainnya "> Lainnya &emsp;
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group mt-4">
                                <label class="mb-2">File Sertifikat (*.zip, *.rar)</label></br>
                                <input type="file" name="file_sertifikat" required>
                            </div>
                            <?php if(isset($_SESSION['uploadErrorSertifikat'])) { ?>
                              <div class="form-group">
                                  <label style="color: red;"><?php echo $_SESSION['uploadErrorSertifikat']; ?></label>
                              </div>
                              <?php unset($_SESSION['uploadErrorSertifikat']); } ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  <!-- Akhir Kanan -->
                
                  <div class="col-md-12 latest-job ">
                    <h3 class="text-center margin-bottom-20">Pekerjaan Sekarang</h3>
                    
                    <div class="form-group">
                        <label>Pekerjaan Sekarang</label>
                          <select class="form-control input-lg" id="pkj_sekarang" name="pkj_sekarang" required>
                            <option value="">Pilih Pekerjaan Sekarang</option>
                            <option value="Bekerja">Bekerja</option>
                            <option value="Sekolah">Sekolah</option>
                            <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                            <option value="Mencari Pekerjaan">Mencari Pekerjaan</option>
                            <option value="Menerima Pendapatan">Menerima Pendapatan</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>
                      </div>
                  </div>
                    
                  <h3 class="text-center margin-bottom-20" id="lbl_jabatan">Terdaftar dalam Jabatan</h3>

                  <div class="col-md-12 latest-job ">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group" id="lbl_pkj_pokok">
                          <label>Pekerjaan Pokok</label>
                          <input class="form-control input-lg" type="text" id="pkj_pokok" name="pkj_pokok" placeholder="Pekerjaan Pokok" required>
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group" id="lbl_pkj_sampingan">
                          <label>Pekerjaan Sampingan</label>
                          <input class="form-control input-lg" type="text" id="pkj_sampingan" name="pkj_sampingan" placeholder="Pekerjaan Sampingan">
                        </div> 
                      </div>
                    </div>
                  </div>
                
                  <div class="col-md-12 latest-job ">
                    <h3 class="text-center margin-bottom-20">Riwayat Pekerjaan</h3>
                    <div class="form-group">
                      <label>Apakah anda sebelumnya pernah bekerja?</label>
                          <select class="form-control input-lg" id="pernah_kerja" name="pernah_kerja" required>
                            <option value="tidak">Tidak</option>
                            <option value="iya">Iya</option>
                          </select>
                    </div>
                    <p class="text-center" id="lbl_info_riwayat"><i>Sebutkan 2(dua) pengalaman pekerjaan yang paling penting dan paling lama yang pernah Anda kerjakan.</i></p>
                    <div class="col-md-6 latest-job" id="lbl_pekerjaan1">
                      <h4><b>Pekerjaan 1</b></h4>
                      <div class="form-group">
                        <!-- <label>Jenis Lapangan Usaha</label> -->
                        <input class="form-control input-lg" type="text" id="kerja1" name="kerja1" placeholder="Jenis Lapangan Usaha" required>
                      </div> 
                      <div class="form-group">
                        <!-- <label>Jabatan</label> -->
                        <input class="form-control input-lg" type="text" id="jabatan1" name="jabatan1" placeholder="Jabatan" required>
                      </div>
                      <div class="form-group">
                        <!-- <label>Jabatan</label> -->
                        <input class="form-control input-lg" type="number" id="lama1" name="lama1" placeholder="Lamanya Bekerja (Bulan)" required>
                      </div>
                      <div class="form-group">
                        <!-- <label>Jabatan</label> -->
                        <input class="form-control input-lg" type="number" id="upah1" name="upah1" placeholder="Upah yang Diterima" required>
                      </div>
                      <div class="form-group">
                        <label>Alasan Keluar</label>
                        <select class="form-control input-lg" id="alasan1" name="alasan1" required>
                          <option value="">Alasan Keluar</option>
                          <option value="Permintaan Sendiri">Permintaan Sendiri</option>
                          <option value="Gangguan Kesehatan">Gangguan Kesehatan</option>
                          <option value="Upah Rendah">Upah Rendah</option>
                          <option value="Pengurangan Pegawai">Pengurangan Pegawai</option>
                          <option value="Pekerjaan Telah Selesai">Pekerjaan Telah Selesai</option>
                          <option value="Pekerjaan tak Sesuai">Pekerjaan tak Sesuai</option>
                          <option value="Waktu Kerja tak Sesuai">Waktu Kerja tak Sesuai</option>
                          <option value="Tempat Kerja Terlalu Jauh">Tempat Kerja Terlalu Jauh</option>
                          <option value="Perusahaan Tutup">Perusahaan Tutup</option>
                        </select>
                      </div>
                    </div>  
                    <div class="col-md-6 latest-job" id="lbl_pekerjaan2">
                      <h4><b>Pekerjaan 2</b></h4>
                      <div class="form-group">
                        <!-- <label>Jenis Lapangan Usaha</label> -->
                        <input class="form-control input-lg" type="text" id="kerja2" name="kerja2" placeholder="Jenis Lapangan Usaha">
                      </div> 
                      <div class="form-group">
                        <!-- <label>Jabatan</label> -->
                        <input class="form-control input-lg" type="text" id="jabatan2" name="jabatan2" placeholder="Jabatan">
                      </div>
                      <div class="form-group">
                        <!-- <label>Jabatan</label> -->
                        <input class="form-control input-lg" type="number" id="lama2" name="lama2" placeholder="Lamanya Bekerja (Bulan)">
                      </div>
                      <div class="form-group">
                        <!-- <label>Jabatan</label> -->
                        <input class="form-control input-lg" type="number" id="upah2" name="upah2" placeholder="Upah yang Diterima">
                      </div>
                      <div class="form-group">
                        <label>Alasan Keluar</label>
                        <select class="form-control input-lg" id="alasan2" name="alasan2">
                          <option value="">Alasan Keluar</option>
                          <option value="Permintaan Sendiri">Permintaan Sendiri</option>
                          <option value="Gangguan Kesehatan">Gangguan Kesehatan</option>
                          <option value="Upah Rendah">Upah Rendah</option>
                          <option value="Pengurangan Pegawai">Pengurangan Pegawai</option>
                          <option value="Pekerjaan Telah Selesai">Pekerjaan Telah Selesai</option>
                          <option value="Pekerjaan tak Sesuai">Pekerjaan tak Sesuai</option>
                          <option value="Waktu Kerja tak Sesuai">Waktu Kerja tak Sesuai</option>
                          <option value="Tempat Kerja Terlalu Jauh">Tempat Kerja Terlalu Jauh</option>
                          <option value="Perusahaan Tutup">Perusahaan Tutup</option>
                        </select>
                      </div>
                    </div>                    
                  </div>

                  <div class="col-md-12 latest-job ">
                    <h3 class="text-center margin-bottom-20">Pekerjaan yang Diinginkan</h3>
                    <p class="text-center"><i>Tuliskan kriteria pekerjaan yang diharapkan.</i></p>
                    <div class="col-md-6 latest-job ">
                      <div class="form-group">
                        <label>Jabatan</label>
                        <input class="form-control input-lg" type="text" id="ingin_jabatan" name="ingin_jabatan" placeholder="Jabatan yang Diinginkan" required>
                      </div>
                      <div class="form-group">
                        <label>Penempatan Kerja</label>
                        <select class="form-control input-lg" id="penempatan" name="penempatan" required>
                          <option value="">Pilih Penempatan Kerja yang Diinginkan</option>
                          <option value="Wilayah Tempat Pendaftaran">Wilayah Tempat Pendaftaran</option>
                          <option value="Di Luar Daerah">Di Luar Daerah</option>
                          <option value="Di Luar Negeri">Di Luar Negeri</option>
                          <option value="Di Mana Saja">Di Mana Saja</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Bersedia Menerima Upah</label>
                        <select class="form-control input-lg" id="bersedia_upah" name="bersedia_upah" required>
                          <option value="">Waktu Menerima Upah</option>
                          <option value="Borongan">Borongan</option>
                          <option value="Mingguan">Mingguan</option>
                          <option value="Harian">Harian</option>
                          <option value="Bulanan">Bulanan</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 latest-job ">
                    <div class="form-group">
                        <label>Upah yang Diinginkan</label>
                        <input class="form-control input-lg" type="number" id="ingin_upah" name="ingin_upah" placeholder="Upah yang Diinginkan" required>
                      </div>
                      <div class="form-group">
                        <label>Bersedia Ditempatkan untuk Waktu</label>
                        <select class="form-control input-lg" id="bersedia_waktu" name="bersedia_waktu" required>
                          <option value="">Waktu Penempatan</option>
                          <option value="Jangka Pendek/Kontrak">Jangka Pendek/Kontrak</option>
                          <option value="Jangka Panjang/Tetap">Jangka Panjang/Tetap</option>
                        </select>
                      </div>
                    </div>
                  </div>
               
                  <div class="col-md-12 latest-job">
                    <h3 class="text-center margin-bottom-20">Keadaan Pencari Kerja</h3>
                    <div class="form-group">
                      <select class="form-control input-lg" id="keadaan" name="keadaan" required>
                        <option value="">Keadaan Pencari kerja</option>
                        <option value="Telah Ditempatkan">Telah Ditempatkan</option>
                        <option value="Telah Dihapuskan">Telah Dihapuskan</option>
                      </select>
                    </div>
                  </div>
                    
                  
                  <div class="col-md-12 latest-job">
                  <div style="overflow: auto;">
                    <div style="float: right;">    
                      <button class="btn btn-flat btn-success" type="submit" name="submit" id="submit">Kirim</button>
                    </div>
                    </div>
                </div>
                <!-- End of 9th Tab -->

              <!-- Circles which indicates the steps of the form: -->
              
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

<script>
  $('#desc_cacat').prop('disabled', true);
  $('#desc_cacatlain').prop('disabled', true);
  $('#lama_kursus1').prop('disabled', true);
  $('#thn_kursus1').prop('disabled', true);
  $('#lama_kursus2').prop('disabled', true);
  $('#thn_kursus2').prop('disabled', true);
  $('#lama_kursus3').prop('disabled', true);
  $('#thn_kursus3').prop('disabled', true);
  $('#jabatan2').prop('disabled', true);
  $('#lama2').prop('disabled', true);
  $('#upah2').prop('disabled', true);
  $('#alasan2').prop('disabled', true);

  // pekerjaan
  kerja_sekarang();
  riwayatKerja();

  $(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
      i++;
      $('#dynamic_field').append('<tr id="row'+i+'"><td><input class="form-control skill_list" type="text" name="skill[]" id="skill" placeholder="Masukkan Keahlian Yang Dimilik" required/></td><td><button class="btn btn-danger btn_remove" type="button" name="remove" id="'+i+'">X</button></td></tr>');
    });
    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row'+button_id+'').remove();
    });
  });

  $(document).on('input', '#kerja2', function(e) {
    var val = $(this).val()
    if (val.length === 0) {
      $('#jabatan2').prop('disabled', true);
      $('#lama2').prop('disabled', true);
      $('#upah2').prop('disabled', true);
      $('#alasan2').prop('disabled', true);
    } else{
      $('#jabatan2').prop('disabled', false);
      $('#lama2').prop('disabled', false);
      $('#upah2').prop('disabled', false);
      $('#alasan2').prop('disabled', false);
      $('#jabatan2').prop('required', true);
      $('#lama2').prop('required', true);
      $('#upah2').prop('required', true);
      $('#alasan2').prop('required', true);
    }
  })

  $(document).on('change', '#yn_cacat', function(e) {
      var cacatBadan = this.options[e.target.selectedIndex].text;

      if (cacatBadan === "Tidak Ada") {
        $('#desc_cacat').prop('disabled', true);
      }else {
        $('#desc_cacat').prop('disabled', false);
      }
  });

  $(document).on('change', '#yn_cacatlain', function(e) {
      var cacatLain = this.options[e.target.selectedIndex].text;
      
      if (cacatLain === "Tidak Ada") {
        $('#desc_cacatlain').prop('disabled', true);
      }else {
        $('#desc_cacatlain').prop('disabled', false);
      }
  });

  $(document).on('change', '#pkj_sekarang', function(e) {
      var kerja = this.options[e.target.selectedIndex].text;
      
      if (kerja === "Bekerja") {
        $('#lbl_jabatan').show();
        $('#lbl_pkj_pokok').show();
        $('#lbl_pkj_sampingan').show();
        $('#pkj_pokok').prop('disabled', false);
        $('#pkj_sampingan').prop('disabled', false);
      }else {
        kerja_sekarang();
      }
  });

  $(document).on('change', '#pernah_kerja', function(e) {
      var pernahKerja = this.options[e.target.selectedIndex].text;
      
      if (pernahKerja === "Tidak") {
        riwayatKerja();
      }else {
        $('#lbl_info_riwayat').show();
        $('#lbl_pekerjaan1').show();
        $('#lbl_pekerjaan2').show();
        $('#kerja1').prop('disabled', false);
        $('#jabatan1').prop('disabled', false);
        $('#lama1').prop('disabled', false);
        $('#upah1').prop('disabled', false);
        $('#alasan1').prop('disabled', false);
      }
  });

  $(document).on('change', '#kursus1', function(e) {
      var kursus = this.options[e.target.selectedIndex].text;

      if (kursus === "Tidak Ada") {
        $('#lama_kursus1').prop('disabled', true);
        $('#thn_kursus1').prop('disabled', true);
      }else {
        $('#lama_kursus1').prop('disabled', false);
        $('#thn_kursus1').prop('disabled', false);
      }
  });

  $(document).on('change', '#kursus2', function(e) {
      var kursus = this.options[e.target.selectedIndex].text;

      if (kursus === "Tidak Ada") {
        $('#lama_kursus2').prop('disabled', true);
        $('#thn_kursus2').prop('disabled', true);
      }else {
        $('#lama_kursus2').prop('disabled', false);
        $('#thn_kursus2').prop('disabled', false);
      }
  });

  $(document).on('change', '#kursus3', function(e) {
      var kursus = this.options[e.target.selectedIndex].text;

      if (kursus === "Tidak Ada") {
        $('#lama_kursus3').prop('disabled', true);
        $('#thn_kursus3').prop('disabled', true);
      }else {
        $('#lama_kursus3').prop('disabled', false);
        $('#thn_kursus3').prop('disabled', false);
      }
  });
  
  $("#kelurahan-desa").on("change", function() {
    var id = $(this).find(':selected').attr("data-id");
    $("#kelurahan-desa").find('option:not(:first)').remove();
      $.post("kelurahan-desa.php", {id: id}).done(function(data) {
        $("#kelurahan-desa").append(data);
      });
  });

  function kerja_sekarang() {
    $('#lbl_jabatan').hide();
    $('#lbl_pkj_pokok').hide();
    $('#lbl_pkj_sampingan').hide();
    $('#pkj_pokok').prop('disabled', true);
    $('#pkj_sampingan').prop('disabled', true);  
  }

  function riwayatKerja() {
    $('#kerja1').prop('disabled', true);
    $('#jabatan1').prop('disabled', true);
    $('#lama1').prop('disabled', true);
    $('#upah1').prop('disabled', true);
    $('#alasan1').prop('disabled', true);
    $('#lbl_info_riwayat').hide();
    $('#lbl_pekerjaan1').hide();
    $('#lbl_pekerjaan2').hide();
  }
</script>

</body>
</html>
