<?php

//To Handle Session Variables on This Page
session_start();

if(empty($_SESSION['id_pengusaha'])) {
  header("Location: ../../index.php");
  exit();
}
//Including Database Connection From db.php file to avoid rewriting in all files
require_once("../../landingpage/db.php");

//if user Actually clicked Add Post Button
if(isset($_POST)) {

 $stmt = $conn->prepare("INSERT INTO buat_artikel(id_company, id_berita, judul_berita, deskripsi, pict_article) VALUES (?,?, ?, ?, ?)");

 $stmt->bind_param("issss", $_SESSION['id_pengusaha'], $id_berita, $judul_berita,$deskripsi, $pict_article);

 $id_berita = mysqli_real_escape_string($conn, $_POST['id_berita']);
 $judul_berita = mysqli_real_escape_string($conn, $_POST['judul_berita']);
 $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
 $pict_article = mysqli_real_escape_string($conn, $_POST['pict_article']);


 if($stmt->execute()) {
  //If data Inserted successfully then redirect to dashboard
  $_SESSION['articlePostSuccess'] = true;
  header("Location: list-article.php");
  exit();
 } else {
  //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up :D
  echo "Error ";
 }

 $stmt->close();

 $conn->close();

} else {
 //redirect them back to dashboard page if they didn't click Add Post button
 header("Location: create-article.php");
 exit();
}