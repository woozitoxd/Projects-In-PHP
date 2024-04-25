<?php
require_once ('./ConsignaForm.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $dni = $_POST["dni"];
    $carrera = $_POST["carrera"];

    if (!empty($nombre) && !empty($apellido) && !empty($dni) && !empty($carrera)) {
        // Crear una instancia de Usuario
        $usuario = new estudiante($nombre, $apellido, $dni, $carrera);

        $resultado = $usuario->registrar(); // Guardo el valor devuelto del método registrar en la variable resultado
        if ($resultado == true) {
            header('Location: ./index.php'); // Redirijo a la página de inicio una vez que se registró el usuario
            exit();
        } else {
            // Manejar el caso en el que el registro no fue exitoso
            echo "Error al registrar el usuario: $resultado";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
} else {
    // Alguno de los campos no se envió, muestra un mensaje de error
    echo "Faltan campos en la solicitud.";
}


?>