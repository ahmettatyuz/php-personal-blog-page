<?php
$dersler = getDers($conn);
?>

<div class="row">
    <div class="">
        <h1>Dersler</h1>
    </div>
    <hr>
    <?php foreach ($dersler as $ders) : ?>
        <div data-aos="flip-up" class="p-2 col-lg-4 col-6">
            <div class="card text-dark border border-primary shadow">
                <div class="d-flex justify-content-md-around">
                    <div class="icon">
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <div class="p-2 text-center fw-bold">
                        <h2>
                            <?php echo $ders["NAME"]; ?>
                        </h2>
                        <div>
                            Kredi : <?php echo $ders["CREDIT"]; ?>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <div>
                        <b>Öğretmen:</b>
                    </div>
                    <div>
                        <?php echo $ders["OGRETMEN"]; ?>
                    </div>
                </div>
                <div class="p-3">
                    <div>
                        <b>Ders İçeriği:</b>
                    </div>
                    <div>
                        <?php echo $ders["CONTENT"]; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>