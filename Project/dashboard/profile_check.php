<link rel="stylesheet" href="../js/dist/css/lobibox.min.css"/>
<script src="js/core/libraries/jquery.min.js" type="text/javascript"></script>
<script src="../js/dist/js/lobibox.min.js"></script>
<script src="../js/dist/js/messageboxes.min.js"></script>
<script src="../js/dist/js/notifications.min.js"></script>
<?php
include_once '../db_connect.php';
include_once 'check_logout.php';
echo "<center style='visibility:hidden'>fsdfsadfsdf</center>";
$query1=mysqli_query($con,"SELECT * FROM safedocx_varify WHERE varify_email=1 AND varify_phone=1 AND varify_login_id=$user_id");
$query2=mysqli_query($con,"SELECT * FROM safedocx_users WHERE user_aadhaar_no='' AND user_id=$user_id");
if((mysqli_num_rows($query1)==0)||(mysqli_num_rows($query2)==0)){
  ?>
  <script>
  Lobibox.notify('warning', {
    msg: 'Lorem ipsum dolor sit amet against apennine any created, spend loveliest, building stripes. Slight fallen one opportunity dyspepsia, puzzled quickening throbbing row worm numerous sagittis wreaths.'
  });
  setTimeout(function() {
   window.location.replace("./profile.php");
  }, 5000);
  </script>
  <?php
  //header('location:./profile.php');
}
?>
