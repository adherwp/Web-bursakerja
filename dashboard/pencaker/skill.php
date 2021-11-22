<?php
session_start();
require_once("../../landingpage/db.php");

$id_user = $_SESSION['id_user'];
$number = count($_POST['skill']);
$skill = $_POST['skill'];
die($skill);
if ($number > 1) {
    for ($i=0; $i < $number; $i++) { 
        if (trim($_POST["name"][$i]) != '') {
            $sql = "INSERT INTO skill (skill, id_pencaker) VALUES ('".mysqli_real_escape_string($conn, $skill[$i])."','$id_user')";
            if($conn->query($sql)===TRUE) {
				header("Location: daftar-pengajuan.php");
			    exit();
		    } 
		    else {
			    echo "Error " . $sql . "<br>" . $conn->error;
		    }
        }
    }
}
?>