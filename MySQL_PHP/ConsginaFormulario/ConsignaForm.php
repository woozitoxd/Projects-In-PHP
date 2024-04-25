<?php

class estudiante
{
    private $apellido;
    private $dni;
    private $carrera;
    private $nombre;
    private $conexion;
    
    public function __construct($nombre, $apellido, $dni, $carrera)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->carrera =  $carrera;

        $servername = "localhost";
        $username = "root";
        $dni = "";
        $port = 3306;
        $db = "stock";

        try {
            $this->conexion = new \PDO("mysql:host=$servername;port=$port;dbname=" . $db . ";charset=utf8", $username, $dni);
            $this->conexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }


    public function registrar()
    {

        $sql = "INSERT INTO estudiante(nombre, apellido, dni, carrera) VALUES('$this->nombre', '$this->apellido', '$this->dni', '$this->carrera')";

        if ($this->conexion->query($sql)) {
            return "Se registro nuevo estudiante"; // Se ha registrado con éxito
        } else {
            return "Error al registrar, el estudiante ingresado ya existe"; // Hubo un error al registrar
        }
    
    }


    public function consultar()
    {


        $estudiantes = []; //Creo array vacio
        $respuesta = $this->conexion->query("SELECT * FROM estudiante"); // Almaceno los datos de la consulta en la variable respuesta
        while ($row = $respuesta->fetch(\PDO::FETCH_ASSOC)) { //Dentro del bucle while, cada vez que encuentre un dato de la consulta anterior, lo almaceno en $row
            array_push($estudiantes, $row); //Con la funcion array_push, almaceno los datos que encontre previamente en el array estudiante, usando la varaible $row que guardaba los datos devueltos de la consult
        }
        return $estudiantes; //Cuando sale del while, retorno el array estudiantes
    }




}