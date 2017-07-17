
<footer>
    <div class="container">
        <div class="top-footer">
            <div class="row">
                <div class="col-md-9">
                    <div class="subscribe-form" id="subform">
                        <span>Get in touch with us</span>
                        <form method="get" class="subscribeForm">

                            <input id="subscribe" type="email" placeholder="Enter your email" required="required" />
                            <input type="submit" id="submitButton" onclick="subs()" />
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <?php /* $sql = "SELECT * FROM `contact`";
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
                    $mapy=$contacts["mapy"];*/
                    ?>

                    <div class="social-bottom">
                        <span>Follow us:</span>
                        <ul>
                            <li>
                                <a href="<?php echo $fb; ?>" class="fa fa-facebook"></a>
                            </li>
                            <li>
                                <a href="<?php echo $tw; ?>" class="fa fa-twitter"></a>
                            </li>
                            <li>
                                <a href="<?php echo $rss; ?>" class="fa fa-rss"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-footer">
            <div class="row">
                <div class="col-md-3">
                    <div class="about">
                        <h4 class="footer-title">About Pak United Foods</h4>
                        <p>
                            Pak United Foods (pvt) Ltd. Is the name of business company with the independent board members which is registered under the relevant laws as laid down by the Government of Pakistan. That has led itself in the heaven of succession and proved itself to be the best quality fruits provider and this all has been possible due to the hard work and zeal of our team.
                        </p>
                    </div>
                </div>




                <div class="col-md-3">
                    <div class="shop-list">
                        <h4 class="footer-title">Fruit Categories</h4>
                        <ul>
                            <?php $sql = "SELECT `fruit_id`, `fruit_name` FROM `fruits` LIMIT 0,8";
                            $result=$conn->query($sql);
                            if($result->num_rows>0){
                                while($row=$result->fetch_assoc())
                                {
                                    $id="products.php?cat=".base64_encode($row["fruit_id"]);
                                    $name=$row["fruit_name"];
                                    ?>
                                    <li>
                                        <a href="<?php echo $id; ?>"><i class="fa fa-angle-right"></i><?php echo $name; ?></a>
                                    </li>

                                <?php } }?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="recent-posts">
                        <h4 class="footer-title">Recent Fruits</h4>
                        <?php
                        $a="SELECT `item_id`, `item_name`,`item_desc`, `item_image`, date( `item_time`) DT FROM `items` WHERE `item_active`=1 order by `item_id` DESC  limit 0,2";
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
                                <h6><a href="<?php echo "products.php?product=".$item_id; ?>"><?php echo $item_name; ?></a></h6>
                                <span><?php echo $item_date; ?></span>
                            </div>
                        </div>
                        <?php }?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="more-info">
                        <h4 class="footer-title">More info</h4>

                        <ul>
                            <li>
                                <i class="fa fa-phone"></i><?php echo $ph; ?><br />
                                <i class="fa fa-mobile"></i><?php echo $mob1; ?><br />
                                <i class="fa fa-mobile-phone"></i><?php echo $mob2; ?>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i><a href="#"><?php echo $email; ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <p>

                Copyright © 2011-<?php echo date("Y");?> <a href="#">Pak United Foods</a> | Designed by <a href="http://www.technofeedia.com">Team Technofeedia</a>
            </p>
        </div>

    </div>
</footer>

<script src="js/vendor/jquery-1.11.0.min.js"></script>
<script src="js/vendor/jquery.gmap3.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<<script type="text/javascript" charset="utf-8">
    function subs() {
        str=document.getElementById("subscribe").value;
        if (str.length == 0) {
            document.getElementById("subform").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("subform").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("POST", "subscribe.php?email=" + str, true);
            xmlhttp.send();
        }
    }


</script>

</body>
</html>