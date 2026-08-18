<?php

$host = 'localhost';
$db   = 'bnspboot_9';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {

    $pdo = new PDO($dsn, $user, $pass);

    // Mode error PDO
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    // Hasil query langsung berupa associative array
    $pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

} catch (PDOException $e) {

    die(
        "Koneksi database gagal: "
        . $e->getMessage()
    );

}
?>