<?php
session_start();
require("header.php");
echo"<script type='text/javascript'>document.title = 'About Us | Pak United Foods';</script>";
?>
    <div id="heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-content">
                        <h2>About Us</h2>
                        <span>Home / <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">About us</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="timeline-post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-section">
                        <h2>Who We Are</h2>
                        <img src="images/under-heading.png" alt="" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3>Our Company</h3>
                    <?php
                    $q="SELECT `about` FROM `contact`";
                    $rre=$conn->query($q);
                    $row=$rre->fetch_assoc();
                    echo $row['about'];

                    ?>
                </div>

            </div>


        </div>
    </div>

    <div id="our-team">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-section">
                        <h2>Our Team</h2>
                        <img src="images/under-heading.png" alt="" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="authors">

                    <?php
                    $staff="SELECT  `staff_name`, `staff_post`, `staff_pic`, `staff_fb`, `staff_link`, `staff_twi`, `staff_time`  FROM `staff` WHERE `staff_active`=1";
                    $staff_r=$conn->query($staff);
                    while($qw=$staff_r->fetch_assoc()){
                        $s_name=$qw['staff_name'];
                    $s_post=$qw['staff_post'];
                    $s_pic=$qw['staff_pic'];
                    $s_fb=$qw['staff_fb'];
                    $s_link=$qw['staff_link'];
                    $s_tw=$qw['staff_twi'];

                    ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="team-thumb">
                            <div class="author">
                                <img src="images/<?php echo $s_pic; ?>" alt="<?php echo $s_name; ?>">
                            </div>
                            <div class="overlay">
                                <div class="author-caption">
                                    <ul>
                                        <li><a href="<?php echo $s_fb; ?>"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="<?php echo $s_tw; ?>"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="<?php echo $s_link; ?>"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="author-details">
                            <h2><?php echo $s_name; ?></h2>
                            <span><?php echo $s_post; ?></span>
                        </div>
                    </div>
                    <?php }?>

                </div>
            </div>
        </div>
    </div>


<?php
require("footer.php");
?>