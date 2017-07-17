<?php

session_start();
include("admin/_con.php");
if(!isset($_SESSION['islogin'])){
    header("Location:login.php");
}
$loginID= $_SESSION['UID'];

if(!isset($_GET['order'])){
    header("Location:account.php");
}

$ord=base64_decode($_GET['order']);
$q="SELECT `order_user`, `order_amount`, `status_name`, `order_time`, `order_update_time` FROM `order_summary`,`status` WHERE `order_status`=`status_id` AND `order_id` = $ord AND `order_user` = $loginID";
$r=$conn->query($q);
if($r->num_rows!=1){
    header("Location:account.php");
}
$dtrow=$r->fetch_assoc();
require("header.php");
echo"<script type='text/javascript'>document.title = 'My Account | Pak United Foods';</script>";
?>
    <div id="heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-content">
                        <h2>My Account</h2>
                        <span>Home / <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">My Account</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="products-post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="product-heading">
                    <h2>Order Details</h2>
                    <img src="images/under-heading.png" alt="" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            <h5><i class="fa fa-calendar"></i> Submission Date: <strong><?php echo $dtrow["order_time"]; ?></strong></h5>
            </div>
            <div class="col-md-4">
                <h5><i class="fa fa-money"></i> Total Amount: <strong><?php echo $dtrow["order_amount"]; ?></strong></h5>
            </div>
            <div class="col-md-4">
                <h5><i class="fa fa-tags"></i> Status: <strong><?php echo $dtrow["status_name"]; ?></strong></h5>
            </div>

        </div>
        <div class="row">
            <table class="table table-responsive">

                <tr class="text-center"><th>Item</th><th>Rate</th><th>Quantity</th><th>Total</th></tr>
                <?php


                $sq="SELECT  `od_product_id`,`item_name`, `od_rate`, `od_qty` FROM `order_details`,`items` WHERE `od_product_id`=`item_id` and `od_order_id`=$ord";

                $orders=$conn->query($sq);
                $i=0;
                while($row=$orders->fetch_array()){
                    $i++;
                    $pr_id=base64_encode($row[0]);
                    $pr_name=$row[1];
                    $pr_rate=intval($row[2]);
                    $prd_qty=intval($row[3]);
                    $total=$pr_rate*$prd_qty;
                    echo "<tr ><td><a href=\"details.php?item=$pr_id\" target='_blank'>$pr_name</a> </td><td >$pr_rate</td><td>$prd_qty</td><td>$total</td></tr>";

                }
                ?>

            </table>

        </div>


    </div>



<?php
require("footer.php");
?>