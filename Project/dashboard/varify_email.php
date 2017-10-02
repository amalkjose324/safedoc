<link rel="stylesheet" href="../css/lobibox.min.css"/>
<script src="js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="../js/lobibox.min.js"></script>
<?php
/**
* Function to decryption
* @var json
*/
function decrypt($cipherText)
{
  $dec="";
  $key="O87dRQzn2gi=INqPpkSDyZvGuFm3wcfaCEbTjtl6Wxh9YLe15sJH4BMr0XAoKV_U";
  $set_count= strlen((string)$cipherText); //2
  for ($i=0; $i < $set_count; $i++) {
    $char=strrpos($key,$cipherText[$i]);
    $no=decbin($char);
    $dec=$dec.sprintf("%06d", $no);
  }
  $plainText=bindec($dec);
  return $plainText;
}


if(isset($_GET['otp'])){
  include_once '../db_connect.php';
  $otp=$_GET['otp'];
  $dec_otp =$otp;
  $count= strlen((string)$otp)-40;
  $step=floor(40/($count+1));
  $dec_user="";
  for ($i=1; $i <= $count; $i++) {
    $position = ($i*$step)-($i-1);
    echo $temp_str=substr($dec_otp,$position,1);
    $dec_user=$dec_user.$temp_str;
    $dec_otp = substr($dec_otp, 0, $position). substr($dec_otp, $position+1);
  }
  $userid=decrypt($dec_user);
  echo "<center style='visibility:hidden'>fsdfsadfsdf</center>";
  $query = mysqli_query($con,"SELECT * FROM safedocx_otp WHERE otp_login_id=$userid AND otp_type=1 AND otp_password='$dec_otp'");
  if(mysqli_num_rows($query)>0){
    mysqli_query($con, "DELETE FROM `safedocx_otp` WHERE `otp_login_id`=$userid AND otp_type=1");
    mysqli_query($con, "UPDATE `safedocx_varify` SET `varify_email`=1 WHERE `varify_login_id`=$userid");
    ?><script>
    Lobibox.alert('success', {
      msg: "Your Email id has been varified...!"
    });
    setTimeout(function() {
      window.location.replace("./profile.php");
    }, 2000);
    </script>
    <?php
  }
  else {
    ?><script>
    Lobibox.alert('error', {
      msg: "OTP is not valid..!"
    });
    setTimeout(function() {
      window.location.replace("./profile.php");
    }, 2000);
    </script>
    <?php
    //header('location:./');
  }
}
else {
  header('location:./');
}
?>
