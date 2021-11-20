<?php


require("../Controllers/customer_controller.php");
require("../Settings/core.php");

    if(isset($_POST['submit'])){
        //     //get user data
        $loginEmail = $_POST['email'];
        $loginPassword = $_POST['pass'];
        
      
        $result= Customer_LoginInfo($loginEmail);

        if (password_verify($loginPassword, $result['customer_pass'])){
            $_SESSION["user_id"] = $result["customer_id"];
            $_SESSION["user_role"] = $result["user_role"];
            check_permission();
            if($_SESSION["user_role"]== 1){
                header("Location: ../Admin/index.php");
        }else{
             header("Location:../Views/index.php");
            }
        }else {
                  echo "<script>alert('Username or Password incorrect')</script>";
                  //header("Location: ../Logins/login.php");
              }
        
       

   
    }

?>