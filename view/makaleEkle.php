<?php if (isset($_SESSION["auth"])) : ?>
    <?php $categories = getCategory($conn); ?>
    <form action="api/createMakale.php" method="POST">
        <div class="card">
            <div class="row p-3">
                <div class="col-12 my-2">
                    <div class="">
                        <label for="title">Makale Başlığı: </label>
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <input id="title" class="form-control" type="text" placeholder="Bir başlık girin..." name="title" required>
                            </div>
                            <div class="col-lg-4 col-12">
                                <select class="form-select" name="CATEGORY" id="" required>
                                    <option value="" selected disabled>Bir kategori seçin</option>
                                    <?php foreach ($categories as $category) : ?>
                                        <option value="<?php echo $category["ID"]; ?>"><?php echo $category["CATEGORY"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 my-2">
                    <textarea name="content" id="content" placeholder="Makalenizi yazmaya başlayın !"></textarea>
                </div>

                <div class="d-flex justify-content-end my-2">
                    <div class="col-lg-3 col-12 text-end">
                        Yazar : <?php echo $_SESSION["adminName"]; ?>
                        <input type="hidden" name="author" value="<?php echo $_SESSION["adminId"]; ?>">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <a class="btn btn-danger w-25" href="makaleler">İptal</a>
                    <button class="btn btn-warning w-25" type="reset">Sıfırla</button>
                    <button class="btn btn-success w-25" type="submit">Kaydet</button>
                </div>
            </div>
        </div>
    </form>

<?php else : ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Erişim Yasak</h4>
        <p>Bu sayfaya erişiminiz yoktur! Makale eklemek için <b>admin girişi</b> gereklidir !</p>
        <hr>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-success w-25" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Giriş Yap
            </button>
        </div>
    </div>
<?php endif; ?>

<script>
    tinymce.init({
        selector: '#content',
    });
</script>