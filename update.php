<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("UPDATE items SET name = :name, description = :description WHERE id = :id");
    $stmt->execute(['id' => $id, 'name' => $name, 'description' => $description]);

    header("Location: index.php");
    exit;
} else {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM items WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $item = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Edit Item</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
        <div class="mb-3">
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($item['name']) ?>" required>
        </div>
        <div class="mb-3">
            <textarea name="description" class="form-control"><?= htmlspecialchars($item['description']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
