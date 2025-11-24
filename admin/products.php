<?php
require_once '../backend/admin_page.php';

if (!$giris_yapildi) {
  header("location: index.html");
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - Ürünler</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
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
    <h3>Ürünler</h3>
    <button class="btn btn-success mb-3" id="addProductBtn">Ürün Ekle</button>

    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>İsim</th>
          <th>Fiyat</th>
          <th>Kategori</th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody id="productsTableBody">
        <td>Ürün adı</td>
        <td>Ürün fiyatı</td>
        <td>Ürün kategorisi</td>
        <td>
          <button class="btn btn-sm btn-warning me-1" onclick="editProduct">Düzenle</button>
          <button class="btn btn-sm btn-danger" onclick="deleteProduct">Sil</button>
        </td><!-- Ürünler buraya JS ile gelecek -->
      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="productModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Ürün Ekle</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="productForm">
            <input type="hidden" id="productIndex" />
            <div class="mb-3">
              <label class="form-label">Ürün İsmi</label>
              <input
                type="text"
                class="form-control"
                id="productName"
                required />
            </div>
            <div class="mb-3">
              <label class="form-label">Fiyat</label>
              <input
                type="number"
                class="form-control"
                id="productPrice"
                required />
            </div>
            <div class="mb-3">
              <label class="form-label">Kategori</label>
              <input
                type="text"
                class="form-control"
                id="productCategory"
                required />
            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/products.js"></script>
</body>

</html>