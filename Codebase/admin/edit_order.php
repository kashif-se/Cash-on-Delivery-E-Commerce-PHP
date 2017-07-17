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
if(isset($_POST['save'])){
    $ordr_id=$_POST['orderid'];
    $ordr_st=$_POST['status'];

    $qs="UPDATE `order_summary` SET `order_status`=$ordr_st,`order_update_time`=CURRENT_TIMESTAMP WHERE `order_id`=$ord";

    $ex=$conn->query($qs);
    if($ex){
        $err=true;
    }
}
require_once("header.php");

?>
<style type="text/css">
    @media print
    {
        body * { visibility: hidden; }
        #printcontent * { visibility: visible; }
        #printcontent { position: absolute; }
    }
</style>
<div class="page-header">
    <div class="icon">
        <span class="ico-dollar"></span>
    </div>
    <h1>Invoice #<?php echo $dtrow["order_id"]; ?> <small>Date: <?php echo $dtrow["order_time"]; ?></small></h1>
</div>

<div class="row-fluid" >
    <div class="span12" id="printcontent">
        <?php if($err){ ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> Status Updated Successfully
            </div>
        <?php }?>
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
            <form method="post">
                <div class="span3">
                    Status :
                </div>
                <div class="span3">
                    <input type="hidden" value="<?php echo $dtrow["order_id"]; ?>" name="orderid"/>
                    <select name="status" class="select">
                        <?php
                        $s_status=$dtrow["status_id"];
                        $sql2="SELECT `status_id`, `status_name` FROM `status`";
                        $r2=$conn->query($sql2);
                        while($row=$r2->fetch_assoc()){
                            $s_id=$row["status_id"];
                            $s_name=$row["status_name"];
                            if(intval($s_id)==intval($s_status))
                                echo "<option value='$s_id' selected='selected'>$s_name</option>";
                            else
                                echo "<option value='$s_id'>$s_name</option>";
                        }
                        ?>
                    </select>

                </div>
                <div class="span3">
                    <button class="btn" type="submit" name="save">Update Status</button>
                    <a href="invoice.php?order=<?php echo base64_encode($ord);?>" class="btn" target="_blank"><span class="icon icon-print icon icon-white"></span></a>
                </div>
            </form>
        </div>
    </div>

</div>

<?php
require_once("footer.php");
require_once "libs.php";
?>

