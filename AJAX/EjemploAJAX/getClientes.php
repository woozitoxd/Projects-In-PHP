<?php

require 'conexion_db.php';
/** @var $conn \PDO */

$queryString = "SELECT c.*, u.nombre AS usuario_creador FROM clientes AS c INNER JOIN usuarios AS u ON c.id_usuario_creador = u.id";
$objQuery = $conn->prepare($queryString);
$objQuery->execute();
$clientes = $objQuery->fetchAll(\PDO::FETCH_ASSOC);

header('Content-Type: application/json');
if (empty($clientes)) {
    http_response_code(404);
    $response = [
        'status' => 404,
        'message' => 'No se encontraron clientes',
    ];
    echo json_encode($response);
    die();
}

// sleep(5);
http_response_code(200);
echo json_encode($clientes);
die();
