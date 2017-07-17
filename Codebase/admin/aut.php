<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header("Location:login.php");
}
if(intval($_SESSION['loginType'])!=1){
    header("Location:../account.php");

}
require_once("_con.php");
?>