<?php
require_once '../backend/admin_page.php';

if (!$giris_yapildi) {
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Paneli - Dashboard</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="dashboard.php">Admin Panel</a>

    <div class="ms-auto d-flex align-items-center gap-2">
      <button onclick="window.location.href='dashboard.php'" class="btn btn-outline-light btn-sm">
        Dashboard
      </button>
      <button onclick="window.location.href='products.php'" class="btn btn-outline-light btn-sm">
        Ürünler
      </button>
      <button onclick="window.location.href='orders.php'" class="btn btn-outline-light btn-sm">
        Sipariş Durumu
      </button>
      <?php if ($giris_yapildi): ?>
        <div class="dropdown">
          <button
            class="btn btn-outline-light btn-sm dropdown-toggle text-uppercase fw-semibold"
            type="button"
            id="userDropdown"
            data-bs-toggle="dropdown"
            aria-expanded="false">
            <?php echo htmlspecialchars($yetkili['ad_soyad']); ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item text-danger" href="../backend/logout.php?hangi_cikis=yetkili">Çıkış Yap</a></li>
          </ul>
        </div>
      <?php else: ?>
        <button
          onclick="window.location.href='./index.html'"
          class="btn btn-outline-light btn-sm">
          Giriş Yap
        </button>
      <?php endif; ?>
    </div>
  </nav>


  <div class="container mt-4">
    <h3>Dashboard</h3>
    <div class="row mt-3" id="statsRow">
      <!-- Box 1 -->
      <div class="col-md-4 mb-3">
        <div class="card text-center shadow-sm p-3">
          <h5 class="card-title">Toplam Kullanıcı</h5>
          <p class="card-text display-6 kullanicilar" id="totalUsers">-</p>
        </div>
      </div>

      <!-- Box 2 -->
      <div class="col-md-4 mb-3">
        <div class="card text-center shadow-sm p-3">
          <h5 class="card-title">Toplam Sipariş</h5>
          <p class="card-text display-6 siparisler" id="totalOrders">-</p>
        </div>
      </div>

      <!-- Box 3 -->
      <div class="col-md-4 mb-3">
        <div class="card text-center shadow-sm p-3">
          <h5 class="card-title">Toplam Gelir</h5>
          <p class="card-text display-6" id="totalRevenue">-</p>
        </div>
      </div>
    </div>
  </div>

  <script>
    async function dashboardGetir() {
      const stats_row = document.getElementById("statsRow");

      try {
        const sonuc = await fetch("../backend/admin.php?islem=dashboard");
        const dashboard = await sonuc.json();

        stats_row.querySelector(".kullanicilar").innerHTML = `${dashboard.kullanicilar}`;
        stats_row.querySelector(".siparisler").innerHTML = `${dashboard.siparisler}`;

      } catch (err) {
        console.error(`hata: ${err}`);
      }
    }

    document.addEventListener("DOMContentLoaded", async () => {
      await dashboardGetir();
    });
  </script>
</body>

</html>