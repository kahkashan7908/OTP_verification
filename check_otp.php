
<?php
session_start();
$con=mysqli_connect('localhost','root','','login');
$otp=$_POST['otp'];
$email=$_SESSION['EMAIL'];
$res= mysqli_query( $con,"select * from user where otp='$otp'");
$count=mysqli_num_rows($res);
if($count>0){
   mysqli_query($con,"update user set otp='$otp' where email='$email'");
   $_SESSION['IS_LOGIN']=$email;
    echo 1;
}

else{
    echo 0;
}

?>