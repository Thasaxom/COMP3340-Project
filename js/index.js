function loginScript() {
	var session = '<?php echo isset($_SESSION);?>';
	if(session == true) document.getElementById("loginarea").innerHTML = "logged in";
}