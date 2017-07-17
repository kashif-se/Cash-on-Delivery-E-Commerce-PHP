<?php
session_start();
require("header.php");
?>
<div id="slider">
    <div class="flexslider">
        <ul class="slides">
            <?php
            if($result->num_rows>0){
                while($row=$result->fetch_assoc())
                {
                    $cap=$row["slide_caption"];
                    $path="images/".$row['slides_image'];

                    ?>
                    <li>
                        <div class="slider-caption">
                            <?php echo $cap  ?>
                        </div>
                        <img src="<?php echo $path  ?>" alt="" />
                    </li>
                <?php }}?>
        </ul>
    </div>
</div>

<div id="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-section" style="padding: 0 0 80px 0;">
                    <h2>Latest Fruits</h2>
                    <img src="images/under-heading.png" alt="" >
                </div>
            </div>
        </div>
        <div class="row">

            <?php
            $a="SELECT `item_id`, `item_name`,`item_desc`, `item_image`, date( `item_time`) DT FROM `items` WHERE `item_active`=1 order by `item_id` DESC  limit 0,6";
            $items=$conn->query($a);
            while($r=$items->fetch_assoc()){
                $item_id=base64_encode($r['item_id']);
                $item_name=$r['item_name'];
                $item_desc=$r['item_desc'];
                $item_img=$r['item_image'];
                $item_date=$r['DT'];

            ?>
            <div class="col-md-4 col-sm-6">
                <div class="blog-post">
                    <div class="blog-thumb">
                        <img src="images/<?php echo $item_img; ?>" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="content-show">
                            <h4><a href="<?php echo "details.php?item=".$item_id; ?>"><?php echo $item_name; ?></a></h4>
                            <span><?php echo $item_date; ?></span>
                        </div>
                        <div class="content-hide">
                            <p>
                                <?php echo substr($item_desc,0,255); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                <?php }?>
        </div>
    </div>
</div>

<div id="testimonails">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-section">
                    <h2>What Customers Say</h2>
                    <img src="images/under-heading.png" alt="" >
                </div>
            </div>
        </div>

        <?php

        $sql = "SELECT `testomonial_text`, `testomonial_person`, `testomonial_post`, `testomonial_link` FROM `testomonial` WHERE `testmonial_active` =1";
        $result=$conn->query($sql);
        if($result->num_rows>0){
            ?>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="testimonails-slider">
                        <ul class="slides">
                            <?php	while($row=$result->fetch_assoc())
                            {
                                $txt=$row["testomonial_text"];
                                $person=$row["testomonial_person"];
                                $post=$row["testomonial_post"];
                                $link=$row["testomonial_link"];
                                ?>
                                <li>
                                    <div class="testimonails-content">
                                        <?php echo $txt; ?>
                                        <h6><?php echo $person; ?> - <a href="<?php echo $link; ?>"><?php echo $post; ?></a></h6>
                                    </div>
                                </li>

                            <?php
                            } ?>

                        </ul>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</div>
<?php
require("footer.php");
?>