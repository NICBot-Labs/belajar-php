<?php
include 'config.php';

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
    <title>Document</title>
    <style>
        .table-container {
            overflow-x: auto;
        }

        .table-zebra {
            width: 100%;
            border-collapse: collapse;
            font-family: sans-serif;
            font-size: 0.9rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .table-zebra caption {
            caption-side: bottom;
            text-align: right;
            font-size: 0.8rem;
            color: #666;
            padding: 10px 0;
        }

        .table-zebra thead {
            background-color: #2c3e50; /* A dark blue-grey header */
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
    </style>
</head>
<body>
    <div class="table-container">
    <table class="table-zebra">
            <caption>List of Active Users as of Today</caption>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?php echo $product['ID']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>