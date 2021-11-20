<?php

require ('../controllers/cart_controller.php');

  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$_GET['ref']}",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_f5dbff0128d9c9c2641473e98ee4ae3c37188357",
      "Cache-Control: no-cache",
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  

  $responseObject = json_decode($response);

  if(isset($responseObject->data->success)&& $responseObject->data->success === 'success'){
      $ref = $_GET['ref'];      
      $email = $_GET['email'];
      $amount = $_GET['amount'];
      $currency = $_GET['curr'];
      $pid = $_GET['pid'];
      $qty = $_GET['qty'];
      $orderStatus = 'success';      
    //   $customer_id= $_SESSION['customer_id'];
    $customer_id = 1;
      $invoice_num = ran();
      $order_date = time();



      processPaymentontroller($email, $amount, $currency);
          //insert into orders table
      orderInsertController($customer_id,$invoice_num,$order_date,$orderStatus);
      //insert into orderdetails table
      orderdetailsController($pid, $qty);
      //clear from cart
    removeAllCart($customer_id);


      header("location:../view/payment_success.php"); 
    } else {
        header("location:../view/payment_error.php"); 
    }
?>