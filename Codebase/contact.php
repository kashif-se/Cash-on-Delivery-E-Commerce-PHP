<?php
session_start();
require("header.php");
echo"<script type='text/javascript'>document.title = 'Contact Us | Pak United Foods';</script>";
$err=false;
if(isset($_POST['sender'])){
    $err=true;
}


?>

    <div id="heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-content">
                        <h2>Contact Us</h2>
                        <span>Home / <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">Contact Us</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="product-post">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-section">
                        <h2>Feel free to send a message</h2>
                        <img src="images/under-heading.png" alt="" >
                    </div>
                </div>
            </div>
            <div id="contact-us">
                <div class="container">
                    <div class="row">
                        <div class="product-item col-md-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <?php if($err){ ?>

                                    <div class="alert"  style="background: #C22439;margin-bottom: 10px;cursor: pointer;border: 0;text-shadow: none;color: #FFF;">
                                        <strong>Error!</strong> <?php echo "Error posting your message"; ?>
                                    </div>
                                    <?php }?>

                                    <div class="message-form">
                                        <form action="#" method="post" class="send-message">
                                            <div class="row">
                                                <div class="name col-md-4">
                                                    <input type="text" name="name" id="name" placeholder="Name" required/>
                                                </div>
                                                <div class="email col-md-4">
                                                    <input type="text" name="email" id="email" placeholder="Email" required/>
                                                </div>
                                                <div class="subject col-md-4">
                                                    <input type="text" name="subject" id="subject" placeholder="Subject" required/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="text col-md-12">
                                                    <textarea name="text" placeholder="Message" required></textarea>
                                                </div>
                                            </div>
                                            <div class="send">
                                                <button type="submit" name="sender">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="info">

                                        <ul>
                                            <li>
                                                <i class="fa fa-phone "></i><?php echo $ph; ?><br />
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
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-section">
                        <h2>Find Us On Map</h2>
                        <img src="images/under-heading.png" alt="" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="googleMap" style="height:420px;"></div>
                </div>
            </div>
        </div>
    </div>


<?php
require("footer.php");
?>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&amp;sensor=false">
</script>

<script>

    var map;

    function initialize()
    {
        var map_options = {
        <?php  echo " center: new google.maps.LatLng($mapx,$mapy),"; ?>
            zoom: 15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("googleMap"), map_options);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    google.maps.event.addDomListener(window, "resize", function()
    {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });
</script>
