<?php
require_once 'session.php';

$giris_yapildi = $giris_yapildi = isset($_SESSION['yetkili_giris_yapildi']) && $_SESSION['yetkili_giris_yapildi'] == true;

if ($giris_yapildi) {
    $yetkili = $_SESSION['yetkili'];
}
?>