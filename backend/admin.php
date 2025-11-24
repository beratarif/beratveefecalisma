<?php
header('Content-Type: application/json; charset=utf-8');

require_once 'db.php';

switch ($_GET['islem']) {
    case 'dashboard':
        $kullanicilari_getir = $pdo->query('SELECT COUNT(*) FROM kullanicilar');
        $kullanicilar = $kullanicilari_getir->fetchColumn();

        $siparisleri_getir = $pdo->query("SELECT COUNT(*) FROM siparisler WHERE durum != 'Tamamlandı'");
        $siparisler = $siparisleri_getir->fetchColumn();

        echo json_encode(['kullanicilar' => $kullanicilar, 'siparisler' => $siparisler]);
        break;
}
?>