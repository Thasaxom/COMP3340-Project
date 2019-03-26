<?php

session_start();

// logout admin
if(isset($_SESSION["admin"]) && $_SESSION["admin"] === true){
    session_destroy();
    header("Location: index.php");
} // logout user
elseif(isset($_SESSION["user"]) && $_SESSION["user"] === true)){
    session_destroy();
    header("Location: index.php");
}
else{ //guest
    header("Location: index.php");
}

?>