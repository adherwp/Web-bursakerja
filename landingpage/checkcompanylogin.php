<?php

//To Handle Session Variables on This Page
session_start();

//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");

//If user Actually clicked login button 
if(isset($_POST)) {

	//Escape Special Characters in String
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	$secret_key = "6LfhR9YUAAAAAGpEp1bnd4XCMVKWvyigYkcxE0MW";

	//Encrypt Password
	$password = base64_encode(strrev(md5($password)));

	$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
	$response = json_decode($verify);
	if($response->success){ // Jika proses validasi captcha berhasil
		echo "<h2>Captcha Valid</h2>";
		echo "Yes, you're human (Anda adalah manusia)<hr>";
		echo "<b>Nama :</b><br>".$_POST['nama']."<br><br>";
		echo "<b>Email :</b><br>".$_POST['email']."<br><br>";
		echo "<b>Komentar :</b><br>".$_POST['komentar'];
	}else{ // Jika captcha tidak valid
		echo "<h2>Captcha Tidak Valid</h2>";
		echo "Ohh sorry, you're not human (Anda bukan manusia)<hr>";
		echo "Silahkan klik kotak I'm not robot (reCaptcha) untuk verifikasi";
	}
		

	//sql query to check company login
	$sql = "SELECT * FROM pengusaha WHERE email='$email' AND password='$password'";
	$result = $conn->query($sql);

	//if company table has this this login details
	if($result->num_rows > 0) {
		//output data
		while($row = $result->fetch_assoc()) {

			if($row['active'] == '2') {
				$_SESSION['companyLoginError'] = "Your Account Is Still Pending Approval.";
				header("Location: login.php");
				exit();
			} else if($row['active'] == '0') {
				$_SESSION['companyLoginError'] = "Your Account Is Rejected. Please Contact For More Info.";
				header("Location: login.php");
				exit();
			} else if($row['active'] == '1') {
				// active 1 means admin has approved account.
				//Set some session variables for easy reference
				$_SESSION['name'] = $row['companyname'];
				$_SESSION['id_pengusaha'] = $row['id_pengusaha'];
				$_SESSION['email'] = $row['email'];

				//Redirect them to company dashboard once logged in successfully
				header("Location: ../dashboard/umkm/index.php");
				exit();
			} else if($row['active'] == '3') {
				$_SESSION['companyLoginError'] = "Your Account Is Deactivated. Contact Admin For Reactivation.";
				header("Location: login.php");
				exit();
			}
		}
 	} else {
 		//if no matching record found in user table then redirect them back to login page
 		$_SESSION['loginError'] = $conn->error;
 		header("Location: login.php");
		exit();
 	}
	 
 	//Close database connection. Not compulsory but good practice.
 	$conn->close();

} else {
	//redirect them back to login page if they didn't click login button
	header("Location: login.php");
	exit();
}