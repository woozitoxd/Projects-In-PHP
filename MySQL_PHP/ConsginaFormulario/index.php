<?php
    require_once './ConsignaForm.php';

    $objetoEstudiantes = new estudiante("","","","");

    $objetoEstudiantes->registrar();

    $TablaEstudiantes = $objetoEstudiantes->consultar();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3 ">
        <form action="./RegistrarEnBAse.php" method="post" id="registro">
            <div class="modal-body">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre">
            </div>

            <div class="modal-body">
                <label for="apellido">Ingresar Correo:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required placeholder="Ingresar apellido">
            </div>

            <div class="modal-body">
                <label for="dni">DNI:</label>
                <input type="number" class="form-control" id="dni" name="dni" required placeholder="DNI">
            </div>

            <div class="modal-body">
                <label for="carrera">carrera:</label>
                <input type="text" class="form-control" id="carrera" name="carrera" required>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="registrar" name="registrar">Registrarme</button>
            </div>
        </form>
    </div>
    

    <div class="container mt-3">           
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">DNI</th>
        <th scope="col">Carrera</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $columns = [
                'nombre', 
                'apellido',
                 'dni', 
                 'carrera'
            ];

            foreach ($TablaEstudiantes as $students) {
                echo '<tr>';

                foreach ($columns as $colxd) {
                    echo '<td>';
                    echo $students[$colxd];
                    echo '</td>';
                };

                echo '</tr>';
            }
        ?>
    </tbody>
  </table>
</div>
</body>
</html>