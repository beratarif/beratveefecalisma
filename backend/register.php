<?php
require_once 'db.php';
require_once 'session.php';

session_start();

try {
    // ad soyad kontrolü
    $ad_soyad = $_POST['ad_soyad'];
    if (empty($ad_soyad))
        die('ad soyad bölümü boş bırakılamaz');
    else if (strlen($ad_soyad) > 60)
        die("ad soyad bölümü 60 karakteri geçemez");

    // eposta kontrolü
    $eposta = $_POST['eposta'];
    if (empty($eposta))
        die("eposta bölümü boş bırakılamaz");
    else if (!filter_var($eposta, FILTER_VALIDATE_EMAIL))
        die('eposta bölümü geçersiz olamaz');
    else if (strlen($eposta) > 100)
        die('eposta bölümü 100 karakteri geçemez');

    // şifre kontrolü
    $sifre = $_POST['sifre'];
    if (empty($sifre))
        die("şifre bölümü boş bırakılamaz");
    else if (strlen($sifre) > 30)
        die('şifre bölümü 30 karakteri geçemez');

    $sifre = password_hash($sifre, PASSWORD_DEFAULT);

    // sunucu kayıt işlemi
    $kayitol = $pdo->prepare('INSERT INTO kullanicilar (ad_soyad, eposta, sifre) VALUES (:ad_soyad, :eposta, :sifre)');
    $kayitol->execute([
        ':ad_soyad' => $ad_soyad,
        ':eposta' => $eposta,
        ':sifre' => $sifre
    ]);

    // session ve sayfa yönlendirme gibi işlemler
    GirisYapSession([
        'ad_soyad' => $ad_soyad, 
        'id' => $pdo->lastInsertId()
    ]);
} catch (PDOException $ex) {
    die('kayıtol hatası: ' . $ex->getMessage());
}
?>