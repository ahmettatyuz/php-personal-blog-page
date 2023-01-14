<?php 
    require("connection.php");
    require("functions.php");
    $categoryName = post("CATEGORY");
    $query = $conn->prepare("INSERT INTO `kategori` (`CATEGORY`) VALUES (:kategori)");
    $query->bindParam(":kategori",$categoryName);
    if($query->execute()){
        header("Location:../makaleler?alert=success");
    }else{
        header("Location:../makaleler?alert=error");
    }


?>