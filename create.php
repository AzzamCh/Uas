<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO items (name, description) VALUES (:name, :description)");
    $stmt->execute(['name' => $name, 'description' => $description]);

    header("Location: index.php");
    exit;
}
?>
