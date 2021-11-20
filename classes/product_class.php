
<?php

require('../settings/db_class.php');

class product extends Connection{

    function addProduct($product_cat,$product_brand,$product_title,$product_price,$product_desc, $product_image,$product_keywords){
        $query = "INSERT INTO products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) VALUES('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords');" ;
        return $this->query($query);

    }

    function editProduct($product_id, $product_cat,$product_brand,$product_title,$product_price,$product_desc,$product_image,$product_keywords){
        return $this->query("UPDATE customer set product_cat = '$product_cat',product_brand = '$product_brand',product_title = '$product_title',product_price = '$product_price',product_desc = '$product_desc', product_image = '$product_image', product_keywords = '$product_keywords' where product_id =' $product_id';");

    }

    function getAllProducts(){
        $query = "SELECT * FROM products; " ;
        return $this->fetch($query);
    }

    function getOneProduct($product_id){
        $query = "select * from products where product_id = '$product_id'; " ;
        return $this->fetch($query);
    }

    function searchDb($phrase){
        $query = "SELECT * FROM `products` WHERE `product_name` LIKE '%$phrase%' ORDER BY `product_name`;";
        return $this->fetch($query);
    }




}



?>