<?php

session_start();

if(empty($_SESSION['id_pengusaha'])) {
  header("Location: index.php");
  exit();
}

require_once("../../landingpage/db.php");

if(isset($_GET)) {

 $sql = "DELETE FROM buat_artikel WHERE id_berita='$_GET[id]'";
 if($conn->query($sql)) {
  $sql1 = "DELETE FROM berita WHERE id_berita='$_GET[id]'";
  if($conn->query($sql1)) {
  }
  header("Location: list-article.php");
  exit();
 } else {
  echo "Error";
 }
}