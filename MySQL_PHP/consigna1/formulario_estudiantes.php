<?php

require 'Classes_Alumnos.php';
$objEstudiantesForm = new App\Form_Alumno();

$objEstudiantesForm->obtenerFormulario();

$alumnos = $objEstudiantesForm->obtenerAlumnos();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consigna 5 - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <div class="container mt-3">
     <form id="miFormulario" action="" method="POST">
        <?php

        if($objEstudiantesForm->blAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo 'Estudiante <b>' . $objEstudiantesForm->blUltimoAlumno . '</b> agregado correctamente';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        if ($objEstudiantesForm->blAlertError){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
            echo 'Estudiante <b>' . $objEstudiantesForm->blUltimoAlumno . '</b> agregado correctamente';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        ?>
          <div class="mb-3 mt-3">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" placeholder="nombre" required name="nombre">
          </div>
          <div class="mb-3 mt-3">
            <label for="Apellido">Apellido:</label>
            <input type="text" class="form-control" id="Apellido" placeholder="Apellido" required name="Apellido">
          </div>
          <div class="mb-3 mt-3">
            <label for="Carrera">Carrera:</label>
            <input type="text" class="form-control" id="Carrera" placeholder="Carrera" required name="Carrera">
          </div>
          <div class="mb-3 mt-3">
            <label for="dni">DNI:</label>
            <input type="number" class="form-control" id="dni" name="dni" required >
          </div>
          <button type="submit" class="btn btn-primary" id="enviar" name="enviar" value="enviar">enviar</button>
        </form>
  </div>

    <!-- TABLA DE LOS ALUMNOS  -->
    <div class="container text-center">
    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Carrera</th>
                                <th scope="col">DNI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $columnas = [
                                'id',
                                'nombre',
                                'apellido',
                                'carrera',
                                'DNI',
                            ];
                            foreach ($alumnos as $estudiante) {
                                echo "<tr>";

                                foreach ($columnas as $col) {
                                    echo '<td>';
                                    echo $estudiante[$col];
                                    echo '</td>';
                                }

                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
    </div>
</body>
</html>