<?php
require_once("datos.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    //Las variables toman el valor del input ingresado, y si no tiene nada, toma el valor de NULL
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $poder = isset($_POST['Poder']) ? $_POST['Poder'] : null;
    $estado = isset($_POST['estadoSeleccionado']) ? $_POST['estadoSeleccionado'] : null;

    // Validación de campos vacíos
    if (empty($nombre) || empty($poder) || is_null($estado)) {
        echo "Campos vacíos"; // Muestra el mensaje de error
    } else {
        $personajeSSJ = new Personaje($nombre, $poder, $estado);

        $resultado = $personajeSSJ->insertarSaiyan();

        if ($resultado === "Se ha registrado un nuevo usuario con éxito") {
            // Redirige a la página de inicio una vez que se registró el usuario
            header("Location: index.php");
            exit();
        } else {
            echo $resultado; // Maneja el caso en que el registro no fue exitoso
        }
    }
} else {
    echo "La solicitud no es de tipo POST"; // Muestra un mensaje de error
}
?>