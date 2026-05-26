<?php
include 'config.php';

try {
 $pdo = new PDO($dsn, $user, $pass);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 echo "Koneksi berhasil";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}

?>