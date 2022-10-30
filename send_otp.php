
<?php
session_start();
$con=mysqli_connect('localhost','root','','login');//Connect to Database where username='root',password='',and database='login'
$email=$_POST['email'];//Fetching data from email field
$res= mysqli_query( $con,"select * from user where email='$email'");//fetching data from table(user) where email='kahkashan25599@gmail.com'
$count=mysqli_num_rows($res);//count row
if($count>0){
    $otp=rand(111111,999999);//generate random 6 digits number
    mysqli_query($con,"update user set otp='$otp' where email='$email'");//update table with random OTP where email
    $html="your OTP verification code is ".$otp;
	$_SESSION['EMAIL']=$email;
    smtp_mailer($email,'OTP verification',$html);//use of SMTP mail

    echo 1;
}

else{
   echo 0;
}
function smtp_mailer($to,$subject, $msg){
	require("smtp/class.phpmailer.php");
	require("smtp/class.smtp.php");
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 1;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "kahkashan25599@gmail.com";//Enter your Email ID
	$mail->Password = "fyyjazspeeykccmb";//Enter your password
	$mail->SetFrom("kahkashan25599@gmail.com");//Enter  Email ID
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->Send();//sent Email
	/*if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}*/
}

?>
