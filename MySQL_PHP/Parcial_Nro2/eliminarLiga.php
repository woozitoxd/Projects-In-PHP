<?php
include_once ('../Modelo/liga.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nombre = $_POST["nombre"];
    
    $ligaParaEliminar = new liga("");

   $resultado = $ligaParaEliminar->eliminarLiga($nombre);
   if($resultado == true)
   {
    header('Location: ../Vistas/controlAdmin.php');
    exit();
   }
}

?>