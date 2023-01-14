<?php
$uri = $_SERVER['REQUEST_URI'];
$makale_id = explode("=", $uri)[1];
$makale = getMakale($conn, $makale_id)[0];
$comments = getComments($conn, $makale_id);

?>

<div class="card border-primary p-4">
    <div class="d-flex justify-content-between">
        <div>
            <h1><?php echo $makale["title"]; ?></h1>
            <div> <b>Eklenme Tarihi :</b>  <?php echo dateFormat($makale["date"]); ?></div>
            <div> <b>Kategori :</b>  <?php echo $makale["CATEGORY"]; ?></div>
        </div>
        <div>
            <img width="70" src="https://cdn-icons-png.flaticon.com/512/88/88167.png" alt="">
        </div>
    </div>

    <hr>
    <p><?php echo $makale["content"] ?></p>
    <div class="d-flex justify-content-end">
        Yazar : 
        <?php echo $makale["author"] ?>
    </div>
</div>

<div class="mt-5">
    <div class="my-2">
        <h4>Yorum Yap</h4>
    </div>
    <div class="card border-success p-4 rounded-0 rounded-top">
        <form action="api/addComment.php" method="post">
            <input type="hidden" name="makale" value="<?php echo $makale["id"]; ?>">
            <div class="row my-2">
                <div class="col-lg-6 col-12">
                    <input type="text" name="namesurname" class="form-control" placeholder="Adınızı ve soyadınızı girin..." required>
                </div>
                <div class="col-lg-6 col-12">
                    <input type="email" name="email" class="form-control" placeholder="Email adresinizi girin..." required>
                </div>

            </div>

            <textarea class="form-control" name="comment" id="comment" cols="30" rows="2" placeholder="Bir yorum yazın..." required></textarea>
            <div class="d-flex justify-content-end mt-2">
                <button class="btn btn-primary">Yorum Yap</button>
            </div>

        </form>
    </div>
</div>

<?php foreach ($comments as $comment) : ?>
    <div class="card border-success rounded-0">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <b><?php echo $comment["NAMESURNAME"]; ?></b>
                </div>
                <div>
                    <a href="mailto:<?php echo $comment["EMAIL"] ?>"><?php echo $comment["EMAIL"] ?></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php echo $comment["COMMENT"]; ?>
            <div class="d-flex justify-content-end">
                <?php echo $comment["DATE"] ?>
            </div>
        </div>
    </div>

<?php endforeach; ?>