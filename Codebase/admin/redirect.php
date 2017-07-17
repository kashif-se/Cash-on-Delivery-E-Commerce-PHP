<?php
$url="../index.php";
if(isset($_REQUEST['url'])){
$url=$_REQUEST['url'];
}
header("Location:$url");
?>