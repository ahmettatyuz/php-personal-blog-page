<?php 
    session_start();
    unset($_SESSION["auth"]);
    unset($_SESSION["adminId"]);
    unset($_SESSION["adminName"]);
    unset($_SESSION["adminUsername"]);
    $_SESSION["alert"]="logout";
    header("Location:../makaleler");


?>