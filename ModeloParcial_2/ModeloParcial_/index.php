
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
    <script defer src="script.js"></script>
</head>
<body>
<form action="backend.php" id="formulario" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Completo:</label>
            <input type="text" class="form-control" id="nombre" placeholder="nombrecompleto" name="nombre" required>
            <div class="invalid-feedback">Nombre Invalido, ingresar solo nombre y apellido</div>
          </div>
        <div class="mb-3 mt-3">
          <label for="email" class="form-label">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="correo" name="email" required>
          <div class="invalid-feedback">El correo ingresado es invalido</div>
        </div>
        <div class="mb-3 mt-3">
            <label for="edad" class="form-label">Edad:</label>
            <input type="number" class="form-control" id="edad" name="edad" placeholder="edad" max="100" min="14" required>
            <div class="invalid-feedback">La edad ingresada es invalida</div>
        </div>
        <div class="mb-3 mt-3 AutorizadoOculto" id="autorizar">
            <label for="autorizado" class="form-label">Autorizado:</label>
            <select name="autorizado" id="autorizado" class="form-control">
                <option value="1">SI</option>
                <option value="0">NO</option>
            </select>
        </div>


        <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="tabla_usuarios">
                        <thead class="table-dark text-center">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Autorizado (1 = SI, 0 = NO)</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <!-- Los datos se mostraran dinamicamente con javascript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
        <button type="submit" id="boton" class="btn btn-primary" >
            ENVIAR
        </button>
     
    </form>
</body>
</html>