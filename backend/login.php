<?php
require_once 'db.php';
require_once 'session.php';

try {
    $eposta = $_POST['eposta'];
    $sifre = $_POST['sifre'];

    // şifrelenmiş şifreyi getirmek için ve diğer kullanıcı bilgileri için eğer var ise kullanıcıyı getir
    $kullanici_getir = $pdo->prepare('SELECT * FROM kullanicilar WHERE eposta = :eposta');
    $kullanici_getir->execute([':eposta' => $eposta]);
    $kullanici = $kullanici_getir->fetch(PDO::FETCH_ASSOC);

    // kullanıcı kontrolü
    if (!$kullanici)
        die('kullanıcı bulunamadı');

    // şifre kontrolü
    if (!password_verify($sifre, $kullanici['sifre']))
        die("şifre yanlış");

    // session ve sayfa yönlendirme gibi işlemler
    GirisYapSession([
        'ad_soyad' => $kullanici['ad_soyad'], 
        'id' => $kullanici['kullanici_id']
    ]);
} catch (PDOException $ex) {
    die('girişyap hatası: ' . $ex->getMessage());
}
?>