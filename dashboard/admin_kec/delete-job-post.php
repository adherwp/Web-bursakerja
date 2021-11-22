<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../../landingpage/db.php");

if(isset($_GET)) {

	$sql = "DELETE FROM buat_lowongan WHERE id_jobpost='$_GET[id]'";
	if($conn->query($sql)) {
		$sql1 = "DELETE FROM lowongan WHERE id_jobpost='$_GET[id]'";
		if($conn->query($sql1)) {
		}
		header("Location: active-jobs.php");
		exit();
	} else {
		echo "Error";
	}
}