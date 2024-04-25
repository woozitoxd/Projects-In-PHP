<?php
    // Incluye el archivo de conexión para acceder a la variable $BaseSTOCK
    include('conect.php');

    // Incluye la clase formularioProducto
    include('class_products.php');

    // Crea una instancia de la clase formularioProducto
    
    $formulario = new \App\formularioProducto();
    $products = $formulario->obtenerForm();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recupera los datos del formulario
        $id_producto = isset($_POST['idprod']) ? $_POST['idprod'] : null;

        // Llama al método para actualizar el producto
        $formulario->actualizarProducto($id_producto);

    }   
// Resto del código HTML que muestra el formulario y mensajes de éxito o error
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consinga 3 PHP MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>

        <table class="table table-responsive text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $producto): ?>
                        <tr>
                            <td><?= $producto['ID_Producto'] ?></td>
                            <td><?= $producto['Descripcion'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
        </table>

        <div class="container">
                <form action="" method="post">

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Ingrese el ID del producto a eliminar:</label>
                        <input type="number" class="form-control" id="idprod" placeholder="ID producto" name="idprod">
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Producto</button>
                </form>
        </div>
</body>
</html>