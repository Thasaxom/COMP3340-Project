<?php
	
	session_start();
		
	$loggedin = 0;
	$email = "";
	
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
		$loggedin = 1;
		$email = $_SESSION["email"];
	}
	
?>

<html>
	<head>
		<title>The Greatest Book Store on the Internet</title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<script src="js/index.js"></script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/index.js"></script>
		<script>
		function loginUI() {
				
			var loggedin = <?php echo $loggedin; ?>;
			var email = '<? echo $email; ?>';
			
			if (loggedin === 1) {
				document.getElementById("guest").style.display = "none";
				document.getElementById("loggedin").style.display = "flex";
			}
			else {
				document.getElementById("guest").style.display = "flex";
				document.getElementById("loggedin").style.display = "none";
			}
		}
		function loadPage() {
			loginUI();
			populateWithBooks(0, "");
		}
		</script>
	</head>
	
	<body onload="loadPage()">
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
					<div id="loginarea" >
						<div id="guest">
							<form action="login.inc.php" method="post">
								<input id="userbar" name="email" type="text" placeholder="Username">
								<input id="passbar" name="pass" type="password" placeholder="Password">
								<input type="submit" onclick="loginUI()" name="submit" value="Log In">	
							</form>
							<form action="register.php">
								<input type="submit" value="Register">
							</form>
						</div>
						<div id="loggedin">
							<form action="logout.php">
								<input type="submit" onclick="loginUI()" value="Logout">
								<input type="button" onclick="location.href='profile.php'" value="Profile">
								<p>You are logged in as <?php echo $email;?></p>
								
							</form>
						</div>
						<a href="contactpage.htm">Contact Us!</a>
					</div>
				</div>
			</div>			
			<div id="content">
			</div>
		</div>	
	</body>
</html>