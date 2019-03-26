<?php

    session_start();
    
    $errors = array();


    if(isset($_POST['submit'])){

        include_once 'config.php';

        $fname = mysqli_real_escape_string($db,$_POST['fname']);
        $lname = mysqli_real_escape_string($db,$_POST['lname']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $p1 = mysqli_real_escape_string($db,$_POST['p1']);
        $p2 = mysqli_real_escape_string($db,$_POST['p2']);

        // form validation
        if(empty($fname)){array_push($errors,"First Name is required.");}
        if(empty($lname)){array_push($errors,"Last Name is required.");}
        if(empty($email)){array_push($errors,"Email is required.");}
        if(empty($p1)){array_push($errors,"Password is required.");}
        if(empty($p2)){array_push($errors,"Password confirm is required.");}
        if($p1!=$p2){array_push($errors,"Password do not match.");}
        
        // check email
        $sql = "select * from users where user = '$email'";
        $sqlresult = mysqli_query($db,$sql);
        
        if(mysqli_num_rows($sqlresult)>0){array_push($errors,"Email already exists.");}
        

        if(count($errors)==0){
            // hash password
            
            $date = date('H:i:s');
            $hashpwd = sha1($password.$date);

            $sql = "INSERT into users (uname, upasshashed, salt,fname,lname) VALUES ('$email','$hashpwd','$date','$fname','$lname');";

            mysqli_query($db,$sql);
            header("Location:  register.php?register=success");
            exit();
        }else{
            header("Location:  register.php?register=error");
            exit();
        }
    }
    else{
        header("Location: register.php");
        exit();
    }

?>



