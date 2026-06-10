<?php
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name_product'] ?? '';
    $price = $_POST['price'] ?? 0;
    $quantity = $_POST['quantity'] ?? 0;

    if (empty($name) || empty($price) || empty($quantity)) {
        echo "<script>alert('Semua field harus diisi'); window.location.href='add.php';</script>";
        exit;
    }

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("INSERT INTO producs (name, price, quantity) VALUES (:name, :price, :quantity)");
        $stmt->execute([
            ':name' => $name,
            ':price' => $price,
            ':quantity' => $quantity
        ]);
        echo "<script>alert('berhasil di simpan'); window.location.href='add.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href='add.php';</script>";
    }
} else {
    header('Location: add.php');
    exit;
}
