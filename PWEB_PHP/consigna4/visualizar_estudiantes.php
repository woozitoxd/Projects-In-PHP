
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consgina 4 - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

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
            <?php
                $archivoTXT = fopen("../consigna3/estudiante.txt", "r") or die("Unable to open file!");

                while ($linea = fgets($archivoTXT)){
                    echo "<tbody>";     

                    echo "<tr>";
                    $datos = explode(",", $linea);

                    echo "<td>".$datos[0]."</td>";
                    echo "<td>".$datos[1]."</td>";
                    echo "<td>".$datos[2]."</td>";
                    echo "<td>".$datos[3]."</td>";
                    echo "</tr>";
                    echo "</tbody>";     

                }
                fclose($archivoTXT);
            ?>
        </table>
    </div>

 
</body>
</html>

