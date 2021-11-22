<?php

//To Handle Session Variables on This Page
session_start();
require_once("../../landingpage/db.php");

$id_user = $_SESSION['id_user'];

$nomer = 1;
$no_daftar = null;
$sqlTgl = 'SELECT tgl_pendaftaran FROM pencaker WHERE id = 1';
$resultTgl = mysqli_query($conn, $sqlTgl);
$rowTgl = mysqli_fetch_array($resultTgl);
$getYear = $rowTgl['tgl_pendaftaran'];
$year = date("Y", strtotime($getYear));
$today = strtotime('today');
$cvrtToday = date('Y', $today);

if ($year === $cvrtToday) {
	$no_daftar = $nomer;
}else {
	$hasil = $cvrtToday - $year;
	$no_daftar = $hasil;
}

// die('hai '.$no_daftar);

//Including Database Connection From db.php file to avoid rewriting in all files

//If user Actually clicked register button

	//Escape Special Characters In String First
	
	// $no_daftar = mysqli_real_escape_string($conn, $_POST['no_daftar']);
	$tgl_daftar = mysqli_real_escape_string($conn, $_POST['tgl_daftar']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$dob = mysqli_real_escape_string($conn, $_POST['dob']);
	$tmpt_lahir = mysqli_real_escape_string($conn, $_POST['tmpt_lahir']);
	$umur = mysqli_real_escape_string($conn, $_POST['umur']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);
	$agama = mysqli_real_escape_string($conn, $_POST['agama']);
	$kecamatan = mysqli_real_escape_string($conn, $_POST['kecamatan']);
	$kelurahandesa = mysqli_real_escape_string($conn, $_POST['kelurahan_desa']);
	$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
	$kwg = mysqli_real_escape_string($conn, $_POST['kwg']);
	$tinggi = mysqli_real_escape_string($conn, $_POST['tinggi']);
	$berat = mysqli_real_escape_string($conn, $_POST['berat']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$yn_cacat = mysqli_real_escape_string($conn, $_POST['yn_cacat']);
    $desc_cacat = mysqli_real_escape_string($conn, $_POST['desc_cacat']);
    $desc_cacatlain = mysqli_real_escape_string($conn, $_POST['desc_cacatlain']);
	$penghasil = mysqli_real_escape_string($conn, $_POST['penghasil']);
	
    $pendidikan = mysqli_real_escape_string($conn, $_POST['pendidikan']);
    $desc_pendidikan = mysqli_real_escape_string($conn, $_POST['desc_pendidikan']);
	
	$tidak_tamat = mysqli_real_escape_string($conn, $_POST['tidak_tamat']);
	$sd = mysqli_real_escape_string($conn, $_POST['sd']);
	$smp = mysqli_real_escape_string($conn, $_POST['smp']);
	$sma = mysqli_real_escape_string($conn, $_POST['sma']);
	$sm = mysqli_real_escape_string($conn, $_POST['sm']);
	$akta_dua = mysqli_real_escape_string($conn, $_POST['akta_dua']);
	$akta_tiga = mysqli_real_escape_string($conn, $_POST['akta_tiga']);
	$sarjana = mysqli_real_escape_string($conn, $_POST['sarjana']);
	$doktor = mysqli_real_escape_string($conn, $_POST['doktor']);
	
	$thn_tidak_tamat = mysqli_real_escape_string($conn, $_POST['thn_tidak_tamat']);
	$thn_sd = mysqli_real_escape_string($conn, $_POST['thn_sd']);
	$thn_smp = mysqli_real_escape_string($conn, $_POST['thn_smp']);
	$thn_sma = mysqli_real_escape_string($conn, $_POST['thn_sma']);
	$thn_sm = mysqli_real_escape_string($conn, $_POST['thn_sm']);
	$thn_akta_dua = mysqli_real_escape_string($conn, $_POST['thn_akta_dua']);
	$thn_akta_tiga = mysqli_real_escape_string($conn, $_POST['thn_akta_tiga']);
	$thn_sarjana = mysqli_real_escape_string($conn, $_POST['thn_sarjana']);
	$thn_doktor = mysqli_real_escape_string($conn, $_POST['thn_doktor']);
	
	// $bahasa = mysqli_real_escape_string($conn, $_POST['bahasa']);
    $desc_pd_nonformal = mysqli_real_escape_string($conn, $_POST['desc_pd_nonformal']);
    $kursus = mysqli_real_escape_string($conn, $_POST['kursus']);
	$lama_kursus = mysqli_real_escape_string($conn, $_POST['lama_kursus']);
    $pkj_sekarang = mysqli_real_escape_string($conn, $_POST['pkj_sekarang']);
    $pkj_pokok = mysqli_real_escape_string($conn, $_POST['pkj_pokok']);
    $pkj_sampingan = mysqli_real_escape_string($conn, $_POST['pkj_sampingan']);
	$kerja1 = mysqli_real_escape_string($conn, $_POST['kerja1']);
	$jabatan1 = mysqli_real_escape_string($conn, $_POST['jabatan1']);
    $lama1 = mysqli_real_escape_string($conn, $_POST['lama1']);
    $upah1 = mysqli_real_escape_string($conn, $_POST['upah1']);
    $alasan1 = mysqli_real_escape_string($conn, $_POST['alasan1']);
	$usaha2 = mysqli_real_escape_string($conn, $_POST['kerja2']);
	$jabatan2 = mysqli_real_escape_string($conn, $_POST['jabatan2']);
    $lama2 = mysqli_real_escape_string($conn, $_POST['lama2']);
    $upah2 = mysqli_real_escape_string($conn, $_POST['upah2']);
    $alasan2 = mysqli_real_escape_string($conn, $_POST['alasan2']);
    $ingin_jabatan = mysqli_real_escape_string($conn, $_POST['ingin_jabatan']);
    $penempatan = mysqli_real_escape_string($conn, $_POST['penempatan']);
    $bersedia_upah = mysqli_real_escape_string($conn, $_POST['bersedia_upah']);
    $ingin_upah = mysqli_real_escape_string($conn, $_POST['ingin_upah']);
    $bersedia_waktu = mysqli_real_escape_string($conn, $_POST['bersedia_waktu']);
	$keadaan = mysqli_real_escape_string($conn, $_POST['keadaan']);

	
	// cek antrian
	// $tanggalAntri = strtotime("today");
	// $timeAntri = date("Y-m-d", $tanggalAntri);
	$sqltes = "SELECT COUNT(id) AS coba FROM pencaker WHERE kecamatan = '$kecamatan' AND tgl_pendaftaran = '$tgl_daftar' ";
	$resultcount = $conn->query($sqltes);
    $hai = mysqli_fetch_array($resultcount);
	$tot = $hai['coba'];
	$daftar_antrian = 0;

	if($tot > 0)
	{
		$daftar_antrian = $tot + 1;
	}
	else
	{
		$daftar_antrian = 1;
	}

	// echo('kerja 1 '.$kerja1.' '.$jabatan1);
	// die('kerja 2 '.$kerja2.' '.$jabatan2);
	// die($lama_kursus);
	
	$nik = mysqli_real_escape_string($conn, $_POST['nik']);
	$penyelenggaraNonFormal = $_POST['kursus'];
	$totalPenyelenggaraNonFormal = count($_POST['kursus']);
	$lamaKursus = $_POST['lama_kursus'];
	$thnKursus = $_POST['thn_kursus'];
	
	$skill = $_POST['skill'];
	$number = count($_POST['skill']);
	$bahasa = $_POST['bahasa'];
	$totalBahasa = count($_POST['bahasa']);
	
	// die('woy '.$number);
	// echo($sarjana);
	// die($thn_sarjana);
	
	$code_sertifikat = $_FILES["file_sertifikat"]["error"];
	$code_pribadi = $_FILES["ft_pribadi"]["error"];
	$code_ijazah = $_FILES["ft_ijazah"]["error"];
	$code_ktp = $_FILES["ft_ktp"]["error"];
	$code_akte = $_FILES["ft_akte"]["error"];

	if ($code_sertifikat == 0) {
		$nama_folder_sertifikat = "sertifikat";
		$tmp_sertifikat = $_FILES["file_sertifikat"]["tmp_name"];
		$nama_file_sertifikat = basename($_FILES['file_sertifikat']['name']);
		$fileType_sertifikat = pathinfo($nama_file_sertifikat, PATHINFO_EXTENSION); 
		$random_name_sertifikat = uniqid().'.'.$fileType_sertifikat;
		$path_sertifikat = "../../uploads/$nama_folder_sertifikat/$random_name_sertifikat";
		$tipe_file_sertifikat = array("application/x-zip-compressed", "application/vnd.rar", "application/zip");
		
		// die($_FILES["file_sertifikat"]["type"]);
		if (!in_array($_FILES["file_sertifikat"]["type"], $tipe_file_sertifikat)) {
			$_SESSION['uploadErrorSertifikat'] ="Format file salah, hanya menerima zip dan rar";
			header("Location:register-kartukuning.php");
			die();
		}
		
		if($_FILES['file_sertifikat']['size'] < 3500000){
			move_uploaded_file($tmp_sertifikat, $path_sertifikat);
		}else {
			$_SESSION['uploadErrorSertifikat'] = "File terlalu besar. maksimal : 3.5 MB";
		}
	} elseif ($code_pribadi === 4) {
		echo "<script> alert('Gagal upload gambar'); window.location = 'register-kartukuning.php';</script>";
	}
	
	// die(' hai '.$code_pribadi);
	if ($code_pribadi == 0) {
		$nama_folder_pribadi = "foto_pribadi";
		$tmp_pribadi = $_FILES["ft_pribadi"]["tmp_name"];
		$nama_file_pribadi = basename($_FILES['ft_pribadi']['name']);
		$fileType_pribadi = pathinfo($nama_file_pribadi, PATHINFO_EXTENSION); 
		$random_name_pribadi = uniqid().'.'.$fileType_pribadi;
		$path_pribadi = "../../uploads/$nama_folder_pribadi/$random_name_pribadi";
		$tipe_file_pribadi = array("image/jpeg", "image/gif", "image/png");
		
		if (!in_array($_FILES["ft_pribadi"]["type"], $tipe_file_pribadi)) {
			$_SESSION['uploadError'] ="Format file salah, hanya menerima gambar";
			header("Location:register-kartukuning.php");
			die();
		}

		if($_FILES['ft_pribadi']['size'] < 500000){
			move_uploaded_file($tmp_pribadi, $path_pribadi);
		}else {
			$_SESSION['uploadError'] = "File terlalu besar. maksimal : 500 KB";
		}
	} elseif ($code_pribadi === 4) {
		echo "<script> alert('Gagal upload gambar'); window.location = 'register-kartukuning.php';</script>";
	}

	// Ijazah
	if ($code_ijazah == 0) {
		$nama_folder_ijazah = "ijazah";
		$tmp_ijazah = $_FILES["ft_ijazah"]["tmp_name"];
		$nama_file_ijazah = basename($_FILES['ft_ijazah']['name']);
		$fileType_ijazah = pathinfo($nama_file_ijazah, PATHINFO_EXTENSION); 
		$random_name_ijazah = uniqid().'.'.$fileType_ijazah;
		$path_ijazah = "../../uploads/$nama_folder_ijazah/$random_name_ijazah";
		$tipe_file_ijazah = array("image/jpeg", "image/gif", "image/png");
		
		if (!in_array($_FILES["ft_ijazah"]["type"], $tipe_file_ijazah)) {
			$_SESSION['uploadError'] ="Format file salah, hanya menerima gambar";
			header("Location:register-kartukuning.php");
			die();
		}

		if($_FILES['ft_ijazah']['size'] < 500000){
			move_uploaded_file($tmp_ijazah, $path_ijazah);
		}else {
			$_SESSION['uploadError'] = "File terlalu besar. maksimal : 500 KB";
		}
	} elseif ($code_ijazah === 4) {
		echo "<script> alert('Gagal upload gambar'); window.location = 'register-kartukuning.php';</script>";
	}

	// KTP
	if ($code_ktp == 0) {
		$nama_folder_ktp = "ktp";
		$tmp_ktp = $_FILES["ft_ktp"]["tmp_name"];
		$nama_file_ktp = basename($_FILES['ft_ktp']['name']);
		$fileType_ktp = pathinfo($nama_file_ktp, PATHINFO_EXTENSION); 
		$random_name_ktp = uniqid().'.'.$fileType_ktp;
		$path_ktp = "../../uploads/$nama_folder_ktp/$random_name_ktp";
		$tipe_file_ktp = array("image/jpeg", "image/gif", "image/png");
		
		if (!in_array($_FILES["ft_ktp"]["type"], $tipe_file_ktp)) {
			$_SESSION['uploadError'] ="Format file salah, hanya menerima gambar";
			header("Location:register-kartukuning.php");
			die();
		}
		
		if($_FILES['ft_ktp']['size'] < 500000){
			move_uploaded_file($tmp_ktp, $path_ktp);
		}else {
			$_SESSION['uploadError'] = "File terlalu besar. maksimal : 500 KB";
		}
	} elseif ($code_ktp === 4) {
		echo "<script> alert('Gagal upload gambar'); window.location = 'register-kartukuning.php';</script>";
	}
	
	// Akte
	if ($code_akte == 0) {
		$nama_folder_akte = "akte";
		$tmp_akte = $_FILES["ft_akte"]["tmp_name"];
		$nama_file_akte = basename($_FILES['ft_akte']['name']);
		$fileType_akte = pathinfo($nama_file_akte, PATHINFO_EXTENSION); 
		$random_name_akte = uniqid().'.'.$fileType_akte;
		$path_akte = "../../uploads/$nama_folder_akte/$random_name_akte";
		$tipe_file_akte = array("image/jpeg", "image/gif", "image/png");
		
		if (!in_array($_FILES["ft_akte"]["type"], $tipe_file_akte)) {
			$_SESSION['uploadError'] ="Format file salah, hanya menerima gambar";
			header("Location:register-kartukuning.php");
			die();
		}
		
		if($_FILES['ft_akte']['size'] < 500000){
			move_uploaded_file($tmp_akte, $path_akte);
		}else {
			$_SESSION['uploadError'] = "File terlalu besar. maksimal : 500 KB";
		}
	} elseif ($code_akte === 4) {
		echo "<script> alert('Gagal upload gambar'); window.location = 'register-kartukuning.php';</script>";
	}
	// die('cik '.$nama_file_akte);
	// $id_user = mysqli_real_escape_string($conn, $_GET['id']);
	// die();
	if(empty($lama_kursus)) $lama_kursus = 0;
	$pendidikann = $pendidikan . " " . $desc_pendidikan;
	
	
	//sql new registration insert query
		$sql = "INSERT INTO pencaker
				(nik, no_pendaftaran, tgl_pendaftaran, no_antrian, nama, tanggal_lahir, tmpt_lahir, jenis_kelamin, kecamatan, alamat, desa, agama, kewarganegaraan, tinggi_badan, berat_badan, cacat_badan, cacat_lainnya, status, penghasil, pd_formal,  penyelenggara, lama, bahasa, kerja_sekarang, j_kerja_pokok, j_kerja_sampingan, kerja1, jabatan1, lama1, upah1, alasan1, usaha2, jabatan2, lama2, upah2, alasan2, ingin_jabatan, penempatan, bersedia_upah, ingin_upah, bersedia_waktu, keadaan, pas_foto, ijazah, ktp, akte, sertifikat, id_user)
		 	VALUES ('$nik', '$no_daftar', '$tgl_daftar', '$daftar_antrian', '$fname', '$dob', '$tmpt_lahir', '$gender', '$kecamatan', '$alamat', '$kelurahandesa', '$agama', '$kwg', '$tinggi', '$berat', '$desc_cacat', '$desc_cacatlain', '$status', '$penghasil', '0', '$kursus', '$lama_kursus', '0', '$pkj_sekarang', '$pkj_pokok', '$pkj_sampingan','$kerja1','$jabatan1','$lama1','$upah1','$alasan1','$usaha2','$jabatan2','$lama2','$upah2','$alasan2','$ingin_jabatan','$penempatan','$bersedia_upah','$ingin_upah','$bersedia_waktu','$keadaan','$random_name_pribadi', '$random_name_ijazah', '$random_name_ktp', '$random_name_akte', '$random_name_sertifikat', '$id_user')";
		
		// $sql = "INSERT INTO pencaker
		// 		(nik, no_pendaftaran, tgl_pendaftaran, nama, tanggal_lahir, jenis_kelamin, kecamatan, alamat, desa, agama, kewarganegaraan, tinggi_badan, berat_badan, cacat_badan, cacat_lainnya, status, penghasil, pd_formal,  penyelenggara, lama, bahasa, kerja_sekarang, j_kerja_pokok, j_kerja_sampingan, kerja1, jabatan1, lama1, upah1, alasan1, usaha2, jabatan2, lama2, upah2, alasan2, ingin_jabatan, penempatan, bersedia_upah, ingin_upah, bersedia_waktu, keadaan, pas_foto, ijazah, ktp, akte,id_user)
		//  	VALUES ('$nik', '$no_daftar', '$tgl_daftar', '$fname', '$dob', '$gender', '$kecamatan', '$alamat', '$kelurahandesa', '$agama', '$kwg', '$tinggi', '$berat', '$desc_cacat', '$desc_cacatlain', '$status', '0', '0', '$kursus', '$lama_kursus', '0', '0', '0', '0','$kerja1','$jabatan1','$lama1','$upah1','$alasan1','$usaha2','$jabatan2','$lama2','$upah2','$alasan2','0','0','0','0','0','0','$random_name_pribadi', '$random_name_ijazah', '$random_name_ktp', '$random_name_akte', '$id_user')";

		// $sql = "INSERT INTO pencaker
		// 		(nik, no_pendaftaran, tgl_pendaftaran, nama, tanggal_lahir, jenis_kelamin, kecamatan, alamat, desa, agama, kewarganegaraan, tinggi_badan, berat_badan, cacat_badan, cacat_lainnya, status, penghasil, pd_formal,  penyelenggara, lama, bahasa, kerja_sekarang, j_kerja_pokok, j_kerja_sampingan, kerja1, jabatan1, lama1, upah1, alasan1, usaha2, jabatan2, lama2, upah2, alasan2, ingin_jabatan, penempatan, bersedia_upah, ingin_upah, bersedia_waktu, keadaan, pas_foto, ijazah, ktp, akte,id_user)
		//  VALUES ('0', '0', '$tgl_daftar', '0', '2019-12-19', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','$random_name_pribadi', '$random_name_ijazah', '$random_name_ktp', '$random_name_akte', '$id_user')"; 
		
		// $sql = "INSERT INTO pencaker (no_pendaftaran) VALUES ($tgl_daftar)'";
		
		if($conn->query($sql)===TRUE) {
			$current_id = $conn->insert_id;	
			
			$sql2 = "INSERT INTO pendidikan
					(tidak_tamat, sd, smp, sma, sm, akta_dua, akta_tiga, sarjana, doktor, thn_tidak_tamat, thn_sd, thn_smp, thn_sma, thn_sm, thn_akta_dua, thn_akta_tiga, thn_sarjana, thn_doktor, id_pencaker)
				VALUES ('$tidak_tamat','$sd','$smp','$sma','$sm','$akta_dua','$akta_tiga','$sarjana','$doktor','$thn_tidak_tamat','$thn_sd','$thn_smp','$thn_sma', '$thn_sm','$thn_akta_dua','$thn_akta_tiga','$thn_sarjana','$thn_doktor','$current_id')";
				
				// die('hai '.$sql2);
				if(mysqli_query($conn, $sql2)){
					// die("hai ".$number);
					if ($number >= 1) {
						for ($i=0; $i < $number; $i++) { 
							if (trim($skill[$i]) != '') {
								$sql1 = "INSERT INTO skill (skill, id_pencaker) VALUES ('".mysqli_real_escape_string($conn, $skill[$i])."','$current_id')";
								mysqli_query($conn, $sql1);
							}
						}
					}
					if ($totalBahasa >= 1) {
						for ($i=0; $i < $totalBahasa; $i++) { 
							if (trim($bahasa[$i]) != '') {
								$sqlBahasa = "INSERT INTO bahasa (bahasa, id_pencaker) VALUES ('".mysqli_real_escape_string($conn, $bahasa[$i])."','$current_id')";
								mysqli_query($conn, $sqlBahasa);
							}
						}
					}
					if ($totalPenyelenggaraNonFormal >= 1) {
						for ($i=0; $i < $totalPenyelenggaraNonFormal; $i++) { 
							if (trim($penyelenggaraNonFormal[$i]) != '') {
								$sqlNonFormal = "INSERT INTO pendidikan_non_formal (penyelenggara, lama_kursus, thn_kursus, id_pencaker) VALUES ('".mysqli_real_escape_string($conn, $penyelenggaraNonFormal[$i])."', '".mysqli_real_escape_string($conn, $lamaKursus[$i])."', '".mysqli_real_escape_string($conn, $thnKursus[$i])."','$current_id')";
								mysqli_query($conn, $sqlNonFormal);
							}
						}
					}
				}
				header("Location: daftar-pengajuan.php");
				exit();
			} 
		else {
			echo "Error " . $sql . "<br>" . $conn->error;
		}