<?php
    
    $errors = array();


if(isset($_POST['submit'])){

    include_once 'config.php';
	
	session_start();

    $email = mysqli_real_escape_string($db,$_POST['email']);
    $pass = mysqli_real_escape_string($db,$_POST['pass']);


     // form validation
    if(empty($email)){array_push($errors,"Email is required.");}
    if(empty($pass)){array_push($errors,"Password is required.");}

    $sql = "SELECT uname FROM USERS WHERE uname = '$email'";
    $sqlresult = mysqli_query($db,$sql);
	if($sqlresult == false) {
		echo "query failure";
		exit();
	}
    $salt= '';  
    $up = '';
    
    if(mysqli_num_rows($sqlresult)==1){
       // user exists
       // salt and hash password
       $sqls = "SELECT salt, upasshashed FROM USERS WHERE uname = '$email'";
       
       if ($stmt = mysqli_prepare($db, $sqls)) {

        /* execute statement */
        mysqli_stmt_execute($stmt);
    
        /* bind result variables */
        mysqli_stmt_bind_result($stmt,$s,$p);
    
        /* fetch values */
        while (mysqli_stmt_fetch($stmt)) {
            $salt = $s;
            $up = $p;
        }
    
        /* close statement */
        mysqli_stmt_close($stmt);
    }

    $hashpwd = sha1($pass.$salt);

    if(hash_equals($hashpwd , $up )){
                
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;

        header("Location: index.php");
    }
    else{
        array_push($errors,"Invalid username or password.");
        $autofill = array();
        array_push($autofill,$email);

        $_SESSION["l_errors"] = $errors;
        $_SESSION["l_autofill"] = $autofill;

        header("Location: index.php?login=failed");
        exit();
    }
    

    }
    else{
        array_push($errors,"Invalid username or password.");
        $autofill = array();
        array_push($autofill,$email);

        $_SESSION["l_errors"] = $errors;
        $_SESSION["l_autofill"] = $autofill;
        
        header("Location: index.php?login=usernotfound");
        exit();
    }

}
else{
    header("Location: index.php");
    exit();
}

?>