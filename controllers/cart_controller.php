
<?php

require('../classes/cart_class.php');



function addToCartController($product_id,$qty,$ip){
    $cart_actions = new cart ();
    return $cart_actions->addToCart($product_id,$qty,$ip);
}

function viewAllCartController(){
    $cart_actions = new cart ();
    return $cart_actions->viewAllCart();
}

function viewOneCartController($product_id){
    $cart_actions = new cart ();
    return $cart_actions->viewOneCart($product_id)   ;
}


function cartValue_fxn($cid){
    $cart_actions = new cart();

    $runQuery = $cart_actions->cartValue($cid);

    if ($runQuery){
        $total = $cart_actions->fetch();
        return $total;
    }else{
        return false;
    }
}

function cartValueNull_fxn($ipadd){
    $cart_actions = new cart();

    return $cart_actions->cartValueNull($ipadd);

}


function updateCart_fxn($cid, $pid, $qty){
    //create a new object
    $cart_actions = new cart();

    $runQuery = $cart_actions->updateCart($cid, $pid, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

//not logged in customers
function updateCartNull_fxn($ipadd, $pid, $qty){
    //create a new object
    $cart_actions = new cart();

    $runQuery = $cart_actions->updateCartNull($ipadd, $pid, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

function displayCartIPAddController($ip){
    $cart_actions = new cart ();
    return $cart_actions->displayCartIPAdd($ip);
}


function insertOrderController($ipadd,$invoice_num,$qty,$product_id,$amt){
    $cart_actions = new cart ();
    return $cart_actions->insertOrder($ipadd,$invoice_num,$qty,$product_id,$amt);
}

function displayOrderController(){
    $cart_actions = new cart ();
    return $cart_actions->displayOrder();
}









?>