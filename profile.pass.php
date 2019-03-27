<?php 

session_start();
$errors = array();

if (isset($_POST['submit'])) {

    include_once 'config.php';

    $cpass = mysqli_real_escape_string($db, $_POST['cpass']);
    $npass = mysqli_real_escape_string($db, $_POST['npass']);

    // form validation
    if (empty($cpass)) {
        array_push($errors, "Your current password is required.");
    }
    if (empty($npass)) {
        array_push($errors, "Your new password is required.");
    }

    $email = $_SESSION["email"];
    $sqls = "SELECT salt, upasshashed FROM USERS WHERE uname = '$email'";

    $salt = ''; // salt
    $up = ''; // phash

    if ($stmt = mysqli_prepare($db, $sqls)) {

        /* execute statement */
        mysqli_stmt_execute($stmt);

        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $s, $p);

        /* fetch values */
        while (mysqli_stmt_fetch($stmt)) {
            $salt = $s;
            $up = $p;
        }

        /* close statement */
        mysqli_stmt_close($stmt);

    }


    $hashpwd = sha1($cpass . $salt);
    $newhashpwd = sha1($npass.$salt);


    if (count($errors) < 1) { // no validation errors 

        if( hash_equals($hashpwd, $up)){

            $sql = "UPDATE USERS SET upasshashed= '$newhashpwd' WHERE uname='$email'"; // sql query 
            mysqli_query($db, $sql);
            header("Location:  profile.php?update_pass=success");
            exit();
        }else{
            header("Location:  profile.php?update_pass=incorrect_password");
            exit();
        }

    } else {
        header("Location:  profile.php?update_pass=validationfailed");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

