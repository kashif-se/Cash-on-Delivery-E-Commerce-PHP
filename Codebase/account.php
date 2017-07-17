<?php
session_start();
if(!isset($_SESSION['islogin'])){
    header("Location:login.php");
}
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
                    <h2>Your Orders</h2>
                    <img src="images/under-heading.png" alt="" >
                </div>
            </div>
        </div>

        <div class="row">
            <table class="table table-responsive">

                <tr class="text-center"><th>Order</th><th>Amount</th><th>Submitted on</th><th>Status</th><th>Status Changed On</th><th>View Details</th></tr>
                <?php

                $num_rec_per_page=12;
                $page=1;

                if (isset($_GET["page"])) { $page  = $_GET["page"]; }
                $start_from = ($page-1) * $num_rec_per_page;
                $loginID= $_SESSION['UID'];
                $sq="SELECT `order_id`,  `order_amount`, `status_name`, `order_time`, `order_update_time` FROM `order_summary`,`status` WHERE `order_status`=`status_id` and `order_user`=$loginID Order by `order_id` desc  LIMIT $start_from, $num_rec_per_page";

                $orders=$conn->query($sq);
                $i=0;
                while($row=$orders->fetch_array()){
                    $i++;
                    $order_id=base64_encode($row[0]);
                    $order_amount=$row[1];
                    $order_status=$row[2];
                    $order_time=$row[3];
                    $order_up_time=$row[4];
                    echo "<tr><td>$i</td><td>$order_amount</td><td>$order_time</td><td>$order_status</td><td>$order_up_time</td><td><a href='orders.php?order=$order_id' title='View Details'><span class='fa fa-info-circle fa-lg'></span> </a> </td></tr>";
                }
                ?>

            </table>

        </div>
        <div class="pagination">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <?php
                        $a="SELECT `order_id`,  `order_amount` FROM `order_summary` WHERE  `order_user`=$loginID ";
                        $c= $conn->query($a);
                        $total_records=$c->num_rows;
                        $total_pages = ceil($total_records / $num_rec_per_page);
                        echo "<li><a href='account.php?page=1'><i class='fa fa-angle-double-left'></i></a></li>";

                        for ($i=1; $i<=$total_pages; $i++) {
                            echo "<li><a href='account.php?page=$i'>$i</a></li>";
                        }
                        $i--;
                        echo "<li><a href='account.php?page=$i'><i class='fa fa-angle-double-right'></i></a></li>";

                        ?>

                    </ul>
                </div>
            </div>
        </div>

    </div>



<?php
require("footer.php");
?>