<?php

include_once ('../Modelo/liga.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $nombre = $_POST["liga"];

        $objliga = new liga($nombre);
        $resultado = $objliga->registrarliga($nombre);

        if ($resultado == true)
        {
            header('Location: ../Vistas/controlAdmin.php');
            exit();
        }
        else
        {
            echo "Error en la carga";
        }
    }
?>
