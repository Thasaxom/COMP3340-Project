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
    header("location: index.php");
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
	
	<form style="display:<?php echo $_SESSION['admin'] === true ? 'block' : 'none'?>" action="addproduct.php" method="POST">
		<h2>Add Product</h2>
		<div>
            <label>ISBN</label>
            <input type="text" name="isbn"  required maxlength="13">
        </div>
		<div>
            <label>Title</label>
            <input type="text" name="title"  required>
        </div>
		<div>
            <label>Author</label>
            <input type="text" name="author"  required>
        </div>
		<div>
            <label>Price</label>
            <input type="text" name="price"  required>
        </div>
		<div>
            <label>Publisher</label>
            <input type="text" name="publisher"  required>
        </div>
		<div>
            <label>Cover Image URL</label>
            <input type="text" name="imagesrc"  required>
        </div>
		<div>
            <label>Genre</label><br>
            <input type="radio" name="genre" value="1" required>Non-fiction<br>
			<input type="radio" name="genre" value="2" required>Fiction<br>
			<input type="radio" name="genre" value="3" required>Horror<br>
			<input type="radio" name="genre" value="4" required>Mystery<br>
			<input type="radio" name="genre" value="5" required>Science Fiction<br>
			<input type="radio" name="genre" value="6" required>Fantasy<br>
			<input type="radio" name="genre" value="7" required>Romance<br>
        </div>
		<input type="submit" name= "submit" value="submit">
	</form>
	
	<form style="display:<?php echo $_SESSION['admin'] === true ? 'block' : 'none'?>" action="removeproduct.php" method="POST">
        <h2>Remove Product</h2>
        <div>
            <label>ISBN</label>
            <input type="text" name="risbn"  required maxlength="13">
        </div>

        <input type="submit" name= "submit" value="submit">
    </form>
	<br>
	<input type="button" value="Return to Main Page" onclick="location.href='index.php'">

</body>

</html>