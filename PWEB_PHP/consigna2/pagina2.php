<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONSIGNA 2 - PHP</title>
</head>
<body>
    Formulario Recibido:</br>
    <p>Nombre:</p>
    <?php
        echo $_GET['nombre']
    ?></br>
    <p>Contraseña:</p>
    <?php
        echo $_GET['pswd']
    ?>
</body>
</html>