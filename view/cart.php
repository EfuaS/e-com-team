
<?php

require('../controllers/cart_controller.php');
require('../settings/core.php');



if (isset($_SESSION['customer_id'])){
    $cid = $_SESSION['customer_id'];
    $cart = displayCart_fxn($cid);
    $checkOutAmt = cartValue_fxn($cid);

}else{
    $ipadd = getRealIpAddr();
    $viewCart = displayCartIPAddController($ipadd);
    $itemsInCart = cartValueNull_fxn($ipadd);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cart Display</title>
</head>

<body>

<h2 style="text-align:center">Cart Display</h2>



<?php


        foreach( $viewCart as $row => $cartItem) {
                

?>
<!-- 
  Bootstrap docs: https://getbootstrap.com/docs
  Get more snippet on https://bootstraptor.com/snippets
-->

<section class="pt-5 pb-5">
  <div class="container">
    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12">
            <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
            <h4 class=" mb-2">Items in cart : <?php echo $itemsInCart; ?></h4>
            <table id="shoppingCart" class="table table-condensed table-responsive">
                <thead>
                    <tr>
                        <th style="width:60%">Product</th>
                        <th style="width:12%">Price</th>
                        <th style="width:10%">Quantity</th>
                        <th style="width:16%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-md-3 text-left">
                                    <img src="<?php echo $cartItem["product_image"]; ?>" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                </div>
                                <div class="col-md-9 text-left mt-sm-2">
                                    <h4><?php echo $cartItem["product_name"]; ?></h4>
                                    <p class="font-weight-light"><?php echo $cartItem["product_brand"]; ?></p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price"><?php echo $cartItem["product_price"]; ?></td>
                        <td data-th="Quantity">
                        <form method="post" action="cart.php">
                            <input type="number" name="prqty" class="form-control form-control-lg text-center" value="1">
                        </td>
                        <td class="actions" data-th="">
                                <div class="text-right">
                                    <input type='submit' value="Update" class="btn btn-white border-secondary bg-white btn-md mb-2">
                                    
                                    </button>
                            </form>

                                        <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                        <i class="fas fa-sync">Remove</i>
                                   
                                    <input  type="hidden" name="pid" value="<?= $row ?>">
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <?php



$productqty = $_POST['prqty'] ;


    $unitprice = $cartItem['product_price'];

    $amount = $productqty * $unitprice ;
    

?>

            <div class="float-right text-right">
                <h4>Subtotal:</h4>
                <h1>$  <?php   echo $amount ; ?></h1>
            </div>
        </div>
    </div>

    <div class="row mt-4 d-flex align-items-center">
        <div class="col-sm-6 order-md-2 text-right">
            <a href="orders.php?amt=<?php  echo $amount; ?>" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Place Order</a>
        </div>        
        <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
            <a href="all_product.php">
                <i class="fas fa-arrow-left mr-2"></i> <--- Back to Shopping</a>
        </div>
    </div>
</div>
</section>
<?php
        }

?>

<?php

include('../includes/scripts.php');
include('../includes/footer.php');

?>

</body>
</html>