<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container-xxl">
        <!-- Content here -->
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

        <div class="container mt-3">
            <form method="POST" action="process_add.php">
                <div class="mb-3">
                    <label for="inputProductName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="inputProductName" name="name_product" aria-describedby="nameHelp">
                </div>
                <div class="mb-3">
                    <label for="inputPrice" class="form-label">Price</label>
                    <input type="number" class="form-control" id="inputPrice" name="price">
                </div>
                <div class="mb-3">
                    <label for="inputQuantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="inputQuantity" name="quantity">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>