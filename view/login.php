<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Giriş</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="girisForm" action="api/login.php" method="POST" name="girisForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="input-group mb-3">
                                <div style="width: 120px;" class="input-group-text">
                                    Kullanıcı adı
                                </div>
                                <input type="text" class="form-control" name="USERNAME">
                            </div>
                            <div class="input-group">
                                <div style="width: 120px;" class="input-group-text">
                                    Parola
                                </div>
                                <input id="pwinput" type="password" class="form-control pw" name="PASSWORD">
                                <div class="input-group-text pwBtn">
                                    <i class="fa-solid fa-eye eye"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                        <button id="girisBtn" class="btn btn-primary" data-bs-dismiss="modal">Giriş</button>
                    </div>
                </form>

            </div>
        </div>
    </div>