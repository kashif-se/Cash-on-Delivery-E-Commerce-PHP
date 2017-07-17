<?php
session_start();
$msg="Invalid Request";
if(isset($_SESSION['check'])){
$msg= "Order Submitted Successfully";
unset($_SESSION['check']);
}
require("header.php");
?>

<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2>Checkout</h2>
                    <span>Home / <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">Checkout</a></span>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="heading-section">
                    <h2><?php echo $msg; ?></h2>
                    <img src="images/under-heading.png" alt="" >
                </div>
            </div>
        </div>
    </div>
<?php
require("footer.php");
?>