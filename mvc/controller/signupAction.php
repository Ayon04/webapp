<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
   $isValid = true;
   
        $name = sanitize($_POST['name']);
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);
        $repass = sanitize($_POST['re-pass']);
       
        $_SESSION['name']=$name;
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        $_SESSION['re-pass']=$repass;
    

    if (empty($name) || empty($email) || empty($password) || empty($repass)) {
            $_SESSION['empty_all'] ="Please fill all the fileds.";

            $isValid = false;

            header("Location: ../view/signup.php");



        }

         else {
                    
                  unset($_SESSION['empty_all']);   
                  
                  header("Location: ../view/signin.php");

                  
       }

    
    }
    

 else{

     echo "Invalid Request";
      
 }




 


 function sanitize($data) {
    $data = htmlspecialchars($data);
    return $data;
  }
?>



