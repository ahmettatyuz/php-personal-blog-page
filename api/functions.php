<?php
function get($key)
{
    return $_GET[$key];
}

function post($key)
{
    return strip_tags(htmlspecialchars($_POST[$key]));
}

function getMakale($conn, $id = "")
{
    if ($id == "") {
        $query = $conn->prepare("SELECT makale.id,makale.title,makale.content,kategori.CATEGORY,user.NAMESURNAME as author,makale.date FROM `makale` 
        INNER JOIN kategori on kategori.id=MAKALE.CATEGORY 
        INNER JOIN user on user.id=MAKALE.author 
        ORDER BY DATE DESC");
    } else {
        $query = $conn->prepare("SELECT makale.id,makale.title,makale.content,kategori.CATEGORY,user.NAMESURNAME as author,makale.date FROM `makale` 
        INNER JOIN kategori on kategori.id=MAKALE.CATEGORY 
        INNER JOIN user on user.id=MAKALE.author WHERE makale.id=:makale_id;");
        $query->bindParam(":makale_id", $id);
    }

    if ($query->execute()) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return -1;
    }
}

function createMakale($conn, $title, $content, $category, $author)
{
    $query = $conn->prepare("INSERT INTO MAKALE (TITLE,CONTENT,CATEGORY,AUTHOR) VALUES (:title,:content,:category,:author)");
    $query->bindParam(":title", $title);
    $query->bindParam(":content", $content);
    $query->bindParam(":category", $category);
    $query->bindParam(":author", $author);
    if ($query->execute()) {
        return true;
    } else {
        return false;
    }
}

function createComment($conn, $comment, $makale_id, $email, $namesurname)
{
    $query = $conn->prepare("INSERT INTO YORUM (MAKALE_ID,COMMENT,EMAIL,NAMESURNAME) VALUES (:makale_id,:comment,:email,:namesurname)");
    $query->bindParam(":makale_id", $makale_id);
    $query->bindParam(":comment", $comment);
    $query->bindParam(":email", $email);
    $query->bindParam(":namesurname", $namesurname);
    if ($query->execute()) {
        return true;
    } else {
        return false;
    }
}

function getComments($conn, $makale_id)
{
    $query = $conn->prepare("SELECT * FROM YORUM WHERE makale_id=:id");
    $query->bindParam(":id", $makale_id);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getDers($conn)
{
    $query = $conn->prepare("SELECT * FROM DERS");
    if ($query->execute()) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function createDers($conn, $name, $content, $credit,$ogretmen)
{
    $query = $conn->prepare("INSERT INTO DERS (NAME,CONTENT,CREDIT,OGRETMEN) VALUES (:name,:content,:credit,:ogretmen)");
    $query->bindParam(":name", $name);
    $query->bindParam(":content", $content);
    $query->bindParam(":credit", $credit);
    $query->bindParam(":ogretmen", $ogretmen);
    if ($query->execute()) {
        return true;
    } else {
        return false;
    }
}

function getLoginData($conn, $username)
{
    $query = $conn->prepare("SELECT * FROM USER WHERE USERNAME=:username");
    $query->bindParam(":username", $username);
    if ($query->execute()) {
        return $query->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function getCategory($conn)
{
    $query = $conn->prepare("SELECT * FROM kategori");
    if ($query->execute()) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function dateFormat($datetime){
    $datetime = explode(" ",$datetime);
    $date = $datetime[0];
    $time = $datetime[1];

    $date = explode("-",$date);
    $date = $date[2]."/".$date[1]."/".$date[0];

    $time = explode(":",$time);
    $time = $time[0].":".$time[1];

    return $date." ".$time;
}

function makaleTitle($title){
    return substr($title,0,12)."...";
}

function year($datetime){
    return substr($datetime,6,4);
}

function countYorum($conn,$makale_id){
    $query=$conn->prepare("SELECT count(*) as COUNT from YORUM where MAKALE_ID=:makale_id");
    $query->bindParam(":makale_id",$makale_id);
    if($query->execute()){
        return $query->fetch()["COUNT"];
    }
}

function getMakaleWhereKategori($conn,$kategeori_id){
    $query=$conn->prepare("SELECT makale.id,makale.title,makale.content,kategori.CATEGORY,user.NAMESURNAME as author,makale.date FROM MAKALE
    INNER JOIN kategori on kategori.id=MAKALE.CATEGORY 
    INNER JOIN user on user.id=MAKALE.author WHERE MAKALE.CATEGORY=:kategori_id");
    $query->bindParam(":kategori_id",$kategeori_id);

    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);

}