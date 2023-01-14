<?php 
    require("connection.php");
    require("functions.php");
    $name = post("NAME");
    $content = post("CONTENT");
    $credit = post("CREDIT");
    $ogretmen = post("OGRETMEN");

    $result =createDers($conn,$name,$content,$credit,$ogretmen);

    if($result){
        header("Location:../dersler");
    }

?>