<?php if (isset($_SESSION["auth"])) : ?>
    <form action="api/createCategory.php" method="POST">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Kategori Ekle</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <div class="input-group-text">
                                Kategori adı:
                            </div>
                            <input class="form-control" type="text" name="CATEGORY" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                        <button type="submit" class="btn btn-primary">Ekle</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php endif; ?>