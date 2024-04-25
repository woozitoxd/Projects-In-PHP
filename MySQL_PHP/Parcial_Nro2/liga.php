<?php
require_once('../controlador/conexion_db.php');
class liga
{
    private $nombre;
    private $conexion;
    
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        // nombreservidor, nombreUsuario, contraseña, nombreDeLaBBDD.
        try {
            // Utiliza la conexión centralizada
            $this->conexion = $GLOBALS['conn'];
        } catch (PDOException $e) {
            die("Error en la conexión de base de datos: " . $e->getMessage());
        }

    }

    public function registrarliga($nombre)
    {
    
        if (empty($nombre)) {
            echo "Error: El nombre de la liga está vacío.";
            return false;
        }
        $sql = "INSERT INTO liga (nombre) VALUES (?)";
    
        // Preparar la consulta
        $stmt = $this->conexion->prepare($sql);
    
        // Vincular el parámetro
        $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
    
        // Ejecutar la consulta
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            echo "Error en el query: " . $stmt->error;
            $stmt->close();
            return false;
        }
    }
    
    public function eliminarLiga($nombre){
        $sql = "DELETE FROM liga WHERE nombre = '$nombre'";
        return $this->conexion->query($sql);
    }
    
    public function buscarLiga($nombre){
        $sql = "SELECT * FROM liga WHERE nombre='$nombre'";
        $resultado = $this->conexion->query($sql);
        if ($resultado->num_rows > 0) {
            // Si se encontró  crear un objeto de tipo JUGADOR y retornarlo
            $fila = $resultado->fetchAll(PDO::FETCH_ASSOC);
            $LigaEnontrada = new liga("");
            $LigaEnontrada->nombre= $fila["nombre"];
            return $LigaEnontrada;
        }
    }
    
    public function getnombre()
    {
        return $this->nombre;
       
    }

}
    

?>