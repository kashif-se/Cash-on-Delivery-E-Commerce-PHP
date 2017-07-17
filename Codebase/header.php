<?php
global $amount;
$amount=0;
$items_count=0;
if(isset($_SESSION['cart'])){
    $arrayCart = $_SESSION['cart'] ;
    $items_count=count($arrayCart);
    for ($i=0; $i<$items_count; $i++ ){
        $amount+=intval($arrayCart[$i][5]);
    }

}
$link="<a href='login.php' style='margin: 0px;padding: 0px;'>login</a>/<a href='admin/register.php' style='margin: 0px;padding: 0px;'>Register</a>";
if(isset($_SESSION['islogin'])){
    $link="<a href='logout.php' style='margin: 0px;padding: 0px;'>logout</a>-<a href='changepass.php' style='margin: 0px;padding: 0px;'>Change Password</a>-<a href='admin/myprofile.php' style='margin: 0px;padding: 0px;'>Profile</a>";
    if(intval($_SESSION['loginType'])==1)
        $link.="-<a href='admin/dashboard.php' style='margin: 0px;padding: 0px;'>Admin Panel</a>";

}

include("admin/_con.php");
$sql = "SELECT slides_image, slide_caption, `slide_number` FROM `slides` WHERE `slide_active`=1 order by `slide_number`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->


<head>
    <meta charset="utf-8">
    <title>Pak United Foods</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!--link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'-->
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/templatemo_style.css">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/testimonails-slider.css">
    <link rel="icon" type="image/ico" href="images/favicon.ico"/>

    <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
<![endif]-->

<header>
    <div id="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="home-account">
                        <a href="index.php">Home</a>
                        <a href="account.php">My account</a>
                        (<?php echo $link;?>)
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cart-info">
                        <i class="fa fa-shopping-cart"></i>
                        (<a href="cart.php"><?php echo $items_count;?> items</a>) in your cart (<a href="cart.php"><?php echo "RS ".$amount;?></a>)
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.php"><img src="images/logo.png" title="Pak United Foods" alt="Pak United Foods" ></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="main-menu">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="about.php">About</a>
                            </li>
                            <li>
                                <a href="products.php">Products</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="search-box">
                        <form name="search_form" method="get" class="search_form" action="search.php">
                            <input id="search" type="text" name="q" value="<?php echo isset($_REQUEST['q'])?$_REQUEST['q']:""; ?>"/>
                            <input type="submit" id="search-button" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php $sql = "SELECT * FROM `contact`";
$run=$conn->query($sql);
$contacts=$run->fetch_assoc();
$fb=$contacts["facebook"];
$tw=$contacts["twitter"];
$rss=$contacts["rss"];
$ph=$contacts["ptcl"];
$mob1=$contacts["mobile1"];
$mob2=$contacts["mobile2"];
$email=$contacts["email"];
$mapx=$contacts["mapx"];
$mapy=$contacts["mapy"];
?>