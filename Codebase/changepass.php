<?php
session_start();
if(isset($_SESSION['islogin']))
    header("Location:admin/changepass.php");
else
    header("Location:admin/login.php");
?>