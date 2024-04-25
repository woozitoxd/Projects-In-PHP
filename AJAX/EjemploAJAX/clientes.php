<?php

// require("./Permisos.php");

// session_start();

// if (!isset($_SESSION['usuario_id'])) {
//     header("location: login.php");
//     exit;
// }

// if (!Permisos::tienePermiso('crear cliente', $_SESSION['usuario_id'])) {
//     include 'error_sin_permiso.php';
//     exit;
// }

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script defer src="./js/clientes.js"></script>

</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h1>Clientes</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered" id="tabla_clientes">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Cuil</th>
                                <th>Usuario Creador</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- loading spinner -->
                <div class="d-flex justify-content-center" id="loading_tabla_clientes">
                    <div class="spinner-border text-primary" role="status" id="loading_spinner">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>