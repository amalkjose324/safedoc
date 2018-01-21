<?php
ini_set( "sendmail_from", "pw.safedocx@gmail.com" );
ini_set( 'SMTP', "smtp.gmail.com" );
ini_set( 'smtp_port', 587 );
$to = "info.amalkjose@gmail.com";
$subject = "gramin chitty management";

$message = "
<html>
<head>
  <title>HTML email</title>
</head>
<body>
  <p>This email contains user and password</p>
  <table>
    <tr>
      <th>USER NAME</th>
      <th>PASSWORD</th>
    </tr>
    <tr>
      <td>Haiiii</td>
      <td>AMal</td>
    </tr>
  </table>
</body>
</html>
";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <pw.safedocx@gmail.com>' . "\r\n";

mail($to,$subject,$message,$headers);
