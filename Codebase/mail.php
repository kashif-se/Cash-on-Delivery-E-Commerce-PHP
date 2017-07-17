<?php
$to = "kashif.ezone@gmail.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = 'From: kashif.ezone@gmail.com' . "\r\n" .
    'Reply-To: kashif.ezone@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
// More headers
//$headers .= 'From: <webmaster@example.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

if(mail($to,$subject,$message,$headers)){
    echo "Mail sent";

}
else
    echo "Mail not sent";

?>