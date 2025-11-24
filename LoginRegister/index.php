<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login / Register</title>
  <link rel="stylesheet" href="scss/style.css">
</head>
<body>
  <div class="container">
    <!-- Giriş Formu -->
    <form action="../backend/login.php" method="post" class="form login-form active">
      <h2>Giriş Yap</h2>
      <input type="email" placeholder="E-posta" name="eposta" required>
      <input type="password" placeholder="Şifre" name="sifre" required>
      <button type="submit">Giriş</button>
      <p>Hesabın yok mu? <a href="#" id="show-register">Kayıt Ol</a></p>
    </form>

    <!-- Kayıt Formu -->
    <form action="../backend/register.php"method="post" class="form register-form">
      <h2>Kayıt Ol</h2>
      <input type="text" placeholder="Ad Soyad" name="ad_soyad" required>
      <input type="email" placeholder="E-posta" name="eposta" required>
      <input type="password" placeholder="Şifre" name="sifre" required>
      <button type="submit">Kayıt Ol</button>
      <p>Zaten hesabın var mı? <a href="#" id="show-login">Giriş Yap</a></p>
    </form>
  </div>

  <script src="script.js"></script>
</body>
</html>
