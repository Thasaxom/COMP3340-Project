<?php
	include_once 'config.php';
	
	$isbn = mysqli_real_escape_string($db,$_POST['risbn']);
	
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