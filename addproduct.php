<?php
	include_once 'config.php';
	
	$isbn = mysqli_real_escape_string($db,$_POST['isbn']);
	$title = mysqli_real_escape_string($db,$_POST['title']);
	$author = mysqli_real_escape_string($db,$_POST['author']);
	$price = mysqli_real_escape_string($db,$_POST['price']);
	$publisher = mysqli_real_escape_string($db,$_POST['publisher']);
	$imagesrc = mysqli_real_escape_string($db,$_POST['imagesrc']);
	$genre = mysqli_real_escape_string($db,$_POST['genre']);
	
	$sql = "SELECT * FROM BOOK WHERE isbn = '$isbn'";
    $sqlresult = mysqli_query($db,$sql);
        
    if(mysqli_num_rows($sqlresult)!=0) {
		header("Location:  profile.php?isbnalreadyexists");
		exit();
	}
	
	$sql = "INSERT INTO BOOK (isbn,title,author,price,publisher,imagesrc,genre) VALUES ('$isbn','$title','$author','$price','$publisher','$imagesrc','$genre');";

	$result = mysqli_query($db,$sql);
	if($result == false) {
		header("Location:  profile.php?addproduct=failure");
		error_log(mysqli_error($db));
		exit();
	}
	
	header("Location:  profile.php?addproduct=success");
	exit();
	
?>