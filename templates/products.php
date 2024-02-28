<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <?php
    include '../config/check_admin.php';
    $is_admin = isUserAdmin();

    if ($is_admin) {
        include '../templates/header_admin.php';
    } else {
        include '../templates/header_user.php';
    }
    ?>
</head>

<body>

    <div class="container mt-5">
        <h1>Listado de Productos</h1>
        <div class="row mt-3">
            <?php
            include '../config/get_products.php';

            $productos = obtenerProductos();

            if (!empty($productos)) {
                foreach ($productos as $producto) {
                    echo '<div class="col-md-4 mb-3">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $producto['nombre'] . '</h5>';
                    echo '<p class="card-text">' . $producto['descripcion'] . '</p>';
                    echo '<p class="card-text">Categoría: ' . $producto['categoria'] . '</p>';
                    echo '<p class="card-text">Cantidad Disponible: ' . $producto['cantidad_disponible'] . '</p>';
                    echo '<p class="card-text">Precio Unitario: ' . $producto['precio_unitario'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-md-12">';
                echo '<p>No se encontraron productos.</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php include '../templates/footer.php'; ?>
</body>

</html>