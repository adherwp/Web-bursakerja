<?php
require 'phpmailer/PHPMailerAutoload.php';
// include_once("config.php");
// if(isset($_POST['submit']))
// {
$name='joko';
$email='rahardhiyan56@gmail.com';
// $password=md5($_POST['password']);
$status=0;
$activationcode=md5($email.time());
// $query=mysqli_query($con,"insert into userregistration(name,email,password,activationcode,status) values('$name','$email','$password','$activationcode','$status')");
//  if($query)
//  {
$to=$email;
$msg= "Thanks for new Registration.";
$subject="Email verification (bursakerjamalang.com)";
$headers = "MIME-Version: 1.0"."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'From:bursakerjamalang | Programing Blog <info@phpgurukul.com>'."\r\n";
$ms="<html></body><div><div>Dear $name,</div></br></br>";
$ms.="<div style='padding-top:8px;'>Please click The following link For verifying and activation of your account</div>
<div style='padding-top:10px;'><a href='http://www.phpgurukul.com/demos/emailverify/email_verification.php?code=$activationcode'>Click Here</a></div>
<div style='padding-top:4px;'>Powered by <button style='background:red; border:none; color:white; padding: 15px 32px; text-align:center; text-decoration:none; display:inline-block;
'>click me</button></div></div>
</body></html>";
// mail($to,$subject,$ms,$headers);
echo "<script>alert('Registration successful, please verify in the registered Email-Id');</script>";
// echo "<script>window.location = 'login.php';</script>";;
// }
// else
// {
// echo "<script>alert('Data not inserted');</script>";
// }
// }

    // require 'phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;

    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->Port = 465;

    $mail->Username = 'adeadhe29@gmail.com';
    // harus dalam tanda kutip tunggal
    $mail->Password = '';
    $mail->SetFrom('adeadhe29@gmail.com', 'Disnaker Kabupaten Malang');

    $mail->AddAddress('rahardhiyan56@gmail.com');

    // $message = "percobaan";
    // $mail->MsgHTML($ms);

    $mail->Subject  = 'Verifikasi Email';
    // $mail->Body     = $ms;

    $mail->MsgHTML($ms);

    try {
        // kirim email
        $mail->Send();
        $msg = "Email berhasil dikirim";
    } catch (phpmailerException $e) {
        $msg = $e->getMessage();
    } catch (Exception $e) {
        $msg = $e->getMessage();
    }

    echo $msg;
    echo $activationcode;

    
    // ini_set( 'display_errors', 1 );
    // error_reporting( E_ALL );
    // $from = "adeadhe29@gmail.com";
    // $to = "rahardhiyan56@gmail.com";
    // $subject = "Checking PHP mail";
    // $message = "PHP mail works just fine";
    // $headers = "From:" . $from;
    // mail($to,$subject,$message, $headers);
    // echo "The email message was sent.";
?>
