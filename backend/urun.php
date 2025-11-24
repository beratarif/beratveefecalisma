<?php
header('Content-Type: application/json; charset=utf-8');

require_once 'db.php';

if (isset($_GET['islem'])) {
    try {
        switch ($_GET['islem']) {
            case 'anasayfa':
                $urun_sayisi = 9;

                $urun_getir_biraz = $pdo->prepare('SELECT * FROM urunler WHERE aktiflik = 1 LIMIT :urun_sayisi');
                $urun_getir_biraz->bindValue(':urun_sayisi', $urun_sayisi, PDO::PARAM_INT);

                $urun_getir_biraz->execute();

                echo json_encode($urun_getir_biraz->fetchAll(PDO::FETCH_ASSOC));
                break;
            case 'urunler':
                $sayfa_basina_urun_sayisi = 9;

                $sayfa = $_GET['sayfa'];
                $kategori = $_GET['kategori'];

                $offset = $sayfa_basina_urun_sayisi * ($sayfa - 1);

                if ($kategori == 'yok') {
                    $sayfa_getir = $pdo->prepare('SELECT * FROM urunler WHERE aktiflik = 1 LIMIT :sayfa_basina_urun_sayisi OFFSET :offset');
                } else {
                    $sayfa_getir = $pdo->prepare('SELECT * FROM urunler WHERE aktiflik = 1 AND kategori = :kategori LIMIT :sayfa_basina_urun_sayisi OFFSET :offset');
                    $sayfa_getir->bindValue(':kategori', $kategori, PDO::PARAM_STR);
                }
                $sayfa_getir->bindValue(':sayfa_basina_urun_sayisi', $sayfa_basina_urun_sayisi, PDO::PARAM_INT);
                $sayfa_getir->bindValue(':offset', $offset, PDO::PARAM_INT);
                $sayfa_getir->execute();
                
                echo json_encode($sayfa_getir->fetchAll(PDO::FETCH_ASSOC));
                break;
            case 'urun_detay':
                $urun_id = $_GET['id'];

                $detay_getir = $pdo->prepare('SELECT * FROM urunler WHERE aktiflik = 1 AND urun_id = :urun_id LIMIT 1');
                $detay_getir->execute([':urun_id' => $urun_id]);

                echo json_encode($detay_getir->fetch(PDO::FETCH_ASSOC));
                break;
        }
    } catch (PDOException $ex) {
        die('ürün hatası: ' . $ex->getMessage());
    }
}
?>