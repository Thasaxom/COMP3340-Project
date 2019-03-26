<?php

    session_start();

    $fn = '';
    $ln ='';
    $em = '';

		// admin
	if(isset($_SESSION["admin"]) && $_SESSION["admin"] === true){
		header("Location: index.php");
		exit();
	} 
	//  user

	if(isset($_SESSION["user"]) && $_SESSION["user"] === true)){
		header("Location: index.php");
		exit();
	}
    

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <?php //include_once("cdn.php"); ?>
</head>

<body>

    <?php //include_once("nav.php");?>
    <div>
        <h2>Register</h2>
    </div>

    <form action="register.inc.php" method="POST">

        <div>
        <?php  
            if(isset($_SESSION["r_errors"])){

               foreach($_SESSION["r_errors"] as $rer){
                   echo $rer;
               }
               unset($_SESSION["r_errors"]);
            }

            echo $fn." ".$ln. " ".$em;
        ?>
        </div>

        <div>
            <label>First Name</label>
            <input type="text" placeholder="First Name" name="fname" value="<?php
            if(isset($_SESSION['r_autofill'])){
        

                if(count($_SESSION['r_autofill'])==2){
                    $_SESSION["r_autofill"][0] = $fn;
                    $_SESSION["r_autofill"][1] = $ln;
                }
                if(count($_SESSION['r_autofill'])==3){
                    $_SESSION["r_autofill"][0] = $fn;
                    $_SESSION["r_autofill"][1] = $ln;
                    $_SESSION["r_autofill"][2] = $em;
                }
                
                
                unset($_SESSION['r_autofill']);
            }
            
            
            ?>"/>
        </div>

        <div>
            <label>Last Name</label>
            <input type="text" placeholder="Last Name" name="lname" value="<?php echo $ln; ?>"/>
        </div>

        <div>
            <label>Email</label>
            <input type="email" placeholder="example@xample.com" name="email" value="<?php echo $em; ?>"/>
        </div>
        <div>
            <label>Password</label>
            <input type="password" placeholder="Password" name="p1" >
        </div>
        <div >
            <label>Confirm password</label>
            <input type="password" placeholder="Confirm password" name="p2" >
        </div>
        <div>
            <button type="submit" name="submit">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
</body>

</html>


