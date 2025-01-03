<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM items WHERE id = :id");
    $stmt->execute(['id' => $id]);

    header("Location: index.php");
    exit;
}
?>
