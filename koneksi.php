<?php
$host = 'localhost';
$db = 'simple_crud';
$user = 'root'; // Sesuaikan dengan username MySQL Anda
$pass = ''; // Sesuaikan dengan password MySQL Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
