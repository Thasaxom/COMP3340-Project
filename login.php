<?php

    session_start();

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
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php //include_once("cdn.php"); ?>
</head>


<?php //include_once("nav.php");?>

<body>
    <div>
        <h2>Login</h2>
    </div>

    <form action="login.inc.php" method="POST">

        <div>
            <?php  
            if(isset($_SESSION["l_errors"])){

               foreach($_SESSION["l_errors"] as $rer){
                   echo $rer;
               }
               unset($_SESSION["l_errors"]);
            }

        ?>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" placeholder="example@example.com" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" placeholder="Password" name="pass" required>
        </div>

        <div>
            <button type="submit" name="submit">Login</button>
        </div>

        <p>
            Dont have account? <a href="register.php">Register</a>
        </p>

    </form>
</body>

</html>

