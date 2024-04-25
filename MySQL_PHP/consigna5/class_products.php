<?php

namespace App;

use Exception;
use PDO;

class formularioProducto
{
    public $blAlert = false;
    public $blAlertError = null;
    public $blUltimoAlumno = false;
    public $blUltimoError = null;

    public function obtenerForm(){
        // Requiere el archivo de conexión para acceder a $BaseSTOCK
        require 'conect.php';

        // Inicializa la variable $productos
        $productos = array();

        // Realiza una consulta y muestra los productos
        try {
            $consulta = "SELECT * FROM productos"; // La consulta SELECT es guardada en la variable $consulta
            $allProducts = $BaseSTOCK->query($consulta); // $allProducts toma el valor de la función query pasándole como parámetro $consulta
            $productos = $allProducts->fetchAll(PDO::FETCH_ASSOC); // En la variable $productos se almacenan todos los resultados que se obtuvieron en la línea 8
        } catch (Exception $event) {
            echo "Error al consultar la base de datos: " . $event->getMessage();
            die();
        }

        // Devuelve los datos de productos para usarlos en modificar.php
        return $productos;
    }


    public function actualizarProducto($id)
    {
        require 'conect.php';

        try {

            $query = "DELETE FROM productos  WHERE ID_Producto = :id"; //Guardo la consulta en la variable query
            $stmt = $BaseSTOCK->prepare($query); //Preparo la consulta usando el metodo prepare y guardandolo en la variable "stmt" 
            $stmt->bindParam(':id', $id); //enlazo los valores recibidos por parametro (id) con el id de mi tabla
            $stmt->execute(); //Ejecuto la consulta
 

            $this->blAlert = true;
            $this->blUltimoAlumno = true;
        } catch (Exception $e) {
            $this->blAlertError = true;
            $this->blUltimoError = $e->getMessage();
        }
    }
}