<?php
require_once("../controllers/cart_controller.php");
$pid = $_GET['pid'];
$qty = $_GET['qty'];
function getRealIpAddr(){
 if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) {
  // Check IP from internet.
  $ip = $_SERVER['HTTP_CLIENT_IP'];
 } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
  // Check IP is passed from proxy.
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
 } else {
  // Get IP address from remote address.
  $ip = $_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}
session_start();
if (isset($_SESSION['customer_id'])){
    $cid = $_SESSION['customer_id'];
    $updateCart = updateCart_fxn($cid, $pid, $qty);
    if($updateCart){
        header("location: ../view/cart.php");
    }else{
        echo "something went wrong";
    }
}else{
    $ipadd = getRealIpAddr();
    $updateCart = updateCartNull_fxn($ipadd, $pid, $qty);
    if($updateCart){
        header("location: ../view/cart.php");
    }else{
        echo "something went wrong";
    }
}
?>
