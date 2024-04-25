<?php

class Usuario
{
    private $nombre;
    private $correo;
    private $autorizado;
    private $edad;
    private $conexion;

    public function __construct($nombre, $correo, $edad, $autorizado)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->edad = $edad;
        $this->autorizado = $autorizado;

        try {
            $this->conexion = new PDO("mysql:host=localhost;dbname=parcial_2", "root", "");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexión de base de datos: " . $e->getMessage());
        }
    }

    public function tomarDatos()
    {
        $queryString = "SELECT * from usuarios";
        $objQuery = $this->conexion->prepare($queryString);
        $objQuery->execute();
        $clientes = $objQuery->fetchAll(\PDO::FETCH_ASSOC);

        if (empty($clientes)) {
                throw new Exception('No se encontraron clientes');
        }

        return $clientes;
    }

    //////////////////

    public function registrar()
    {
        $sql = "INSERT INTO usuarios(nombre, mail, edad, autorizado) VALUES (:nombre, :mail, :edad, :autorizado)";
        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindParam(':mail', $this->correo, PDO::PARAM_STR);
        $stmt->bindParam(':edad', $this->edad, PDO::PARAM_STR);
        $stmt->bindParam(':autorizado', $this->autorizado, PDO::PARAM_STR);

        try {
            if ($stmt->execute()) {
                return "Se ha registrado un nuevo usuario con éxito";
            } else {
                $errorInfo = $stmt->errorInfo();
                return "Error al registrar el usuario. Detalles: " . $errorInfo[0] . " - " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            return "Error al registrar el usuario. Detalles: " . $e->getMessage();
        }
    }

    public function validaRequerido($valor)
    {
        // Verifica que no esté vacío
        if (trim($valor) === '') {
            return 'El campo no puede estar vacío.';
        }

        // Divide el string en palabras
        $palabras = explode(' ', $valor);

        // Verifica que haya al menos dos palabras
        if (count($palabras) != 2) {
            return 'Debe contener solo dos palabras. ';
        }

        // Verifica el rango de caracteres para cada palabra (ejemplo: entre 3 y 15 caracteres)
        foreach ($palabras as $palabra) {
            // Verifica que solo contenga letras (incluyendo tildes) usando una expresión regular
            if (!preg_match('/^[a-zA-ZáéíóúüÁÉÍÓÚÜ]+$/', $palabra)) {
                return 'Debe contener solo letras y tildes.';
            }

            // Verifica el rango de caracteres para cada palabra (ejemplo: entre 3 y 15 caracteres)
            $longitud = mb_strlen($palabra, 'UTF-8');
            if ($longitud < 3 || $longitud > 15) {
                return 'Cada palabra debe tener entre 3 y 15 caracteres.';
            }
        }

        // Todas las validaciones pasaron
        return true;
    }

    public function validarEntero($valor, $opciones = null)
    {
        return filter_var($valor, FILTER_VALIDATE_INT, $opciones) !== false; //Acá valido que la edad ingresada sea un etero, usando FILTER_VALIDATE_INT (propio de PHP)
    }

    public function validaEmail($valor)
    {
        return filter_var($valor, FILTER_VALIDATE_EMAIL) !== false;  //Acá valido que la correo ingresada sea formato email, usando FILTER_VALIDATE_EMAIL (propio de PHP)
    }
}

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;  //Las variables toman el valor del input ingresado, y si no tiene nada, toma el valor de NULL
        $edad = isset($_POST['edad']) ? $_POST['edad'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $autorizado = isset($_POST['autorizado']) ? $_POST['autorizado'] : null;

        $errores = array();

        $usuario = new Usuario($nombre, $email, $edad, $autorizado); //declaro objeto de la clase Usuario

        // Valida que el campo nombre no tenga errores.

        $resultado = $usuario->validaRequerido($nombre);

        if ($resultado !== true) {
            echo 'Error: ' . $resultado;
            return false;
        }
        
        // Valida la edad con un rango de 3 a 130 años.
        $opciones_edad = array(
            'options' => array(
                'min_range' => 14,
                'max_range' => 130
            )
        );
        if (!$usuario->validarEntero($edad, $opciones_edad)) {
            $errores[] = 'El campo edad es incorrecto, no cumple el formato de tener al menos 14 años.';
        }

        // Valida que el campo email sea correcto.
        if (!$usuario->validaEmail($email)) {
            $errores[] = 'El campo email es incorrecto, no cumple el formato de correo electronico.';
        }

        // Verifica si ha encontrado errores y, de no haber, intenta registrar el usuario.
        if (empty($errores)) {
            $resultado = $usuario->registrar();

            if ($resultado === "Se ha registrado un nuevo usuario con éxito") {
                // Redirige a la página de inicio una vez que se registró el usuario
                header("Location: index.php");
                exit();
            } else {
                echo $resultado; // Maneja el caso en el que el registro no fue exitoso
            }
        } else {
            echo "Errores encontrados: " . implode(', ', $errores);            // Muestra los errores encontrados

        }
    } else {
        $errores = array();
    }
?>