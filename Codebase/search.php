<?php
session_start();
require("header.php");
$q="";
$page_con="";
echo"<script type='text/javascript'>document.title = 'Search | Pak United Foods';</script>";
if (isset($_GET["q"])) {
    $q=$_GET["q"];
    $page_con="&q=".$_GET["q"];
}

?>

    <div id="heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-content">
                        <h2>Our Products</h2>
                        <span>Home / <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">Products</a></span>
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
                        <h2>Search Results for '<?php echo $q;?>'</h2>
                        <img src="images/under-heading.png" alt="" >
                    </div>
                </div>
            </div>

            <div class="row" id="Container">

                <?php
                $num_rec_per_page=12;
                $page=1;

                // echo $caturl;
                if (isset($_GET["page"])) { $page  = $_GET["page"]; }
                $start_from = ($page-1) * $num_rec_per_page;
                $a="SELECT `item_id`, `item_name`,`item_desc`, `item_image`, date( `item_time`) DT,`item_fruit`,`fruit_name`,`item_price`,`item_unit` FROM `items`,`fruits` WHERE `fruit_id`=`item_fruit` and `item_active`=1 and `item_name` like '%$q%' order by `item_id`  LIMIT $start_from, $num_rec_per_page";
                // echo $a;
                $items=$conn->query($a);
                if($items->num_rows>0){
                while($r=$items->fetch_assoc()){
                    $f_id=base64_encode($r['item_fruit']);
                    $item_id=base64_encode($r['item_id']);
                    $item_name=$r['item_name'];
                    $item_desc=$r['item_desc'];
                    $item_img=$r['item_image'];
                    $f_name=$r['fruit_name'];
                    $item_price=$r['item_price']."/".$r['item_unit'];
                    $item_date=$r['DT'];

                    ?>

                    <div class="col-md-3 col-sm-6 mix portfolio-item <?php echo $f_id; ?>">
                        <div class="portfolio-wrapper">
                            <div class="portfolio-thumb">
                                <img src="images/<?php echo $item_img; ?>" alt="<?php echo $item_name; ?>" width="270px" height="250px"/>
                                <div class="hover">
                                    <div class="hover-iner">
                                        <a class="fancybox" href="images/<?php echo $item_img; ?>"><img src="images/open-icon.png" alt="" /></a>
                                        <span><?php echo $f_name; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="label-text">
                                <h3><a href="details.php?item=<?php echo $item_id; ?>"><?php echo $item_name; ?></a></h3>
                                <span class="text-category">PKR <?php echo $item_price; ?></span>
                            </div>
                        </div>
                    </div>
                <?php }}else
                echo "<h1>No result found</h1>";
                ?>
            </div>
            <div class="pagination">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <?php
                            $a="SELECT * FROM `items` WHERE `item_active`=1";
                            $c= $conn->query($a);
                            $total_records=$c->num_rows;
                            $total_pages = ceil($total_records / $num_rec_per_page);
                            echo "<li><a href='products.php?page=1$page_con'><i class='fa fa-angle-double-left'></i></a></li>";
                            for ($i=1; $i<=$total_pages; $i++) {
                                echo "<li><a href='products.php?page=$i$page_con'>$i</a></li>";
                            }
                            $i--;
                            echo "<li><a href='products.php?page=$i$page_con'><i class='fa fa-angle-double-right'></i></a></li>";

                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require("footer.php");
?>