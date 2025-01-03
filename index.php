<?php
require 'koneksi.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// READ: Ambil data dari database
$stmt = $pdo->query("SELECT * FROM items");
$items = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Sederhana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>A112314992</h1>
    <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
    
    <h2>Tambah Item</h2>
    <form id="form-add" action="create.php" method="POST" class="mb-4">
        <div class="mb-3">
            <input type="text" id="add-name" name="name" class="form-control" placeholder="Nama Item" required>
        </div>
        <div class="mb-3">
            <textarea id="add-description" name="description" class="form-control" placeholder="Deskripsi"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
    
    <h2>Daftar Item</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['id']) ?></td>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['description']) ?></td>
                <td>
                    <a href="update.php?id=<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $item['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus item ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    // Validasi Form Tambah
    document.getElementById('form-add').addEventListener('submit', function (event) {
        const nameInput = document.getElementById('add-name');
        const descriptionInput = document.getElementById('add-description');

        // Validasi input nama
        if (nameInput.value.trim() === '') {
            alert('Nama item tidak boleh kosong!');
            event.preventDefault(); // Mencegah pengiriman form
            return;
        }

        // Validasi input deskripsi (opsional, jika wajib isi)
        if (descriptionInput.value.trim() === '') {
            alert('Deskripsi tidak boleh kosong!');
            event.preventDefault(); // Mencegah pengiriman form
            return;
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
