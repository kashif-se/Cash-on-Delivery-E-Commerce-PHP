<?php 
include("admin/_con.php");
$res="";
$ip=$_SERVER['REMOTE_ADDR'];
if(isset($_REQUEST['email'])){
$email=$_REQUEST['email'];
$sql="INSERT INTO `subscribers`(`subs_email`, `subs_ip`) VALUES ('$email','$ip')";
$r=$conn->query($sql);
if($r)
$res= "You are Successfully Subscribed";
else
$res="Subsccription Failed";
}
else
$res="Error in subscription";
echo "<span>$res</span>";
?>