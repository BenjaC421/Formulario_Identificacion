<?php
require_once("conexion.php");
$fecha_actual = new DateTime();

function ValidarRut($rut, $digitoVerificador) {
    $rut = preg_replace('/[\.\-]/', '', $rut);
    
    if (!ctype_digit($rut) || strlen($rut) < 7) {
        return false;
    }
    $rutReverso = strrev($rut);
    $suma = 0;
    $multiplicador = 2;

    for ($i = 0; $i < strlen($rutReverso); $i++) {
        $suma += intval($rutReverso[$i]) * $multiplicador;

        $multiplicador = ($multiplicador == 7) ? 2 : $multiplicador + 1;
    }

    $digitoEsperado = 11 - ($suma % 11);

    // Manejar casos especiales para dígitos esperados
    $digitoEsperado = ($digitoEsperado == 11) ? 0 : (($digitoEsperado == 10) ? 'K' : $digitoEsperado);

    // Comparar el dígito verificador proporcionado con el esperado
    return strtoupper($digitoVerificador) === strtoupper(strval($digitoEsperado));
}
function SubirArchivo($archivo){
    $aNombre = $archivo["name"];
    $directorio = "img/";
    $destino = $directorio . basename($aNombre);

    if(move_uploaded_file($archivo["tmp_name"], $destino)){
        return $destino;
    }
    else{
        return "";
    } 
}
function InsertarBD($nombre,$apellido_p,$apellido_m,$fecha,$rut,$identificador,$archivo,$sexo, $nacionalidad,$L_nacimiento,$profesion,$donante,$discapacidad){
    global $conexion;
    $sql = "INSERT INTO personas (nombre,apellidos_p,apellidos_m,fecha_nacimiento,rut,n_identificador,fotografia,sexo,nacionalidad,lugar_nacimiento,profesion,donante_organos,discapacitado) VALUES ('$nombre','$apellido_p','$apellido_m','$fecha','$rut','$identificador','$archivo','$sexo','$nacionalidad','$L_nacimiento','$profesion','$donante','$discapacidad')";

    $resultado = $conexion->query($sql);
    if ($resultado)
        return True;
    else{
        return False;
    }
}

#recuperacion de datos del formulario
$nombre = $_POST["nombre"];
$apellido_p = $_POST["apellido_p"];
$apellido_m = $_POST["apellido_m"];
$fecha = $_POST["fecha"];
$rut = $_POST["rut"];
$identificador = $_POST["identificador"];
$foto = $_FILES["foto"];
$nacionalidad = $_POST["nacionalidad"];
$L_nacimiento = $_POST["lugar_de_nacimiento"];
$profesion = $_POST["profesion"];
$sexo = $_POST["sexo"];
$donante = $_POST["donante"];
$discapacidad = $_POST["discapacidad"];

$ruta = SubirArchivo($foto);
$fecha_nac = DateTime::createFromFormat('Y-m-d', $fecha);
if($fecha_nac > $fecha_actual){
    echo "<b style='color:red;'>ERROR el individuo no puede tener una edad negativa </b>";
    echo "No se pudo subir a la base de datos";
}
elseif(!ValidarRut($rut,$identificador)){
    echo "<b style='color:red;'>ERROR el Rut no es valido </b>";
    echo "No se pudo subir a la base de datos"; 
}
else{
    InsertarBD($nombre,$apellido_p,$apellido_m,$fecha,$rut,$identificador,$ruta,$sexo,$nacionalidad,  $L_nacimiento,$profesion,$donante,$discapacidad);
}
require_once("tabla.php");

?>