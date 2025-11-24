<?php
    $host = 'localhost';
    $db = 'kayitol_girisyap';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    
    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
    catch (PDOException $ex) {
        die('sunucu hatası: ' . $ex->getMessage());
    }
?>