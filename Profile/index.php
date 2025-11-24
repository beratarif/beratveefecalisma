<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Sayfası
  </title>
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        background-color: #121212;
        color: #e0e0e0;
        font-family: "Inter", sans-serif;
      }
      .profile-card {
        max-width: 500px;
        margin: 60px auto;
        background: #1e1e1e;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      }
      .form-control {
        background-color: #2a2a2a;
        color: #fff;
        border: none;
      }
      .form-control:focus {
        background-color: #333;
        color: #fff;
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
      }
      .btn-primary {
        background-color: #007bff;
        border: none;
      }
      .btn-primary:hover {
        background-color: #0056b3;
      }
      .avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        object-fit: cover;
      }
    </style>
</head>
<body>
  
  <div class="profile-card text-center">
    <img src="" alt="Profil Fotoğrafı" class="avatar mb-3"/>
    <h4>Kullanıcı adı</h4>  <!--Giriş Yapılan Kullanıcı Adı Yazılacak-->
    <p class="text-white">email</p> <!--Kayıt olana email yazılacak-->
    <button class="btn btn-primary mt-2">Profili Düzenle</button>
    <hr/>
    <form action="profile.php">
      <div class="row mb-3">
        <div class="col">
          <label class="form-label">Ad</label>
          <input type="text" name="Kullanıcı adı" class="form-control" value="Kullanıcı_adı" />
        </div>
        <div class="col">
          <label class="form-label">soyad</label>
          <input type="text" name="soyad" class="form-control" value="soyad"/>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">email</label>
        <input type="email" name="email" class="form-control" value="email" disabled>
      </div>
      <div class="mb-3">
        <label class="form-label">Mevcut Şifre</label>
        <input type="password" name="password" class="form-control" placeholder="Mevcut Şifre">
      </div>
      <div class="mb-3">
        <label class="form-label">Yeni Şifre</label>
        <input type="password" name="" placeholder="Yeni Şifre giriniz" class="form-control">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Profil Fotoğrafı</label>
        <input type="file" name="profil foto" id="" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary w-100 mt-2">Kaydet</button>
    </form>
  </div>
</body>
</html>