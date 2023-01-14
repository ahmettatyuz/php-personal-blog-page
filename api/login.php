<?php 
session_start();
    require("connection.php");
    require("functions.php");
    $username = post("USERNAME");
    $password = post("PASSWORD");
    $hashedPassword = password_hash($password,PASSWORD_BCRYPT);

    $loginData = getLoginData($conn,$username);

    if(password_verify($password,$loginData["PASSWORD"])){
        $_SESSION["auth"]="admin";
        $_SESSION["adminId"]=$loginData["ID"];
        $_SESSION["adminName"]=$loginData["NAMESURNAME"];
        $_SESSION["adminUsername"] = $username;
        $_SESSION["alert"]="passwordSuccess";
        header("Location:../makaleler");
    }else{
        $_SESSION["alert"]="loginError";
        header("Location:../makaleler");
       
    }
        