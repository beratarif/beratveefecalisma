<nav class="navbar navbar-expand-lg bg-light border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Mağazam</a>
    <button
      class="navbar-toggler"
      data-bs-toggle="collapse"
      data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Anasayfa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Product/product.php">Ürünler</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Sepet/basket.php">Sepet</a>
        </li>

        <?php if ($giris_yapildi): ?>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle text-uppercase fw-semibold"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false">
              <?php echo htmlspecialchars($kullanici['ad_soyad']); ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item text-primary" href="Profil/index.php">Profil</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-danger" href="./global backend/logout.php?hangi_cikis=normal">Çıkış Yap</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a href="./LoginRegister/index.php" class="nav-link">Giriş</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>