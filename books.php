<?php

	include_once 'config.php';
	$genre = mysqli_real_escape_string($db,$_REQUEST['genre']);
	if($genre == 0) {
		$sqls = "SELECT * FROM BOOK";
	}
	else {
		$sqls = "SELECT * FROM BOOK WHERE genre = '$genre'";
	}
	
	error_log($sqls);
	$responseString = "";
	
	if ($stmt = mysqli_prepare($db, $sqls)) {
		/* execute statement */
		mysqli_stmt_execute($stmt);

		/* bind result variables */
		mysqli_stmt_bind_result($stmt, $isbn, $title, $author, $price, $publisher, $imgsrc, $genre);

		/* fetch values */
		while (mysqli_stmt_fetch($stmt)) {
			$responseString = $responseString . "
			<div class='bookcontainer'>
					<img src='".$imgsrc."'>
					<h3>".$title."</h3>
					<p>".$author."</p>
					<p>".$price."</p>
					<p>".$publisher."</p>
			</div>
			";
		}
    }
	echo $responseString;

?>