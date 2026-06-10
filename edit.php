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
    
    $stmt = $pdo->prepare("SELECT * FROM producs WHERE ID = :id");
    $stmt->execute([':id' => $id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$product) {
        echo "<script>alert('Produk tidak ditemukan'); window.location.href='index.php';</script>";
        exit;
    }
} catch (PDOException $e) {
    echo "<script>alert('Error: " . $e->getMessage() . "'); window.location.href='index.php';</script>";
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container-xxl">
        <nav class="navbar navbar-expand-lg bg-primary text-light">
            <div class="container-fluid text-white">
                <a class="navbar-brand text-white" href="index.php">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4" style="max-width: 600px;">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Product</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="process_edit.php">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['ID']); ?>">
                        
                        <div class="mb-3">
                            <label for="inputProductName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="inputProductName" name="name_product" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="inputPrice" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="inputQuantity" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
