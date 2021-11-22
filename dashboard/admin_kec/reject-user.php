<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
	exit();
}


require_once("../../landingpage/db.php");
$komentar = $_POST["komentar"];

if(isset($_GET)) {
	//Delete Company using id and redirect
	$sql = "UPDATE users SET active='0', komentar='$komentar' WHERE id_user='$_GET[id]'";
	
	if($conn->query($sql)) {
		header("Location: list-pencaker.php");
		exit();
	} else {
		echo "Error";
	}
}