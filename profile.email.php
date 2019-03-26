<?php 

    session_start();
    $errors = array();

    if(isset($_POST['submit'])){

        include_once 'config.php';

        $nemail = mysqli_real_escape_string($db,$_POST['nemail']);

         // form validation
        if(empty($nemail)){array_push($errors,"Email is required.");}

        if(count($errors)<1){ // no errors 

            $e = $_SESSION["email"]; // current email 
            $sql = "UPDATE USERS SET uname= '$nemail' WHERE uname='$e'"; // sql query 
            mysqli_query($db,$sql);
            $_SESSION["email"] = $nemail; // update session
            header("Location:  profile.php?update_email=success"); 

        }
        else{
            header("Location:  profile.php?update_email=failed");
            exit();
        }

    }else{
        header("Location: login.php");
        exit();
    }


?>