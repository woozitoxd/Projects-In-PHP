<?php
    include_once ('../Modelo/partido.php');
    include_once ('../Modelo/ubicacion.php');

    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
      
        $fechaRecibida = $_POST["fecha"];
        $equipo1Recibido = $_POST["equipo1"];
        $equipo2Recibido = $_POST["equipo2"];
    
        $partidoAeliminar = new partido ("","","","","","","","","");
    
       $resultado = $partidoAeliminar->eliminarPartido($fechaRecibida,$equipo1Recibido,$equipo2Recibido);
       if($resultado == true)
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