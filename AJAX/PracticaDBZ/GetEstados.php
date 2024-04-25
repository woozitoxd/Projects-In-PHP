<?php
try {
    // Conectar a la base de datos usando PDO
    $pdo = new PDO("mysql:host=localhost;dbname=practica", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obtener todas las transformaciones
    $query = $pdo->query("SELECT * FROM Transformacion");
    
    // Obtener los resultados como un array asociativo
    $transformaciones = $query->fetchAll(PDO::FETCH_ASSOC);

    // Devolver los datos en formato JSON
    header("Content-Type: application/json");
    echo json_encode($transformaciones);
} catch (PDOException $e) {
    // Manejar errores de conexión a la base de datos
    header("Content-Type: application/json", true, 500); // Internal Server Error
    echo json_encode(["error" => "Error en la conexión a la base de datos: " . $e->getMessage()]);
}
?>
