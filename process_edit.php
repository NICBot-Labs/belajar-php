<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name_product'] ?? '';
    $price = $_POST['price'] ?? 0;
    $quantity = $_POST['quantity'] ?? 0;

    if (!$id || empty($name) || empty($price) || empty($quantity)) {
        echo "<script>alert('Semua field harus diisi'); window.location.href='edit.php?id=" . urlencode($id) . "';</script>";
        exit;
    }

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("UPDATE producs SET name = :name, price = :price, quantity = :quantity WHERE ID = :id");
        $stmt->execute([
            ':name' => $name,
            ':price' => $price,
            ':quantity' => $quantity,
            ':id' => $id
        ]);
        
        echo "<script>alert('Produk berhasil diperbarui'); window.location.href='index.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href='edit.php?id=" . urlencode($id) . "';</script>";
    }
} else {
    header('Location: index.php');
    exit;
}
