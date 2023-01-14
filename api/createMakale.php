<?php 
    require("connection.php");
    require("functions.php");
    $title = post("title");
    $content = $_POST["content"];
    $category= post("CATEGORY");
    $author=post("author");
    $result = createMakale($conn,$title,$content,$category,$author);

    if($result){
        header("Location:../makaleler");
    }

?>