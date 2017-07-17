

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
    <title>Admin Panel - Pak United Foods</title>
    <link rel="icon" type="image/ico" href="favicon.ico"/>

    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
    <!--[if lte IE 7]>
    <link href="css/ie.css" rel="stylesheet" type="text/css" />
    <script type='text/javascript' src='js/plugins/other/lte-ie7.js'></script>
    <![endif]-->
</head>
<body>
<div id="loader"><img src="img/loader.gif"/></div>
<div class="wrapper">

    <div class="sidebar">

        <div class="top">
            <a href="../index.php" class="logo" style="height: 64px;"></a>

        </div>
        <div class="nContainer">
            <ul class="navigation">
                <li> <a href="../index.php" class="blgreen">Home</a></li>
                <li><a href="dashboard.php" class="blblue">Dashboard</a></li>
                <li>
                    <a href="#" class="blyellow">Slider</a>
                    <div class="open"></div>
                    <ul>
                        <li><a href="new_slide.php">New Slide</a></li>
                        <li><a href="slider.php">View Slider Images</a></li>
                        <li><a href="edit_slide.php">Modify Slide</a></li>
                    </ul>
                </li>
                <li><a href="categories.php" class="blgreen">Categories</a></li>
                <li>
                    <a href="#" class="blorange">Orders</a>
                    <div class="open"></div>
                    <ul>
                        <li><a href="orders.php">All Orders</a></li>
                        <li><a href="edit_order.php">Update Status</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="bldblue">Products</a>
                    <div class="open"></div>
                    <ul>
                        <li><a href="new_product.php">Add New Product</a></li>
                        <li><a href="edit_product.php">Modify Product Details</a></li>
                        <li><a href="products.php">List All Products</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="blpurple">Testimonial</a>
                    <div class="open"></div>
                    <ul>
                        <li><a href="new_testimonial.php">Register New Testimonial</a></li>
                        <li><a href="testimonial.php">List All Testimonials</a></li>
                        <li><a href="testimonial.php">Modify Testimonial</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="blorange">Staff</a>
                    <div class="open"></div>
                    <ul>
                        <li><a href="new_staff.php">Add New Staff Member</a></li>
                        <li><a href="edit_staff.php">Modify Staff Details</a></li>
                        <li><a href="staff.php">List All Staff</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="blyellow">Company</a>
                    <div class="open"></div>
                    <ul>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact Details</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="blred">Account</a>
                    <div class="open"></div>
                    <ul>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="users.php">All Users</a></li>
                    </ul>
                </li>
            </ul>
            <a class="close">
                <span class="ico-remove"></span>
            </a>
        </div>
        <div class="widget">
            <div class="datepicker"></div>
        </div>

    </div>

    <div class="body">
        <ul class="navigation">
            <li>
                <a href="../index.php" class="button">
                    <div class="icon">
                        <span class="ico-home"></span>
                    </div>
                    <div class="name">Home</div>
                </a>
            </li>
            <li>
                <a href="dashboard.php" class="button green">
                    <div class="icon">
                        <span class="ico-monitor"></span>
                    </div>
                    <div class="name">Dashboard</div>
                </a>
            </li>

            <li>
                <a href="products.php" class="button purple">
                    <div class="icon">
                        <span class="ico-barcode-2"></span>
                    </div>
                    <div class="name">Products</div>
                </a>
            </li>
            <li>
                <a href="orders.php" class="button bldblue">
                    <div class="icon">
                        <span class="ico-shopping-cart"></span>
                    </div>
                    <div class="name">Orders</div>
                </a>
            </li>
            <li>
                <a href="staff.php" class="button orange">
                    <div class="icon">
                        <span class="ico-user"></span>
                    </div>
                    <div class="name">Staff</div>
                </a>
            </li>
            <li>
                <a href="#" class="button yellow">
                    <div class="icon">
                        <span class="ico-book-2"></span>
                    </div>
                    <div class="name">Reports</div>
                </a>
            </li>
            <li>
                <a href="logout.php" class="button red">
                    <div class="icon">
                        <span class="ico-signout"></span>
                    </div>
                    <div class="name">Logout</div>
                </a>
            </li>

        </ul>



        <div class="content">


