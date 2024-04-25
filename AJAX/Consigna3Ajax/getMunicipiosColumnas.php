<?php

require 'conexion_db.php';
/** @var $conn \PDO */

// La variable provinciaSelect tiene el valor que le pase por ajax en la linea :  " `let URLphp = `getMunicipiosColumnas.php?provincia=${ID_Select}`; "
$provinciaSelect = isset($_GET['provincia']) ? $_GET['provincia'] : null; //Obtengo con GET

if ($provinciaSelect === null) { //Si provinciaSelect es nulo
    //
    http_response_code(400);    //El error q le paso es 400 y muestro el error
    $response = [
        'status' => 400,
        'message' => 'Parámetro "provinciaSelect" no proporcionado',
    ];
    echo json_encode($response);
    die();
}

if ($provinciaSelect === "1") { // Si el valor del select que obtuve por GET es 1, entonces la consulta que ejecuto es para CABA
    // CABA
    $consultaSQL = "SELECT nombre FROM municipios_comunas WHERE provincia_id = 1"; //Consulta para traer las comunas de CABA (las que tienen ID=1, por la Fk de CABA)
} elseif ($provinciaSelect === "2") { //Sino, si el valor del select que obtuve por GET es 2, entonces la consulta que ejectu es para BuenosAires
    // Buenos Aires
    $consultaSQL = "SELECT nombre FROM municipios_comunas WHERE provincia_id = 2"; //Consulta para traer los municipios de BsAs (los que tienen ID=2, por la Fk de Buenos Aires)
} else {
    // Manejar el caso en el que se proporciona un valor de provincia no válido
    http_response_code(400);
    $response = [
        'status' => 400,
        'message' => 'Valor de "provinciaSelect" no válido',
    ];
    echo json_encode($response); //Envio el array que contiene el error en formato json
    die();
}


$objQuery = $conn->prepare($consultaSQL); //Preparo la consulta
$objQuery->execute();           //Ejecuto la consulkta
$MunicipiosOrComunas = $objQuery->fetchAll(\PDO::FETCH_ASSOC);  // Traigo todos los registros que obtenga con la consulta y los almaceno en MunicipiosOrComunas

header('Content-Type: application/json'); //Convierto el contenido en formato JSON

if (empty($MunicipiosOrComunas)) {  //Si MunicipiosOrComunas no encontró nada en la linea 40, siginifica que esta vacio, entonces se cumple la condicion
    
    http_response_code(404);    //Manejo el error 404
    $response = [
        'status' => 404,
        'message' => 'No se encontraron municipios o comunas para la provincia seleccionada',  //El mensaje de error es que no se encontraron mnunicipios y/o comunas para la provincia
    ];
    echo json_encode($response); //Envio el array que contiene el error en formato json
    die();
}

http_response_code(200);
echo json_encode($MunicipiosOrComunas); //Envio el array que contiene todos los registros en formato json
die();
?>