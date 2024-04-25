<?php
    include_once ('../Modelo/liga.php');

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $nombre = $_POST["nombre"];
        
        $buscarLiga = new liga("");
        $Liga= new liga("");

        $buscarLiga= $liga->buscarLiga($nombre);
        if($buscarLiga != null)
        {
            session_start();
            $_SESSION['LigaEncontrada'] = $buscarLiga;
           header('Location:../Vistas/LigaEncontrada.php');
           exit();
        }
        else
        {
            echo "Error en alguno de los campos";
        };
    }

?>