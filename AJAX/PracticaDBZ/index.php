
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modelo Parcial 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        
    <link rel="stylesheet" href="styles.css">
    <script defer src="scriptAax.js"></script>
</head>
<body>

<form action="insertarSaiyan.php" id="formulario" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" placeholder="nombrecompleto" name="nombre" required>
            <div class="invalid-feedback">Nombre Invalido, ingresar solo nombre y apellido</div>
          </div>
        <div class="mb-3 mt-3">
            <label for="Poder" class="form-label">Poder:</label>
            <input type="number" class="form-control" id="Poder" name="Poder" placeholder="Poder" max="100" min="14" required>
            <div class="invalid-feedback">La Poder ingresada es invalida</div>
        </div>

        <select id="selectTransformaciones" name="estado"><option value="1">Base</option><option value="2">SSJJ1</option><option value="3">SSJ2</option><option value="4">SSJ Blue</option></select>

    <!-- Campo oculto para almacenar el valor seleccionado -->
    <input type="hidden" id="estadoSeleccionado" name="estadoSeleccionado" value="">



    
        <button type="submit" id="boton" class="btn btn-primary" >
            ENVIAR
        </button>
     
    </form>
</body>
</html>