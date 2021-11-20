<?php

require('../classes/product_class.php');


function addProductController ($product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords){
    $product_actions = new product();
    return $product_actions->addProduct($product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords);
}

function editProductController($product_id, $product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_keywords){
    $product_actions = new product();
    return $product_actions->editProduct($product_id, $product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_keywords);
}

function getAllProductsController(){
    $product_actions = new product ();
    return $product_actions->getAllProducts();
}

function getOneProductController($product_id){
    $product_actions = new product ();
    return $product_actions->getOneProduct($product_id);
}

function searchDbController($phrase){
    $product_actions = new product ();
    return $product_actions->searchDb($phrase);
}



?>