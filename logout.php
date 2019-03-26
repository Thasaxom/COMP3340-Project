<?php

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    session_destroy();
    header("Location: index.php");
}else{
    header("Location: index.php");
}

?>