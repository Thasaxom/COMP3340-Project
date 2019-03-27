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