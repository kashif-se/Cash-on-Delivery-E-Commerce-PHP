<?php
session_start();

include("admin/_con.php");
if(isset($_REQUEST['unload']) &&isset($_SESSION['cart'])){
    $id=intval($_REQUEST['unload']);
    $arrayCart = $_SESSION['cart'] ;
    unset($arrayCart[$id]);
    $_SESSION['cart']=$arrayCart;
    header("Location:cart.php");
}
if( isset($_REQUEST['checkout']) && isset($_SESSION['cart'])){
   if(!isset($_SESSION['islogin'])){
    header("Location:login.php");
   }
   else{
       $amount=0;
       $items_count=0;
       if(isset($_SESSION['cart'])){
           $arrayCart = $_SESSION['cart'] ;
           $items_count=count($arrayCart);
           for ($i=0; $i<$items_count; $i++ ){
               $amount+=intval($arrayCart[$i][5]);
           }

       }
       $loginID= $_SESSION['UID'];
       $sq_is="INSERT INTO `order_summary`(`order_user`, `order_amount`, `order_status`) VALUES ($loginID,$amount,1)";
       if($conn->query($sq_is)==TRUE){
           $last_id = $conn->insert_id;
           $arrayCart = $_SESSION['cart'];
           $counter=count($arrayCart);
           for($i=0;$i<$counter;$i++){
               $p_id=base64_decode($arrayCart[$i][0]);

               $p_price=$arrayCart[$i][2];
               $p_qty=$arrayCart[$i][4];
               $new_q="INSERT INTO `order_details`(`od_order_id`, `od_product_id`, `od_rate`, `od_qty`) VALUES ($last_id,$p_id,$p_price,$p_qty)";
               $conn->query($new_q);
           }
           unset($_SESSION['cart']);
           $_SESSION['check']=true;
           header("Location:checkout.php");

       }
   }
}



if(isset($_REQUEST['empty']) &&isset($_SESSION['cart'])){
    unset($_SESSION['cart']);
    header("Location:cart.php");
}

if(isset($_POST['addcart'])){
    $id=base64_decode($_POST['product']);
    $item_qty=intval($_POST['qty']);

    $sql="SELECT `item_name`, `item_price`, `item_unit` FROM `items` WHERE `item_active`=1 and `item_id`=$id";
    $items=$conn->query($sql);
    if($items->num_rows==1) {
        $r = $items->fetch_assoc();
        $item_id = base64_encode($id);
        $item_name = $r['item_name'];
        $item_price = intval($r['item_price']);
        $item_unit = $r['item_unit'];
        $a=-1;
        if(isset($_SESSION['cart'])){
            $arrayCart = $_SESSION['cart'] ;
            for($i=0;$i<count($arrayCart);$i++){

                if($arrayCart[$i][0]==base64_encode($id)){
                    $a=$i;
                    break;
                }
            }
        }
        if($a==-1)
        $arrayCart[]=array($item_id,$item_name,$item_price,$item_unit,$item_qty,$item_price*$item_qty);
        else
            $arrayCart[$a]=array($item_id,$item_name,$item_price,$item_unit,$item_qty,$item_price*$item_qty);
        $_SESSION['cart']=$arrayCart;
    }
    header("Location:cart.php");
}
require("header.php");
?>

<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2>Shopping Cart</h2>
                    <span>Home / <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">Shopping Cart</a></span>
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
                        <h2>Your Cart</h2>
                        <img src="images/under-heading.png" alt="" >
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-responsive">
                    <tr class="text-center"><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th></tr>
                    <?php
                if(isset($_SESSION['cart'])) {
                    $arrayCart = $_SESSION['cart'];
                    $counter=count($arrayCart);
                    if($counter>0)
                    for($i=0;$i<$counter;$i++){
                        $l=$arrayCart[$i][0];
                        $n=$arrayCart[$i][1];
                        $p=$arrayCart[$i][2];
                        $u=$arrayCart[$i][3];
                        $q=$arrayCart[$i][4];
                        $t=$arrayCart[$i][5];

                        echo "<tr ><td><a href=\"details.php?item=$l\">$n</a> </td><td >$p/$u</td><td>$q</td><td>$t</td><td><a href=\"cart.php?unload=$i\" class=\"fa fa-trash-o fa-lg\"></a> </td></tr>";
                    }
                }
                    $cls="";
                    if($amount<1)
                        $cls="disabled";
                ?>
                    <tr class="text-center"><th></th><th></th><th>Total Amount</th><th><?php echo $amount;?></th><th></th></tr>
                </table>

                <form method="post">
                    <div class="row">

                        <div class="col-md-4 pull-right">
                        <button type="submit" class="btn btn-warning pull-left <?php echo $cls;?>" name="empty"><span class="fa fa-shopping-cart"></span> Empty Cart</button>

                        <button type="submit" class="btn btn-default pull-right <?php echo $cls;?>" name="checkout"><span class="fa fa-check"></span> Checkout</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="row" id="Container">

            </div>

    </div>


<?php
require("footer.php");
?>