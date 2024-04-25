<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consigna 5 - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container mt-3">
        <form action="alta_visualizar_estudiantes.php" method="post">
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
          <button type="submit" class="btn btn-primary">enviar</button>
        </form>

              <?php
                  $mensaje = "";
                  if (isset($_POST["nombre"]) && !empty($_POST["nombre"])) {
                      $nombre = $_POST["nombre"];
                      $apellido = $_POST["Apellido"];
                      $dni = $_POST["dni"];
                      $carrera = $_POST["Carrera"];

                      if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/", $nombre) || !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/", $apellido)) {
                          echo "Error: El nombre y el apellido deben contener solo letras y espacios.";
                      } else if (!is_numeric($dni) || (strlen($dni) != 7 && strlen($dni) != 8)) {
                          echo "Error: El DNI ingresado no es válido.";
                      } else {
                          // Agregar los datos al archivo "estudiantes.txt"
                          $archivoTXT = "../consigna3/estudiante.txt";
                          $data = "$nombre, $apellido, $dni, $carrera\n";
                          if(file_put_contents($archivoTXT, $data, FILE_APPEND | LOCK_EX)){
                            $mensaje =  "Listo! formulario enviado.";
                          }
                      }
                  }
              ?>
  </div>


    <div class="container text-center">
        <table class="table table-responsive">
            <thead class="table-dark">
            <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Carrera</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $archivoTXT = fopen("../consigna3/estudiante.txt", "r") or die("Unable to open file!");

                while ($linea = fgets($archivoTXT)){
                    echo "<tr>";
                    $datos = explode(",", $linea);

                    echo "<td>".$datos[0]."</td>";
                    echo "<td>".$datos[1]."</td>";
                    echo "<td>".$datos[2]."</td>";
                    echo "<td>".$datos[3]."</td>";
                    echo "</tr>";
                }
                fclose($archivoTXT);
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>