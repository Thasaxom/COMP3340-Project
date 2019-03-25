<?php

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>

<body>

    <div>
        
    </div>

    <form action="register.inc.php" method="POST">

    <div>
        <h2>Register</h2>
    </div>

        <div>
            <label>First Name</label>
            <input type="text" placeholder="First Name" name="fname">
        </div>

        <div>
            <label>Last Name</label>
            <input type="text" placeholder="Last Name" name="lname" >
        </div>

        <div>
            <label>Email</label>
            <input type="email" placeholder="example@xample.com" name="email" >
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