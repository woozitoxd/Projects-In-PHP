<?php
function obtenerOpciones($tabla) //Para trabajar con esta funcion, recibo el parametro del nombre de la tabla
{

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $port = 3306;
    $db = "2doparcial";

    try {
        $conexion = new \PDO("mysql:host=$servername;port=$port;dbname=" . $db . ";charset=utf8", $username, $password);
        // set the PDO error mode to exception
        $conexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch (Exception $e) {
        echo "Connection failed: " . $e->getMessage();
        die(); // exit;
    }


    $consultSQL = "SELECT id, nombre FROM $tabla"; // consulta para traer el id y el nombre de la tabla
    try{

        $stmt = $conexion->prepare($consultSQL);  //preparo la consulta
        $stmt->execute();                       //ejecuto
        $opciones = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $opciones;    //Retorno los datos que encontré para que estos sean usados en el campo select
    }catch (PDOException $e){
        echo "Error de consulta: ". $e->getMessage();
        return []; 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcial 2 - PWEB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
        <h1>2do Parcial - PWEB</h1>
        <strong>Alumno: Elias Contrera - DNI: 43239945</strong>
        <p>Profesores: Gerardo Ibarra, Nicolas Garrido</p>
        <p>Materia: Programacion Web</p>
        <p>Carrera: Tec. Desarrollo de Software</p>
        <p>Año: 2023</p>
    </div>

    <form action="backend.php" id="formulario" method="post">
        <div class="row">
        <div class="mb-3 mt-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre y Apellido" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI:</label>
                <input type="number" class="form-control" id="dni" name="dni" placeholder="DNI"  required>
            </div>
                <div class="mb-3">
                <label for="obra_social">Obra Social/Prepaga:</label>
                <select id="obra_social" name="obra_social" class="form-control">
                <option value=""></option>

                    <?php
                    //La variable almacena los datos que retorne despues de ejecturar la consulta

                    $opcionesObraSocial = obtenerOpciones("obras_sociales");//Acá obtengo las opciones de la tabla especialidades para el campo select 
                                                                    //Le paso como parametro a la funcion el nombre de la tabla
                    foreach ($opcionesObraSocial as $opcion) {
                        echo "<option value='{$opcion['id']}'>{$opcion['nombre']}</option>";  //Imprimo en la pagina las opciones con el id que obtuve de la tabla junto con el nomber
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="especialidad">Especialidad:</label>
                <select id="especialidad" name="especialidad" class="form-control">
                    <option value=""></option>
                    <?php
                    //La variable almacena los datos que retorne despues de ejecturar la consulta
                    $opcionesEspecialidad = obtenerOpciones("especialidades"); //Acá obtengo las opciones de la tabla especialidades para el campo select 
                                                                            //Le paso como parametro a la funcion el nombre de la tabla
                    foreach ($opcionesEspecialidad as $opcion) {
                        echo "<option value='{$opcion['id']}'>{$opcion['nombre']}</option>"; //Imprimo en la pagina las opciones con el id que obtuve de la tabla junto con el nomber
                    }
                    ?>
                </select>
            </div>

 
        </div>
 
               
        <button type="submit" id="boton" class="btn btn-primary" >
                ENVIAR
        </button>
    </form>
</body>
</html>