<?php

require_once("backend.php");

try {
    $conexion = new Usuario("","","","");
    $usuarios = $conexion->tomarDatos();

    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode($usuarios);
} catch (Exception $e) {
    header('Content-Type: application/json');
    http_response_code(500);
    $response = [
        'status' => 500,
        'message' => 'Error interno del servidor',
    ];
    echo json_encode($response);
}