<?php
$url="../index.php";
session_start();
if(isset($_SESSION['islogin']))
    header("Location:../index.php");
require('_con.php');
$err=true;
$postback=false;
$errmsg='No Error';
if(isset($_POST['username']) &&isset($_POST['password']) ){
    $postback=true;
    $user=$_POST['username'];
    $pass=base64_encode($_POST['password']) ;
    $sql = "SELECT `logins_id`,`login_type`,`login_active` FROM `logins` WHERE `login_name`='$user' and `login_password`='$pass'";
    $result = $conn->query($sql);
    if($result->num_rows==1){
        $row=$result->fetch_array();
        if($row[2]==1){
            $_SESSION['islogin']=true;
            $_SESSION['UID']=$row[0];
            $_SESSION['email']=$user;
            $_SESSION['pass']=$pass;
            $_SESSION['loginType']=$row[1];
            $err=false;
            if(isset($_REQUEST['url'])){
                $url=$_REQUEST['url'];
            }
            if($row[1]==1){
                $url="dashboard.php";

            }
            header("Location:$url");
        }else{
            $errmsg="Your account is temporarily locked";
        }

    }else{
        $errmsg="Invalid login details, Please try again";
    }

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
    <title>Login - Pak United Foods</title>
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
             <h1>Pak United Foods <small>Account login</small></h1>
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
                    <strong>Success!</strong> <?php echo $errmsg; ?>
                </div>
            <?php
            }
            ?>
            <div class="row-form" id="box">
                <div class="span12">
                    <input type="text" name="username" id="username" class="validate[required,minSize[4]]" placeholder="login" required="required"/>
                </div>
            </div>
            <div class="row-form">
                <div class="span12">
                    <input type="password" name="password" id="password" class="validate[required]" placeholder="password" required="required"/>
                </div>            
            </div>
            <div class="row-form">
                <div class="span12">
                    <input type="checkbox" name="remember"/> Keep me signed in
                </div>
            </div>
            <div class="row-form">
                <div class="span12">
                    <button class="btn" type="submit" id="login">Sign in <span class="icon-arrow-next icon-white"></span></button>
                    <a class="btn" href="../index.php">Home <span class="icon-home icon-white"></span></a>
                    <a class="btn" href="register.php">Register <span class="icon-user icon-white"></span></a>
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
