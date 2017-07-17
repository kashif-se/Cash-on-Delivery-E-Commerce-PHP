<?php
session_start();
if(!isset($_GET['item'])){
header("Location:index.php");
}

require("header.php");

?>
<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2>Product Detail</h2>
                    <span>Home / Products / <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">Detail</a></span>
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="product-post">
        <div class="container">
            <?php $id=base64_decode($_GET['item']);
            $sql="SELECT `item_name`, `item_fruit`, `item_desc`, `item_image`, `item_price`, `item_unit` FROM `items` WHERE `item_active`=1 and `item_id`=$id limit 0,5";
            $items=$conn->query($sql);
            if($items->num_rows==1){
            $r=$items->fetch_assoc();
            $item_id=base64_encode($id);
            $item_name=$r['item_name'];
            $item_desc=$r['item_desc'];
            $item_img=$r['item_image'];
            $item_price=$r['item_price'];
            $item_unit=$r['item_unit'];
            $item_fruit=$r['item_fruit'];
            echo"<script type='text/javascript'>document.title = '$item_name | Pak United Foods';</script>";

            ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="heading-section">
                        <h2><?php echo $item_name; ?></h2>
                        <img src="images/under-heading.png" alt="" />
                    </div>
                </div>
            </div>
            <div id="single-blog" class="page-section first-section">
                <div class="container">
                    <div class="row">
                        <div class="product-item col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="image">
                                        <div class="image-post">
                                            <img src="images/<?php echo $item_img; ?>" alt="" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h3><?php echo $item_name; ?></h3>

                                        </div>
                                        <p><?php echo $item_desc; ?></p>
                                    </div>

                                    <div class="divide-line">
                                        <img src="images/div-line.png" alt="" />
                                    </div>
                                    <div class="leave-form">
                                        <form action="cart.php" method="post" class="leave-comment">
                                            <input type="hidden" value="<?php echo $item_id; ?>" name="product"/>
                                            <div class="row">
                                                <div class="col-md-4">
                                                   <h4><span class="fa fa-tag"></span><?php echo "PKR $item_price/$item_unit"; ?></h4>

                                                </div>
                                                <div class="col-md-4">
                                                    <h4>Quantity <?php echo " ($item_unit)"; ?>
                                                        <select class="form-control" name="qty" id="qty">
                                                            <?php
                                                            for($i=1;$i<=200;$i++)
                                                            echo "<option value='$i'>$i</option>"
                                                            ?>
                                                        </select>
                                                    </h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-default" name="addcart"><span class="fa fa-shopping-cart"></span> Add to Cart</button>
                                                </div>

                                                </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="side-bar">

                                        <div class="recent-post">
                                            <h4>See also</h4>
                                            <div class="posts">
                                                <div class="recent-post">
                                                    <?php
                                                    $a="SELECT `item_id`, `item_name`,`item_desc`, `item_image`, date( `item_time`) DT FROM `items` WHERE `item_active`=1 and `item_fruit`=$item_fruit order by `item_id` DESC  limit 0,8";
                                                    $items=$conn->query($a);
                                                    while($r=$items->fetch_assoc()){
                                                        $item_id=base64_encode($r['item_id']);
                                                        $item_name=$r['item_name'];
                                                        $item_desc=$r['item_desc'];
                                                        $item_img=$r['item_image'];
                                                        $item_date=$r['DT'];

                                                        ?>
                                                        <div class="recent-post">
                                                            <div class="recent-post-thumb">
                                                                <img src="images/<?php echo $item_img; ?>" alt="" width="70" height="70">
                                                            </div>
                                                            <div class="recent-post-info">
                                                                <h6><a href="<?php echo "details.php?item=".$item_id; ?>"><?php echo $item_name; ?></a></h6>
                                                                <span><?php echo $item_date; ?></span>
                                                            </div>
                                                        </div>
                                                    <?php }?>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <?php }
                else{
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h1>Error 404</h1>
                                <h2>Product you are trying might not be availble</h2>
                                <img src="images/under-heading.png" alt="" />
                            </div>
                        </div>
                    </div>

                    <?php } ?>
    </div>

<?php
require("footer.php");
?>