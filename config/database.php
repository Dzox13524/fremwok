<?php
define('DB_HOST','localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'utsphp');

$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

$options = [
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    return $pdo;
} catch (PDOException $e) {
    die("Koneksi Database Gagal: " . $e->getMessage());
}