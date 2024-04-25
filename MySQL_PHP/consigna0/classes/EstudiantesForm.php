<?php

namespace App;

class EstudiantesForm
{

    public $blAlert = false;
    public $lastAlumno = null;
    public $blAlertError = false;
    public $lastError = null;

    public function getEstudiantes()
    {
        require 'connection_mysql.php';
        $estudiantes = [];
        $respuesta = $conn->query("SELECT * FROM alumnos");
        while ($row = $respuesta->fetch(\PDO::FETCH_ASSOC)) {
            array_push($estudiantes, $row);
            // $estudiante[] = $row;
        }
        return $estudiantes;
    }

    public function procesarFormulario()
    {
        require 'connection_mysql.php';

        if (isset($_POST['txtNombre']) && isset($_POST['txtApellido']) && isset($_POST['intDNI']) && isset($_POST['txtCarrera'])) {
            $nombre = $_POST['txtNombre'];
            $apellido = $_POST['txtApellido'];
            $dni = $_POST['intDNI'];
            $carrera = $_POST['txtCarrera'];
            // TODO: validar 
            if ($dni < 100000) {
                $this->blAlertError = true;
                $this->lastError = 'El dni debe ser mayor que 100.000';
            }
            if ($this->blAlertError == false) {
                try {
                    $queryString = "INSERT INTO alumnos (nombre, apellido, DNI, carrera) 
                        VALUES (:nom, :apell, :dni, :carr)
                    ";
                    $objQuery = $conn->prepare($queryString);
                    $objQuery->bindParam(':nom', $nombre);
                    $objQuery->bindParam(':apell', $apellido);
                    $objQuery->bindParam(':carr', $carrera);
                    $objQuery->bindParam(':dni', $dni);

                    $objQuery->execute();
                    $idLastAlumno = $conn->lastInsertId();
                    $this->blAlert = true;
                    $this->lastAlumno = $nombre . ' ' . $apellido . ' (' . $idLastAlumno . ')';
                } catch (\Exception $e) {
                    $this->blAlertError = true;
                    $this->lastError = $e->getMessage();
                }
            }

        }
    }
}