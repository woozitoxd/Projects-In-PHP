<?php

// Start the session
session_start();

if (!isset($_SESSION["email"])) {
    header("location: login.php");
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
        <div>
            <h2>Bienvenido
                <?php echo $_SESSION['email'] ?>
            </h2>
        </div>
        <div class="mt-3">
            <form action="logout.php" method="POST">
                <button type="submit" class="btn btn-primary">Cerrar sesión</button>
            </form>
        </div>
    </div>

</body>

</html>