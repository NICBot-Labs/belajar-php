<?php
require_once 'config.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='index.php';</script>";
    exit;
}

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("UPDATE producs SET quantity = quantity - 1 WHERE ID = :id AND quantity > 0");
    $stmt->execute([':id' => $id]);

    header('Location: index.php');
    exit;
} catch (PDOException $e) {
    echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href='index.php';</script>";
}
