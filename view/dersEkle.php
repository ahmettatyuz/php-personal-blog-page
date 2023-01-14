<?php if (isset($_SESSION["auth"])) : ?>
    <form action="api/createDers" method="POST">
        <div class="card border-primary p-3">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <h3>Ders Ekle</h3>
                    <div style="height: 100%;" class="d-flex align-items">
                        <div>
                            <input type="text" name="NAME" class="form-control mt-3" required placeholder="Dersin adını girin...">

                            <input type="text" name="OGRETMEN" class="form-control mt-3" required placeholder="Öğretmen adı girin...">

                            <select class="form-select my-3" name="CREDIT" id="credit" required>
                                <option value="" selected disabled>Bir kredi seçiniz</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <textarea class="form-control" cols="30" rows="10" name="CONTENT" required placeholder="Dersin içeriğini girin..."></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-around my-2">
                <a class="btn btn-danger w-25" href="dersler">İptal</a>
                <button type="reset" class="btn btn-warning w-25">Sıfırla</button>
                <button type="submit" class="btn btn-success w-25">Ekle</button>
            </div>


        </div>
    </form>

<?php else : ?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Erişim Yasak</h4>
        <p>Bu sayfaya erişiminiz yoktur! Ders eklemek için <b>admin girişi</b> gereklidir !</p>
        <hr>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-success w-25" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Giriş Yap
            </button>
        </div>
    </div>
<?php endif; ?>