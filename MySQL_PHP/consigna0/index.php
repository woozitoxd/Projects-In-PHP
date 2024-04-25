<?php

require 'classes/EstudiantesForm.php';
$objEstudiantesForm = new App\EstudiantesForm();

$objEstudiantesForm->procesarFormulario();

$alumnos = $objEstudiantesForm->getEstudiantes();

?>

<!DOCTYPE html>
<html lang="es">
<?php
$title = 'prueba';
$jsIncludes = [
    'js/registro.js'
];
require 'partials/head.php';
?>

<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h2>Estudiantes</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
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
            </div>
        </div>

        <form action="" method="POST">
            <div class="accordion mt-4" id="accordionExample">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <!-- bg-light text-black -->
                        <button class="accordion-button text-col py-2 px-3 " type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h2>Nuevo estudiante</h2>
                        </button>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body p-0">
                            <div class="card m-0 border-0">
                                <div class="card-body">
                                    <?php
                                    if ($objEstudiantesForm->blAlert) {
                                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                        echo 'Estudiante <b>' . $objEstudiantesForm->lastAlumno . '</b> agregado correctamente';
                                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                        echo '</div>';
                                    }
                                    if ($objEstudiantesForm->blAlertError) {
                                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                        echo 'Hubo un error: ' . $objEstudiantesForm->lastError;
                                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                        echo '</div>';
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label for="txtNombre">Nombre</label>
                                        <input type="text" class="form-control" id="txtNombre" name="txtNombre"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtApellido">Apellido</label>
                                        <input type="text" class="form-control" id="txtApellido" name="txtApellido"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="intDNI">DNI</label>
                                        <input type="number" class="form-control" id="intDNI" name="intDNI" min="100000"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtCarrera">Carrera</label>
                                        <input type="text" class="form-control" id="txtCarrera" name="txtCarrera"
                                            required>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</body>

</html>