<?php

include ('../controllers/people_controller.php');
require ('../settings/core.php');
// if log in button is clicked ...
if(isset($_POST["logbtn"]))  
 {  
      if(empty($_POST["log_email"]) || empty($_POST["log_pass"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = $_POST["log_email"];  
           $password = $_POST["log_pass"];  
           $result = admin_login_controller($username);  

           if($result = 1)  
           {              //ask becky and change  
                          //return true;  
                          session_start();
                          $_SESSION["email"] = $username;  
                          header("location:../view/dashboard.php");  
                     }  
                     else  
                     {  
                          //return false;
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
                  
           
      }
 } 