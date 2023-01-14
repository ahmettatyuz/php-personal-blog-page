<?php
$uri = $_SERVER['REQUEST_URI'];
@$kategori_id = explode("=", $uri)[1];
// echo $kategori_id;  

if (isset($kategori_id)) {
    $makaleler = getMakaleWhereKategori($conn, $kategori_id);
} else {
    $makaleler = getMakale($conn);
}
$kategoriler = getCategory($conn);

?>
<div class="row">
    <div class="d-flex justify-content-center">
        <div>
            <a href="makaleler" class="btn btn-outline-primary me-3">Tüm Makaleler</a>
        </div>
        <?php foreach ($kategoriler as $kategori) : ?>
            <div>
                <a class="btn btn-outline-primary me-3" href="makaleler?kategori=<?php echo $kategori["ID"] ?>"><?php echo $kategori["CATEGORY"] ?></a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if (!empty($makaleler)) : ?>
        <?php foreach ($makaleler as $makale) : ?>
            <div data-aos="zoom-out-down" class="col-lg-4 col-md-6 col-12">
                <div class="card border-primary my-2 pt-3">
                    <div class="mx-auto">
                        <img src="https://cdn-icons-png.flaticon.com/512/88/88167.png" width="150" class="img-fluid" alt="...">
                    </div>
                    <div class="card-body p-0 py-3 px-1">
                        <div class="d-flex justify-content-between align-items-end">
                            <div>
                                <h4>
                                    <?php echo makaleTitle($makale["title"]); ?>
                                </h4>
                            </div>
                            <div>
                                <?php echo year(dateFormat($makale["date"])); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <div class="detaylar">
                            <form action="makaleDetay" method="GET">
                                <button class="btn btn-primary" type="submit" name="id" value="<?php echo $makale['id'] ?>">
                                    Detaylar
                                </button>
                            </form>
                        </div>
                        <div class="text-end">
                            <?php echo countYorum($conn, $makale["id"]); ?> yorum
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="d-flex justify-content-center mt-5 text-center">
            <div class="alert alert-warning col-lg-6 col-12">
                Hiç makale yazılmamış.
            </div>
        </div>

    <?php endif; ?>
</div>