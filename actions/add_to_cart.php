
<?php
    include('../includes/header.php');
    require ('../controllers/cart_controller.php');

    $ipadd = null;
if (isset($_SESSION['customer_id'])){
    $cid = $_SESSION['customer_id'];
    $cart = displayCart_fxn($cid);
    $checkOutAmt = cartValue_fxn($cid);

}else{
    $ipadd = getRealIpAddr();
    exit();
}


    $product_id=$_GET['id'];
    $qty = 1;

 
    //check if product already in cart
    $results = viewOneCartController($product_id);
    if(count($results) > 0 ){
        ?>

        <style>
            body { background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);}
.error-template {padding: 40px 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }
        </style>
        <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    Duplicate Product</h2>
                <div class="error-details"><h4>
                Product already added to cart, shop for other products</h4>
                </div>
                <div class="error-actions">
                    <a href="../view/cart.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        To Cart </a><a href="../view/all_product.php" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> View other products </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php


    } else {
        addToCartController($product_id,$qty,$ipadd);
        header("location:../view/cart.php"); 
    }



    include('../includes/scripts.php');
    include('../includes/footer.php');
    
    


?>