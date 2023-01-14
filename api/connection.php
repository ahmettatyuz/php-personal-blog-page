<?php 
    try{
        $conn = new PDO("mysql:host=localhost;dbname=kisisel_blog;charset=utf8","root","");
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

?>
