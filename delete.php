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
    
    $stmt = $pdo->prepare("DELETE FROM producs WHERE ID = :id");
    $stmt->execute([':id' => $id]);
    
    echo "<script>alert('Produk berhasil dihapus'); window.location.href='index.php';</script>";
} catch (PDOException $e) {
    echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href='index.php';</script>";
}
