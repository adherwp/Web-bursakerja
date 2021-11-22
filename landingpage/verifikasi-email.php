<?php
// include 'config.php';
require_once("db.php");
if(!empty($_GET['code']) && isset($_GET['code']))
{
    $code=$_GET['code'];
    $sql="SELECT * FROM users WHERE activation_code='$code'";
    // mysqli_query($conn, $sql);
    $result = $conn->query($sql);
    // $num=mysqli_fetch_assoc($sql);
    $row = $result->fetch_assoc();
    // echo $sql;
    // echo $row;
    // die();
    if($row>0){
        $st=3;
        $sql1 = "SELECT id_user FROM users WHERE activation_code='$code' and active='$st'";
        // mysqli_query($conn, $result);
        $result1 = $conn->query($sql1);
        // $result4=mysqli_fetch_array($result);
        $row1 = $result1->fetch_assoc();
        // echo $row1;
    //     echo $result1;
    //     echo $sql1;
    // die();

        if($row1>0){
            $st=2;
            $sqlaktif="UPDATE users SET active='$st' WHERE activation_code='$code'";
            mysqli_query($conn, $sqlaktif);
            $msg="Akun anda telah aktif";
            header("Location: halaman-verifikasi.php?code=$msg");
            exit();
            // http://localhost:81/PKL/BursaKerja/landingpage/verifikasi-email.php?code=$activationcode
        }
        else{
            $msg ="Akun anda sudah aktif, tidak diperlukan aktivasi lagi";
            header("Location: halaman-verifikasi.php?code=$msg");
            exit();
        }
    }
    else{
        $msg ="Aktivasi kode salah.";
        header("Location: halaman-verifikasi.php?code=$msg");
        exit();
    }
}else{
    $msg ="Email tidak terdaftar";
    header("Location: halaman-verifikasi.php?code=$msg");
    exit();
}
?>