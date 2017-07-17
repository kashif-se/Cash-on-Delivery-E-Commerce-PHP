<?php
require_once("aut.php");
$err=false;
if(!isset($_GET['order'])){
    header("Location:orders.php");
}

$ord=base64_decode($_GET['order']);
$q="SELECT `order_id`,  `order_amount`,`status_id`, `status_name`, `order_time`, `order_update_time`,`order_user`,`login_fname`,`login_phone`, `login_address` FROM `order_summary`,`status`,`logins` WHERE `order_status`=`status_id` and`logins_id`=`order_user` AND `order_id` = $ord";

$r=$conn->query($q);
if($r->num_rows!=1){
    header("Location:account.php");
}
$dtrow=$r->fetch_assoc();

?>
<html>
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

    <style type="text/css">
        @media print
        {
            body * { visibility: hidden; }
            #printcontent * { visibility: visible; }
            #printcontent { position: absolute; }
        }
    </style>
</head>
<body>
<div class="container" id="printcontent">
<div class="page-header">
    <div style="float:left; margin-right: 25px;">
        <img src="../images/logo.png">
    </div>
    <h1>Invoice #<?php echo $dtrow["order_id"]; ?> <small>Date: <?php echo $dtrow["order_time"]; ?></small></h1>
</div>

<div class="row-fluid" >
    <div class="span12" >
        <div class="block">
            <div class="data invoice">

                <div class="row-fluid">

                    <div class="span3">
                        <h4><?php echo $dtrow["login_fname"]; ?></h4>
                        <address>
                            <strong><?php echo $dtrow["login_fname"]; ?></strong><br>
                            <?php echo $dtrow["login_address"]; ?><br/>
                            <abbr title="Phone">P:</abbr> <?php echo $dtrow["login_phone"]; ?>
                        </address>
                    </div>
                    <div class="span6"></div>
                    <div class="span3">
                        <h4>Invoice</h4>
                        <p><strong>Date invoice:</strong> <?php echo $dtrow["order_time"]; ?></p>
                        <div class="highlight">
                            <strong>Amount Due: </strong><?php echo $dtrow["order_amount"]; ?> <em>PKR</em>
                        </div>
                    </div>
                </div>

                <h3>Description</h3>

                <table class="table" width="100%">
                    <thead>
                    <tr>
                        <th width="70%">Description</th>
                        <th width="10%">Price</th>
                        <th width="10%">Quantity</th>
                        <th width="10%">Total</th>
                    </tr>
                    </thead>
                    <tbody>
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
                        echo "<tr ><td><a href=\"edit_product.php?product=$pr_id\" target='_blank'>$pr_name</a> </td><td >$pr_rate</td><td>$prd_qty</td><td>$total</td></tr>";

                    }
                    ?>
                    </tbody>
                </table>

                <div class="row-fluid">
                    <div class="span9"></div>
                    <div class="span3">
                        <div class="total">
                            <p><strong><span>Subtotal:</span> <?php echo $dtrow["order_amount"]; ?> <em>PKR</em></strong></p>
                            <div class="highlight">
                                <strong><span>Total:</span> <?php echo $dtrow["order_amount"]; ?> <em>PKR</em></strong>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="row-fluid">
            <button class="btn btn-large" onclick="window.print();"><span class="icon icon-print icon icon-white"></span> </button>

        </div>
    </div>

</div>

<?php
require_once "footer.php";
?>
    <?php

require_once "libs.php";
?>

