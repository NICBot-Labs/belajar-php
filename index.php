<?php
include 'config.php';

$products = [];

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'Koneksi berhasil' . '<br>';
    // foreach ($products as $product) {
    //     echo $product['name'] . '<br>';
    //     echo $product['price'] . '<br>';
    //     echo $product['quantity'] . '<br>';
    // }
    $query = 'SELECT * FROM producs';
    $stmt = $pdo->query($query);
    $products = $stmt->fetchAll();
} catch (PDOException $e) {
    echo 'Koneksi gagal: ' . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .table-container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        .header-container {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header-container h2 {
            margin: 0;
            color: #2c3e50;
        }

        .btn-add {
            display: inline-block;
            background-color: #2ecc71;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.9rem;
            transition: background-color 0.2s;
        }

        .btn-add:hover {
            background-color: #27ae60;
        }

        .table-zebra {
            width: 100%;
            border-collapse: collapse;
            font-family: sans-serif;
            font-size: 0.9rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .table-zebra caption {
            caption-side: bottom;
            text-align: right;
            font-size: 0.8rem;
            color: #666;
            padding: 10px 0;
        }

        .table-zebra thead {
            background-color: #2c3e50;
            /* A dark blue-grey header */
            color: #ffffff;
        }

        .table-zebra th,
        .table-zebra td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dddddd;
        }

        /* This is the magic for the zebra-striping */
        .table-zebra tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .table-zebra tbody tr:last-of-type {
            border-bottom: 2px solid #2c3e50;
        }

        /* Optional: Add a hover effect for better user interaction */
        .table-zebra tbody tr:hover {
            background-color: #e2e8f0;
            cursor: pointer;
        }

        .btn-action {
            display: inline-block;
            padding: 6px 12px;
            font-size: 0.8rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 4px;
            margin-right: 5px;
            transition: background-color 0.2s;
        }

        .btn-edit {
            background-color: #3498db;
            color: white;
        }

        .btn-edit:hover {
            background-color: #2980b9;
        }

        .btn-delete {
            background-color: #e74c3c;
            color: white;
        }

        .btn-kurang {
            background-color: #f7f201ff;
            color: black;
            font-weight: bold;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="container-xxl">
        <nav class="navbar navbar-expand-lg bg-primary text-light">
            <div class="container-fluid text-white">
                <a class="navbar-brand text-white" href="index.php">GUDANG PRODUK</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-white" href="add.php">Add Produk</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-warning  text-white" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="header-container">
            <h2>Product Catalog</h2>
            <a href="add.php" class="btn-add">+ Add Product</a>
        </div>
        <table class="table-zebra">
            <caption>List of Active Users as of Today</caption>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?php echo $product['ID']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td>
                            <a href="update_stock.php?id=<?php echo $product['ID']; ?>" class="btn-stock btn-minus"></a>
                            <span class="stock-value"><?php echo $product['quantity']; ?></span>
                            <a href="update_stock.php?id=<?php echo $product['ID']; ?>" class="btn-stock btn-plus"></a>
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $product['ID']; ?>" class="btn-action btn-edit">Edit</a>
                            <a href="delete.php?id=<?php echo $product['ID']; ?>" class="btn-action btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Delete</a>
                            <a href="process_kurang.php?id=<?php echo $product['ID']; ?>" class="btn-action btn-kurang"> - </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>