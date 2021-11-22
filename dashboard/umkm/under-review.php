<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
if(empty($_SESSION['id_pengusaha'])) {
  header("Location: ../../index.php");
  exit();
}

//Including Database Connection From db.php file to avoid rewriting in all files  
require_once("../../landingpage/db.php");

$sql = "SELECT * FROM lowongan WHERE id_company='$_GET[id_company]' AND id_user='$_GET[id]' AND id_jobpost='$_GET[id_jobpost]'";
$result = $conn->query($sql);
if($result->num_rows == 0) 
{
  header("Location: index.php");
  exit();
}


$sql = "UPDATE lowongan SET status='2' WHERE id_company='$_GET[id_company]' AND id_user='$_GET[id]' AND id_jobpost='$_GET[id_jobpost]'";
if($conn->query($sql) === TRUE) {
	header("Location: job-applications.php");
	exit();
}

?>