<?php
    require("functions.php");
    require("connection.php");
    $yorum = post("comment");
    $makale_id=post("makale");
    $adSoyad = post("namesurname");
    $email = post("email");

    createComment($conn,$yorum,$makale_id,$email,$adSoyad);
    header("Location:../makaleDetay?id=$makale_id");
?>

<!-- 

<form name="form1" action="../makaleDetay" method="post">
    <input type="hidden" name="id" value="<?php echo $makale_id;?>">
</form>

<script>
    document.form1.submit();
</script> -->
