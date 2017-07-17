
<?php 
include("_con.php");
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
$username=$_POST['username']; 
$password=base64_encode( $_POST['password']);
 $sql="SELECT `logins_id`, `login_type` FROM `logins` WHERE `login_name`='$username' and  `login_password`='$password'";
echo 1;
}

?>
