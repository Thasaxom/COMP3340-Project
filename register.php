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
	if(isset($_SESSION["user"]) && $_SESSION["user"] === true){
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
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css">

</head>

<body>

	<div id="container">
		<div id="topbar">				
			<a href="index.php"><img id="logo" src="images/logo.svg"></a>
			<div id="navarea">
				<div id="searcharea">
					<input id="searchbar" type="text" placeholder="Search..">
					<button onclick="populateWithBooks(0, document.getElementById('searchbar').value)" id="searchbutton">Search</button>
				</div>
				
				<h1 id="title">The Greatest Book Store on the Internet</h1>
				<div id="genrearea">
					<button class="genrebutton" onclick="populateWithBooks(1, '')">Non-Fiction</button>
					<button class="genrebutton" onclick="populateWithBooks(2, '')">Fiction</button>
					<button class="genrebutton" onclick="populateWithBooks(3, '')">Horror</button>
					<button class="genrebutton" onclick="populateWithBooks(4, '')">Mystery</button>
					<button class="genrebutton" onclick="populateWithBooks(5, '')">Science Fiction</button>
					<button class="genrebutton" onclick="populateWithBooks(6, '')">Fantasy</button>
					<button class="genrebutton" onclick="populateWithBooks(7, '')">Romance</button>						
				</div>
			</div>
		</div>					
	</div>

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
    </form>
</body>

</html>


