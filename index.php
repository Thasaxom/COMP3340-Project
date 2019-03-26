<?php
	session_start();
?>

<html>
	<head>
		<title>The Greatest Book Store on the Internet</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="js/index.js"></script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	
	<body>
		<div id="container">
			<div id="topbar">				
				<a href="index.php"><img id="logo" src="images/logo.png"></a>
				<div id="navarea">
					<div id="searcharea">
						<input id="searchbar" type="text" placeholder="Search..">
						<button id="searchbutton">Search</button>
					</div>
					
					<h1 id="title">The Greatest Book Store on the Internet</h1>
					<div id="genrearea">
						<button class="genrebutton">Non-Fiction</button>
						<button class="genrebutton">Fiction</button>
						<button class="genrebutton">Horror</button>
						<button class="genrebutton">Mystery</button>
						<button class="genrebutton">Science Fiction</button>
						<button class="genrebutton">Fantasy</button>
						<button class="genrebutton">Romance</button>						
					</div>
					<div id="loginarea">
						<form action="login.inc.php" method="post">
							<?php 							
								echo "logged in:" . $_SESSION["loggedin"];
								if(isset($_SESSION["l_errors"])){
									foreach($_SESSION["l_errors"] as $rer){
										echo $rer;
									}
									unset($_SESSION["l_errors"]);
								}
        					?>
							<input id="userbar" name="email" type="text" placeholder="Username">
							<input id="passbar" name="pass" type="password" placeholder="Password">
							<input type="submit" name="submit" value="Log In">
							<input type="button" onclick="location.href = 'register.php';" value="Register">
						</form>
						
					</div>
				</div>
			</div>
			
			<div id="content">
				<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at tempus diam. Cras consequat est at condimentum luctus. Ut gravida aliquet sem vitae tempus. Quisque commodo ultrices odio. Vestibulum tempor augue in convallis facilisis. Nunc congue accumsan neque quis consequat. Mauris lobortis risus eget urna vehicula convallis. Curabitur pharetra mollis rutrum.

				Praesent tempor hendrerit felis, in tristique arcu vestibulum ut. Quisque eu magna ut lorem condimentum tristique. Donec a tristique sem. Vestibulum eget ex tincidunt, blandit eros in, efficitur lectus. Phasellus at aliquet ipsum, sed molestie enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam lacinia nibh a aliquet posuere. Phasellus non est erat. Etiam iaculis, odio nec ultrices vehicula, ante lacus aliquet nibh, et porttitor sapien magna id sem. Suspendisse hendrerit commodo tempus. Nullam suscipit, arcu vitae commodo hendrerit, sem dolor sagittis leo, ut aliquam nunc ipsum id enim. Nunc bibendum id lectus vitae blandit. Ut mi nisi, tempus non scelerisque in, interdum eget lorem. Vestibulum at sollicitudin diam, eget posuere felis. Aenean aliquet molestie ante. Fusce pharetra nisl felis, eget porttitor quam consequat sit amet.

				Phasellus quis neque in neque feugiat iaculis vel nec ante. Nunc ut commodo enim. Pellentesque et quam eu nisl pharetra convallis at non lorem. Vivamus eget orci elementum, egestas arcu ac, facilisis ipsum. Curabitur sed metus aliquam nisi varius lobortis. Aliquam finibus ullamcorper commodo. Etiam vel laoreet turpis. Praesent aliquet dui eget dui mattis dictum. Nullam in massa nisl. Vivamus malesuada ornare tortor in fringilla. Vestibulum pharetra, ex ut mattis facilisis, ante nibh tristique neque, quis finibus orci quam sed odio.

				Nulla venenatis id leo in euismod. Sed dignissim sapien turpis, id commodo nibh auctor ut. Nam non augue vestibulum nisi luctus porttitor. Vestibulum ornare justo sit amet diam suscipit dapibus. Curabitur est tortor, porta quis justo at, vestibulum sodales turpis. Praesent ultricies erat mauris, sit amet pellentesque tellus tincidunt quis. Proin euismod lobortis libero, non fringilla est sollicitudin quis. Nunc accumsan condimentum massa vitae pharetra. Nulla turpis sem, malesuada et ex quis, feugiat iaculis tellus.

				Nam eget metus aliquam, tempor magna nec, maximus lectus. Maecenas pretium et sapien quis porta. Suspendisse tempor mi vitae nisi gravida facilisis. Duis porta hendrerit leo, vitae venenatis magna tincidunt sed. Cras purus dui, vehicula ut arcu ut, condimentum euismod turpis. Nulla finibus pellentesque ornare. Nunc gravida blandit tortor in consectetur. Integer metus massa, tincidunt vel tincidunt in, tempor eu quam. Maecenas vel tincidunt metus.
				</p>
			</div>
		</div>
	
	</body>
</html>