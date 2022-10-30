function send_otp(){
  var email=$('#email').val();
  $.ajax({
    url:"send_otp.php",
    type:'post',
    data:'email='+email,
    success:function(result){
      if(result.charAt(result. length-1)==1){   
        $('#otpContainer').show();
        $('#emailContainer').hide();
      }
      if(result==0){
        $('#email-error').html('please enter valid email' .fontcolor("red"));
        
      }    
    }
    

  })
}
function submit_otp(){
  var otp=$('#otp').val();
  $.ajax({
    url:"check_otp.php",
    type:'post',
    data:'otp='+otp,
    success:function(result){
      if(result==1){
        window.location='dashboard.php'
  
      }
      if(result==0){
        $('#otp-error').html('please enter valid OTP' .fontcolor("red"));
        
      }    
    }
    

  })
}