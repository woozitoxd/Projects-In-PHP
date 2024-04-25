<?php

class Usuario
{
    private $nombre;
    private $ObraSocial;
    private $Especialidad;
    private $DNI;
    private $conexion;

    public function __construct($nombre, $DNI, $ObraSocial, $Especialidad)
    {
        $this->nombre = $nombre;
        $this->ObraSocial = $ObraSocial;
        $this->DNI = $DNI;
        $this->Especialidad = $Especialidad;

        try {
            $this->conexion = new PDO("mysql:host=localhost;dbname=2doParcial", "root", "");
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexión de base de datos: " . $e->getMessage());
        }
    }

    public function registrar()
    {
        $sql = "INSERT INTO solicitudes(nombre, dni, obra_social, especialidad) VALUES (:nombre, :dni, :obra_social, :especialidad)";
        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(':nombre', $this->nombre, PDO::PARAM_STR);
        $stmt->bindParam(':dni', $this->DNI, PDO::PARAM_STR);
        $stmt->bindParam(':obra_social', $this->ObraSocial, PDO::PARAM_STR);
        $stmt->bindParam(':especialidad', $this->Especialidad, PDO::PARAM_STR);

        try {
            if ($stmt->execute()) {
                return "Se ha registrado una nueva solicitud con éxito";
            } else {
                $errorInfo = $stmt->errorInfo();
                return "Error al registrar la solicitud. Detalles: " . $errorInfo[0] . " - " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            return "Error al registrar la solicitud. Detalles: " . $e->getMessage();
        }
    }


    public function validaRequerido($valor)
    {
        // valido que el campo no este vacio
        if (trim($valor) === '') {
            return 'El campo nombre no puede estar vacío.';
        }

        // divido la cadena del input por cada espacio que encuentre, y lo guardo en la variable palabras
        $palabras = explode(' ', $valor);

        // Valido que palabras sea distinto de 2, es decir, que no exista mas ni menos de 2 palabras
        if (count($palabras) != 2) {
            return 'El campo nombre debe contener al menos dos palabras. ';
        }

        foreach ($palabras as $palabra) {  //Valido el campo nombre para que las palabras no tengan numeros ni caracteres fuera del abecedario
            if (!preg_match('/^[a-zA-ZáéíóúüÁÉÍÓÚÜ]+$/', $palabra)) {
                return 'Debe contener solo letras y tildes.';
            }

            $longitud = mb_strlen($palabra, 'UTF-8');
            if ($longitud < 4 || $longitud > 60) {  //Valido el rango de caracteres de las palabras, uso entre 4 y 60, es decir, el nombre debe tener almenos 4 caracteres
                return 'Cada palabra debe tener entre 4 y 60 caracteres.';
            }
        }

        // Todas las validaciones pasaron
        return true; //Retorno verdadero porque el formato del campo nombre cumple las validaciones
    }

    public function validarEntero($valor)
    {
        return filter_var($valor, FILTER_VALIDATE_INT) !== false; //Acá valido que la DNI ingresada sea un etero, usando FILTER_VALIDATE_INT (propio de PHP)
    }

    public function validarRANGO($valor){
        if ($valor < 100000 || $valor > 99999999){ //Si el valor ingresado no esta entre el interalo de 100k y 99M, retorno falso.
            return false;
        }
        return true;
    }

    ////////////////////////////



}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $DNI = isset($_POST['dni']) ? $_POST['dni'] : null;
        $obraSocial = isset($_POST['obra_social']) ? $_POST['obra_social'] : null;
        $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : null;

        



        $errores = array();

        $usuario = new Usuario($nombre, $DNI, $obraSocial, $especialidad);

        if(empty($obraSocial) ){ //Condicion para validar que el campo select no esté vacio
            $errores[] = 'El campo select de Obra Social está vacío.';
        }

        if(empty($especialidad) ){
            $errores[] = 'El campo select de Especialidad está vacío';
        }

        // valido que el campo nombre no tenga errores.

        $resultado = $usuario->validaRequerido($nombre);

        if ($resultado !== true) {
            echo 'Error: ' . $resultado;
            return false;
        }
        
        // Valida la DNI 
 
        if (!$usuario->validarEntero($DNI)) { //Funcion para validar que el DNI sea numero
            $errores[] = 'El campo DNI es incorrecto, solo admite numeros';
        }

        if(!$usuario->validarRANGO($DNI)){
            $errores[] = 'Error en el rango del DNI, el mismo debe estar comprendido entre 100.000 y 99.999.999';
        }
  

        // Verifica si ha encontrado errores y, de no haber, intenta registrar el usuario.
        if (empty($errores)) {
            $resultado = $usuario->registrar();

            if ($resultado === "Se ha registrado una nueva solicitud con éxito") {
                
                header("Location: index.php"); //Si la solicitud se cumplió, entonces redirijo al indix.php, osea a la pagina principal
                exit();
            } else {
                echo $resultado; // Maneja el caso en el que el registro no fue exitoso
            }
        } else {
            echo "Errores encontrados: " . implode(', ', $errores);            // Muestra los errores encontrados en la pagina

        }
    } else {
        $errores = array();
    }
?>