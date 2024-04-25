<?php

session_start();

if (isset($_SESSION["email"])) {
    header("location: sistema.php");
}

if (isset($_REQUEST['email']) && isset($_REQUEST['pwd'])) {
    //Guardo el mail en la variable $_SESSION
    $_SESSION["email"] = $_REQUEST['email'];
    header("location: sistema.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Ejemplo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- <link rel="stylesheet" href="./css/styles.css"> -->
    <!-- <script defer src="./js/script.js"></script> -->
</head>

<body>
    <div class="container mt-3">
        <form action="" method="POST">
            <div class="card">
                <div class="card-header">
                    <h2>Iniciar Sesión</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Ingrese email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Ingrese contraseña"
                            name="pwd">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Recordarme
                        </label>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Iniciar</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>