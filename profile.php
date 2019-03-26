<?php 
session_start();


// load data to store on text box
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php // include_once("cdn.php"); ?>
</head>

<body>

    <?php //include_once("nav.php");?>

    <form action="profile.inc.php" method="POST">

        <div>
            <label>Email</label>
            <input type="email" name="email" placeholder="example@example.com" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" placeholder="Password" name="pass" required>
        </div>

        <input type="submit" value="Submit">
    </form>

</body>

</html>