<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto">
        <?php if (isset($_SESSION["auth"])) : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="makaleler" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Makaleler
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="makaleler">Makaleler</a>
              </li>
              <li>  
                <a class="dropdown-item" href="makaleEkle">Makale Ekle
                </a>
              </li>
              <li>
                <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Kategori Ekle
                </button>
              </li>
            </ul>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="makaleler">Makaleler</a>
          </li>
        <?php endif; ?>

        <?php if (isset($_SESSION["auth"])) : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="dersler" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dersler
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="dersler">Dersler</a>
              </li>
              <li>
                <a class="dropdown-item" href="dersEkle">Ders Ekle
                </a>
              </li>
            </ul>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="dersler">Dersler</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="hobiler">Hobiler</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hakkimda">Hakkımda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="iletisim">İletişim</a>
        </li>
      </ul>
      <?php if (!isset($_SESSION["auth"])) : ?>
        <form class="d-flex" role="search">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Giriş
          </button>
        </form>
      <?php else : ?>
        <form class="d-flex" method="POST" action="api/logout.php">
          <div class="d-flex align-items-center"></div>
          <div class="text-white my-auto mx-3">
            Hoşgeldin <?php echo $_SESSION["adminUsername"]; ?>
          </div>
          <div>

            <button type="submit" class="btn btn-danger">
              Çıkış
            </button>
          </div>

        </form>
      <?php endif; ?>
    </div>
  </div>
</nav>