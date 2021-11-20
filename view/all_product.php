
<?php
include('../includes/header.php');

require('../controllers/product_controller.php');
require("../settings/core.php");

//retrieve all products from database
$all_products = getAllProductsController();
$ipadd = getRealIpAddr();
$qty = 1;

?>

<br>
<br>
<h3 class="display-5 mb-2 text-center">Products from our brands</h3>


<form class="form-inline md-form mr-auto mb-4 w-50 d-flex align-content-center" method='post' action='all_product.php'>
  <input class="form-control mr-sm-2" type="text" placeholder="Search Products" aria-label="Search" name = 'search_phrase'>
  <input type='submit' name='search'class="btn aqua-gradient btn-rounded btn-sm my-0" value='Submit'>
</form>


<?php
				if(isset($_POST['search'])){
					$phrase = $_POST['search_phrase'];

                $results = searchDbController($phrase);

                foreach( $results as $row ) {
			?>
<h4 class="display-7 mb-2 text-center">Search Results</h4>

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="<?php echo $row["product_image"] ?>"></div>
                <div class="col-md-6 mt-1">
                    <h5><?php echo $row["product_name"]; ?></h5>
                    <div class="d-flex flex-row">
                        <p><?php echo $row["product_desc"]; ?></p>
                    </div>
                    <p class="text-justify text-truncate para mb-0"><br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h2 class="mr-1">$ <?php echo $row["product_price"]; ?></h2>
                    </div>
                    <div class="d-flex flex-column mt-4"><a href="single_product.php?id=<?php echo $row["product_id"] .'&ipadd='.$ipadd.'&qty='.$qty  ?>" ><button class="btn btn-primary btn-sm" type="submit">See Product</button></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

        }
                }

?>


<?php
       foreach( $all_products as $row ) {


?>
<h4 class="display-7 mb-2 text-center">More Products...</h4>
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="<?php echo $row["product_image"] ?>"></div>
                <div class="col-md-6 mt-1">
                    <h5><?php echo $row["product_name"]; ?></h5>
                    <div class="d-flex flex-row">
                        <p><?php echo $row["product_desc"]; ?></p>
                    </div>
                    <p class="text-justify text-truncate para mb-0"><br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h2 class="mr-1">$ <?php echo $row["product_price"]; ?></h2>
                    </div>
                    <div class="d-flex flex-column mt-4"><a href="single_product.php?id=<?php echo $row["product_id"] .'&ipadd='.$ipadd.'&qty='.$qty  ?>" ><button class="btn btn-primary btn-sm" type="submit">See Product</button></a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

        }

include('../includes/scripts.php');
include('../includes/footer.php');

?>


</body>
</html>