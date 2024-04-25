<?php
// Incluye el archivo de conexión para acceder a la variable $BaseSTOCK
include('conect.php');

// Incluye la clase formularioProducto
include('class_products.php');

// Crea una instancia de la clase formularioProducto
$formulario = new \App\formularioProducto();

// Verifica si se ha enviado el formulario (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formulario->obtenerFormulario();
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
    <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="descripcion" class="form-label">Ingrese Descripcion:</label>
                <input type="text" class="form-control" id="descripcion" placeholder="descripcion producto" name="descripcion">
            </div>
            <button type="submit" class="btn btn-primary">Enviar Producto</button>
        </form>
    </div>

</body>
</html>