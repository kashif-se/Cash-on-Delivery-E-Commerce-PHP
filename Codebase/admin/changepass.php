<?php
$url="../index.php";
session_start();
if(!isset($_SESSION['islogin']))
    header("Location:login.php");
require('_con.php');
$err=true;
$postback=false;
$errmsg='';
if(isset($_POST['cpass']) &&isset($_POST['pass']) ) {
    $postback = true;
    $pass = base64_encode($_POST['pass']);
    $old=base64_decode($_SESSION['pass']);
    $up = $_POST['cpass'];
    //echo "$up <br> $old";
    if ($old == $up) {
        $pass = base64_encode($_POST['pass']);

        $sql = " UPDATE `logins` SET `login_password`='$pass' WHERE `logins_id`=" . $_SESSION['UID'];
        $result = $conn->query($sql);
        if ($result) {
            $_SESSION['pass']=$pass;
            $errmsg = "Password Changed Succesfully";
            $err=false;

        } else {
            $errmsg = "Error in updating password , Please try again";
        }
    }
    else
        $errmsg = "Old Password did't match";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    <title>Change Password - Pak United Foods</title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>

    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
    <!--[if lt IE 10]>
    <link href="css/ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->


</head>
<body>

<div id="loader"><img src="img/loader.gif"/></div>

<div class="login">

    <div class="page-header">
        <div class="icon">
            <span class="ico-arrow-right"></span>
        </div>
        <h1>Pak United Foods <small>Change Password</small></h1>
    </div>

    <form id="validate" method="POST" action="#">
        <div class="row-fluid">
            <?php
            if($err && $postback){
                ?>
                <div class="alert alert-error alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Error!</strong> <?php echo $errmsg; ?>
                </div>
            <?php
            }
            if(!$err && $postback){
                ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success!</strong> <?php echo $msg; ?>
                </div>
            <?php
            }
            ?>
            <div class="row-form">
                    <input type="password" class="validate[required]" name="cpass" placeholder="Current Password"/>

            </div>
            <div class="row-form">
                    <input type="password" class="validate[required,minSize[5],maxSize[10]]" id="password" name="pass" placeholder="New Password"/>

            </div>
            <div class="row-form">
                    <input type="password" class="validate[required,equals[password]]" placeholder="Confirm new password"/>

            </div>
            <div class="row-form">
                <div class="span12">
                    <button class="btn" type="submit" id="login">Change Password <span class="icon-arrow-next icon-white"></span></button>
                    <a class="btn" href="../index.php">Home <span class="icon-home icon-white"></span></a>

                </div>


            </div>
        </div>
    </form>
</div><script type='text/javascript' src='js/plugins/jquery/jquery-1.9.1.min.js'></script>
<script type='text/javascript' src='js/plugins/jquery/jquery-ui-1.10.1.custom.min.js'></script>
<script type='text/javascript' src='js/plugins/jquery/jquery-migrate-1.1.1.min.js'></script>
<script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>
<script type='text/javascript' src='js/plugins/other/excanvas.js'></script>

<script type='text/javascript' src='js/plugins/other/jquery.mousewheel.min.js'></script>

<script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>

<script type='text/javascript' src='js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script>

<script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>

<script type='text/javascript' src="js/plugins/uniform/jquery.uniform.min.js"></script>
<script type='text/javascript' src="js/plugins/select/select2.min.js"></script>
<script type='text/javascript' src='js/plugins/tagsinput/jquery.tagsinput.min.js'></script>
<script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>
<script type='text/javascript' src='js/plugins/multiselect/jquery.multi-select.min.js'></script>

<script type='text/javascript' src='js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
<script type='text/javascript' src='js/plugins/validationEngine/jquery.validationEngine.js'></script>

<script type='text/javascript' src='js/plugins/shbrush/XRegExp.js'></script>

<script type='text/javascript' src='js/plugins.js'></script>
<script type='text/javascript' src='js/charts.js'></script>
<script type='text/javascript' src='js/actions.js'></script>


</body>
</html>
