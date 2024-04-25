<?php
// Incluye el archivo de conexión para acceder a la variable $conn
include('conect.php');

// Realiza una consulta y muestra los productos
try {
    $consulta = "SELECT * FROM productos"; // La consunta SELECT es guardada en la variable consulta
    $allProducts = $conn->query($consulta); //Allproducts toma el valor de la funcion query pasandole como parametro "consulta"
    $productos = $allProducts->fetchAll(PDO::FETCH_ASSOC); //En la variable productos se almacenan todos los resultados que se obtuvieron en la linea 8
} catch (Exception $event) {
    echo "Error al consultar la base de datos: " . $event->getMessage();
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consigna 02 - MySQL php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles.css">
    <script defer src="script.js"></script>
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
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['ID_Producto'] ?></td>
                    <td><?= $producto['Descripcion'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>