<?php
require_once '../backend/admin_page.php';

if ($giris_yapildi) {
  header("location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Giriş</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 350px;">
      <h3 class="text-center mb-3">Admin Giriş</h3>
      <form action="../backend/login_admin.php" method="POST" id="loginForm">
        <div class="mb-3">
          <label for="" class="form-label">
            Email
          </label>
          <input type="email" name="eposta" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">
            Şifre
        </label >
          <input type="password" name="sifre" id="password" class="form-control" required>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </div>
        <div id="errorMsg" class="text-danger mt-2" style="display: none;"></div>
      </form>
    </div>

    <script src="js/auth.js"></script>
  </body>
</html>