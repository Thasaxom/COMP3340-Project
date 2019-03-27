<?php
	include_once 'config.php';
	
	$isbn = mysqli_real_escape_string($db,$_POST['risbn']);
	
	$sql = "SELECT * FROM BOOK WHERE isbn = '$isbn'";
    $sqlresult = mysqli_query($db,$sql);
        
    if(mysqli_num_rows($sqlresult)!=0) {
		header("Location:  profile.php?isbnalreadyexists");
		exit();
	}
	
	$sql = "DELETE FROM BOOK WHERE isbn = '$isbn';";

	$result = mysqli_query($db,$sql);
	if($result == false) {
		header("Location:  profile.php?removeproduct=failure");
		error_log(mysqli_error($db));
		exit();
	}
	
	header("Location:  profile.php?removeproduct=success");
	exit();
	
?>