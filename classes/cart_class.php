<?php

require('../settings/db_class.php');

class cart extends Connection{

    function addToCart($product_id,$qty,$ip){
        $query = "insert into cart (p_id,qty,ip_add) values('$product_id','$qty','$ip');" ;
        return $this->query($query);

    }

    function insertOrder($ipadd,$invoice_num,$qty,$product_id,$amt){
        $query = "insert into orders (customer_id,product_id,invoice_no,qty,amt) values('$ipadd','$product_id','$invoice_num','$qty',$amt);" ;
        return $this->query($query);

    }

    function displayOrder(){
        // join cart and product and retrieve records from join
        $query = "select * from orders;" ;
        return $this->fetch($query);
    }





    function viewAllCart(){
        // join cart and product and retrieve records from join
        $query = "select products.*, cart.qty from products INNER JOIN cart on cart.p_id = product_id;" ;
        return $this->fetch($query);
    }

    function viewOneCart($product_id){
        $query = "select * from cart where p_id = '$product_id';";
        return $this->fetch($query);

    }

    public function cartValue($cid){
        $sql="SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`c_id`='$cid'";

        return $this->query($sql);
    }

    //not logged in customers
    public function cartValueNull($ipadd){
        $sql="SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`ip_add`='$ipadd'";

        return $this->query($sql);
    }

    public function displayCartIPAdd($ip){
        $sql="SELECT *
FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`ip_add`='$ip'";

        return $this->fetch($sql);
    }


    public function updateCart($cid, $pid, $qty){
        $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `c_id`='$cid' AND `p_id`='$pid'";

        //run the query
        return $this->query($sql);
    }

    //not logged in customers
    public function updateCartNull($ipadd, $pid, $qty){
        $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `ip_add`='$ipadd' AND `p_id`='$pid'";

        //run the query
        return $this->query($sql);
    }




}



?>