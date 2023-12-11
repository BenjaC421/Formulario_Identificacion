<?php
require_once("conexion.php");

$fechaEmision = new DateTime();
$fechaemision = $fechaEmision->format("y-m-d");
$fechaVencimiento = $fechaEmision->modify('+5 years');
$fechavencimiento = $fechaVencimiento->format("y-m-d");

function get_qr($fila){
    $infoqr = "Nombres: " . $fila['nombre'] . "\n". "Apellido Paterno: " . $fila['apellidos_P'] . "\n". "Apellido Materno: " . $fila['apellidos_m'] . "\n"."Rut: " . $fila['Rut'] . "\n".  "Nacionalidad: " . $fila['nacionalidad'] . "\n" . "Sexo: " . $fila['sexo'] . "\n".  "Fecha de Nacimiento: " . $fila['fecha_nacimiento'] . "\n".  "Lugar de Nacimiento: " . $fila['lugar_nacimiento'] . "\n".  "Profesion: " . $fila['profesion'] . "\n".  "Discapacidad: " . $fila['discapacitado'] . "\n".  "Donante: " . $fila['donante_organos'] . "\n".  "directorio de foto: " . $fila['fotografia'] . "\n";

    return "https://api.qrserver.com/v1/create-qr-code/?data=" . urlencode($infoqr) . "&size=300x300&ecc=L";
}

function get_info($n_documento){
    global $conexion;
    $sql = "SELECT * FROM personas where n_documento = '$n_documento'";
    $resultado = $conexion->query($sql);
    return $resultado->fetch_assoc();
}
$n_documento = $_POST["n_documento"];
$datos = get_info($n_documento);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .carnet{
            width: 900px;
            height: 450px;
            background-color: antiquewhite ;
            margin-top: 50px;
            margin-left: 50px;
            border-radius: 2%;
            border: 1px solid black;
            float: left;
        }
        img{
            width: 70%;
            border-radius: 2%;
            margin-left: 20px;
            margin-top: 10px;
        }
        .columna{
            width: 45%;
            float: left;
        }
        .columna2{
            width: 25%;
            float: left;
        }
        .fila{
            height: 50%;
        }

    </style>
</head>
<body>

    <div class="carnet">
        <div class="columna">
            <img src="<?php echo $datos["fotografia"]; ?>">
            <br><br><b style =" margin-left:70px ;">RUN </b><?php echo $datos["Rut"]."-".$datos["n_identificador"]; ?>
        </div>
        <div class="columna" style="margin-left:-20px;"> 
            <b>Apellidos</b><br><?php echo $datos["apellidos_P"]."<br>".$datos["apellidos_m"] ?>
            <br><b>Nombres</b><br><?php echo $datos["nombre"]?><br>
                <div class="columna">
                    <b>Nacionalidad</b><br><?php echo $datos["nacionalidad"]?><br><br>
                    <b>Fecha de nacimiento</b><br><?php echo $datos["fecha_nacimiento"]?><br><br>
                    <b>Fecha de emision</b><br><?php echo $fechaemision; ?><br>

                </div>
                <div class="columna">
                <br><b>sexo</b><br><?php echo $datos['sexo']?><br>
                    <b>numero de documento</b><br><?php echo $datos["n_documento"] ?><br><br>
                    <b>Fecha de vencimiento</b><br><?php echo $fechavencimiento; ?><br><br>
                </div>
                <b>Firma del titular</b>
        </div>
    </div>

    <div class="carnet" style="padding:10px;" >
        <div class="fila" >
            <div class="columna2" ><img src=<?php echo get_qr($datos)?> style="margin-bottom:3px ;"><br><br> <b style="margin-left:70px;">Nacio en:</b><br><b style="margin-left:70px;">Profesion:</b>
            </div>
            <div class="columna2" ><br><br><br><br><br><br><br><br><?php echo $datos["lugar_nacimiento"]."<br>" .$datos["profesion"]; ?></div>
        </div>
        <div class="fila" ><b><br><br>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto, minus quo. Natus temporibus inventore quam commodi, explicabo corporis. Odio ducimus maiores ex nisi reprehenderit impedit blanditiis quae doloremque autem soluta?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, asperiores? Eveniet, debitis consectetur optio sit ratione sequi iusto obcaecati distinctio impedit explicabo deserunt. Iusto debitis commodi accusantium fugiat sunt iste! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid ad velit dicta ullam maxime tenetur. Et illum nesciunt dolorem, ea consequuntur labore? Expedita repellat odit temporibus deleniti voluptate,</b>
        </div>
    </div>
    <?php  mysqli_close($conexion); ?>
</body>
</html>
