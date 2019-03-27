<?php
   
	// EDIT THE 2 LINES BELOW AS REQUIRED
	$email_to = "zchryrvt@gmail.com";
	$email_subject = "ContactFormRespond";
   
	$dbServer = "localhost";
	$dbUsername = "rivaitz_admin";
	$dbPassword = "zachy90";
	$dbDatabase = "rivaitz_db";

	$db = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbDatabase);

	if($db->connect_error) {
		echo "Error: " . mysqli_error();
		die('Connection Error' . mysqli_connect_errno() . mysqli_connect_error());		
	}

?>