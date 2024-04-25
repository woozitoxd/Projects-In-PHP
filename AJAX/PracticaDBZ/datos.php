<?php

class Personaje
{
    private $idPJ;
    private $nombrePJ;
    private $poderPJ;
    private $transformacionPJ;
    private $conexion;

    public function __construct($nombre, $poder, $transformacion)
    {
        // Inicializar propiedades aquí
        $this->nombrePJ = $nombre;
        $this->poderPJ = $poder;
        $this->transformacionPJ = $transformacion;

        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $port = 3306;
        $db = "practica";

        try {
            $this->conexion = new \PDO("mysql:host=$servername;port=$port;dbname=" . $db . ";charset=utf8", $username, $password);
            // set the PDO error mode to exception
            $this->conexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
            die(); // exit;
        }
    }



    public function obtenerEstado()
    {
        $consulta = " SELECT EstadoTransformacion from transformacion";
        $objConsulta = $this->conexion->prepare($consulta);
        $objConsulta->execute();
        $personajes= $objConsulta->setFetchMode(\PDO::FETCH_ASSOC);

        if(empty($personajes)){
            throw new Exception("No existen personajes");
        }
    }
    


    public function insertarSaiyan()
    {
        $sql = "INSERT INTO saiyans(nombre, poder, id_estado) VALUES (:nombre, :poder, :estadoSeleccionado)";
        $stmt = $this->conexion->prepare($sql);
    
        $stmt->bindParam(':nombre', $this->nombrePJ, PDO::PARAM_STR);
        $stmt->bindParam(':poder', $this->poderPJ, PDO::PARAM_STR);
        $stmt->bindParam(':estadoSeleccionado', $this->transformacionPJ, PDO::PARAM_INT); // Cambiado a PARAM_INT
    
        try {
            if ($stmt->execute()) {
                return "Se ha registrado un nuevo usuario con éxito";
            } else {
                $errorInfo = $stmt->errorInfo();
                return "Error al registrar el usuario. Detalles: " . $errorInfo[0] . " - " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            return "Error al registrar el usuario. Detalles: " . $e->getMessage();
        }
    }
    
}
?>