<?php 
session_start();

    if(isset($_SESSION["admin"]) && $_SESSION["admin"] === true){
        // admin
    }
    else if(isset($_SESSION["user"]) && $_SESSION["user"] === true){
        // user
    }
    else{
            //guest 
        header("location: login.php");
        exit();
    }
// load data to store on text box
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <?php //include_once("cdn.php"); ?>
</head>

<body>

    <?//php include_once("nav.php");?>

    <form action="profile.email.php" method="POST">
        <h2>Change Email</h2>
        <div>
            <label>New Email</label>
            <input type="email" name="nemail" placeholder="example@example.com" required>
        </div>
        <input type="submit" name="submit" value="submit">
    </form>

    <form action="profile.pass.php" method="POST">
        <h2>Change password</h2>
        <div>
            <label>Current password</label>
            <input type="password" name="cpass"  required>
        </div>
        <div>
            <label> New Password</label>
            <input type="password"  name="npass" required>
        </div>

        <input type="submit" name= "submit" value="submit">
    </form>

</body>

</html>