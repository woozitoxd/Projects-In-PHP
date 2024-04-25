<?php

namespace App ;

class formularioProducto{

    public $blAlert = false;
    public $blAlertError = null;
    public $blUltimoAlumno = false;
    public $blUltimoError = null;

    public function obtenerFormulario(){
        require 'conect.php';

        if (isset($_POST['descripcion'])) {
            $description = $_POST['descripcion'];

            try {


                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Código de inserción aquí
                    $queryString = "INSERT INTO productos (descripcion) VALUES (:descripcion)";
                    $objQuery = $BaseSTOCK->prepare($queryString);
                    $objQuery->bindParam(':descripcion', $description);
    
                    $objQuery->execute();
                    $idProductoAutoINC = $BaseSTOCK->lastInsertId();
                    $this->blAlert = true;
                    $this->blUltimoAlumno = $description . ' (' . $idProductoAutoINC . ')';
                }

            } catch (\Exception $e) {
                    $this->blAlertError = true;
                    $this->blUltimoError = $e->getMessage();
            }
        }
    }
}