<?php
session_start();
if(isset($_SESSION['islogin']))
    header("Location:index.php");
else
    header("Location:admin/login.php");
?>