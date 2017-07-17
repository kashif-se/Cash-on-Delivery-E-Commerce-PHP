<?php
require_once("aut.php");
require_once("header.php");
?>
<div class="page-header">
    <div class="icon">
        <span class="ico-monitor"></span>
    </div>
    <h1>Dashboard <small>Pick a task to start</small></h1>
</div>

    <div class="row-fluid">
        <div class="span12">
            <div class="block">
                <div class="head blue">
                    <div class="icon"><span class="ico-shopping-cart"></span></div>
                    <h2>latest Orders</h2>
                </div>
                <div class="data-fluid">
                    <table cellpadding="0" cellspacing="0" width="100%" class="table images lcnp">
                        <thead>
                        <tr>
                            <th width="30"><input type="checkbox" class="checkall"/></th>
                            <th width="60">Order ID</th>
                            <th>Amount</th>
                            <th>Customer</th>
                            <th width="100">Status</th>
                            <th >Time</th>
                            <th >Update Time</th>
                            <th width="80">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $num_rec_per_page=12;
                        $page=1;
                        if (isset($_GET["page"])) { $page  = $_GET["page"]; }
                        $start_from = ($page-1) * $num_rec_per_page;

                        $slide_sql="SELECT `order_id`,  `order_amount`, `status_name`, `order_time`, `order_update_time`,`order_user`,`login_fname` FROM `order_summary`,`status`,`logins` WHERE `order_status`=`status_id` and`status_id`=1  and`logins_id`=`order_user` ORDER BY `order_id` DESC LIMIT $start_from, $num_rec_per_page";
                        $slides=$conn->query($slide_sql);
                        if($slides->num_rows>0){
                            while($row=$slides->fetch_assoc()){
                                $id=base64_encode($row["order_id"]);
                                $amount=$row["order_amount"];
                                $status=$row["status_name"];
                                $time=$row["order_time"];
                                $update_time=$row["order_update_time"];
                                $user_id=base64_encode($row["order_user"]);
                                $user_name=$row["login_fname"];
                                ?>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td><a href="edit_order.php?order=<?php echo $id; ?>"> <?php echo base64_decode($id); ?></a></td>
                                    <td class="info"><?php echo $amount; ?></td>
                                    <td class="info"><a href="profile.php?user=<?php echo $user_id; ?>"><?php echo $user_name; ?></a> </td>
                                    <td><?php echo $status; ?></td>
                                    <td><?php echo $time; ?></td>
                                    <td><?php echo $update_time; ?></td>
                                    <td>
                                        <a href="edit_order.php?order=<?php echo $id; ?>" class="button green">
                                            <div class="icon"><span class="ico-pencil"></span></div>
                                        </a>
                                        <a href="edit_order.php?order=<?php echo $id; ?>" class="button red">
                                            <div class="icon"><span class="ico-remove"></span></div>
                                        </a>
                                    </td>
                                </tr>
                            <?php }}?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="pagination pagination-centered">
            <ul>
                <?php
                $a="SELECT * FROM `order_summary` ";
                $c= $conn->query($a);
                $total_records=$c->num_rows;
                $total_pages = ceil($total_records / $num_rec_per_page);
                echo "<li><a href='dashboard.php?page=1'>&laquo;</a></li>";
                for ($i=1; $i<=$total_pages; $i++) {
                    if($i==$page)
                        echo "<li class='active'><a href='dashboard.php?page=$i'>$i</a></li>";
                    else
                        echo "<li><a href='dashboard.php?page=$i'>$i</a></li>";

                }
                $i--;
                echo "<li><a href='dashboard.php?page=$i'>&raquo;</i></a></li>";

                ?>
            </ul>
        </div>
    </div>
<?php
require_once("footer.php");
require_once "libs.php";
?>