<?php

namespace App ;

class Form_Alumno{

    public $blAlert = false;
    public $blAlertError = null;
    public $blUltimoAlumno = false;
    public $blUltimoError = null;

    public function obtenerAlumnos(){
        require 'conexion_bbdd_mysql.php';

        $alumnos = [];
        $respuestaObtenida =  $conn->query("SELECT * FROM alumnos");

        while ($row = $respuestaObtenida->fetch(\PDO::FETCH_ASSOC)){
            array_push($alumnos, $row);
        }

        return $alumnos;
    }

    public function obtenerFormulario(){
        require 'conexion_bbdd_mysql.php';

        if (isset($_POST['nombre']) && isset($_POST['Apellido']) && isset($_POST['Carrera']) && isset($_POST['dni'])) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['Apellido'];
            $dni = $_POST['dni'];
            $carrera = $_POST['Carrera'];
            // TODO: validar 
            if ($dni < 100000) {
                $this->blAlertError = true;
                $this->blUltimoError = 'El dni debe ser mayor que 100.000';
            }
            if ($this->blAlertError == false) {
                try {

                    $queryString = "INSERT INTO alumnos (nombre, apellido, carrera, DNI) 
                    VALUES (:nom, :apell, :carr, :dni)
                ";
                $objQuery = $conn->prepare($queryString);
                $objQuery->bindParam(':nom', $nombre);
                $objQuery->bindParam(':apell', $apellido);
                $objQuery->bindParam(':carr', $carrera);
                $objQuery->bindParam(':dni', $dni);

                $objQuery->execute();
                $idLastAlumno = $conn->lastInsertId();
                $this->blAlert = true;
                $this->blUltimoAlumno = $nombre . ' ' . $apellido . ' (' . $idLastAlumno . ')';
                } catch (\Exception $e) {
                    $this->blAlertError = true;
                    $this->blUltimoError = $e->getMessage();
                }
            }

        }
    }
}